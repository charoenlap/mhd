<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = array();
    $data['heading_title'] = 'แจ้งส่งผลการทดสอบ ';
    $data['action'] = base_url('report/detail');


    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
    $year_id = $this->model_setting->get('config_register_year_id'); // year
    $data['year'] = $this->model_year->getList($year_id)->year;
    $data['year_open'] = $this->model_setting->get('config_register_open') == 1 ? true : false; // now is open?
    $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
    $company_id = $register_info->company_id;
    $register_id = isset($register_info->id) ? $register_info->id : 0; // debug when register error not found id

    $filter = array();
    $data['programs'] = $this->model_program->getLists($filter, 0, 99999999999);
     // filter choose program
     $program_choose = $this->model_register_program->getListProgramByYear($register_id, $member_id, $company_id, null, $year_id);
     $program_sub = $this->model_register_program->getListProgramBySub($register_id, $member_id, $company_id, null, $year_id);
     $data['program_others'] = array();
     foreach ($program_sub as $value) {
        $payment_info = $this->model_payment->getList($value->payment_id);
        if ($payment_info->status==1) {
          $mainyear_info = $this->model_year->getList($value->year_id);
          $mainmember_info = $this->model_member->getList($value->member_id);
          $value->tag = $mainyear_info->year.sprintf('%04d', $value->member_id).' '.$mainmember_info->firstname.' '.$mainmember_info->lastname.' ['.$mainmember_info->email.']';
          $data['program_others'][] = $value;
        }
     }
     // print_r($program_sub);
     
     $data['program_choose'] = array(); 
     $data['program_slip'] = array();
     $data['program_payment'] = array();
     foreach ($program_choose as $key => $value) {
      $payment_info = $this->model_payment->getList($value->payment_id);
       $data['program_choose'][] = $value->program_id;
       $data['program_slip'][$value->program_id] = $value->send_slip;
       $data['program_payment'][$value->program_id] = isset($payment_info->status) ? $payment_info->status : 0;
     }

    if ($this->session->has_userdata('success')) {
        $data['success'] = $this->session->success;
        $this->session->unset_userdata('success');
    } else {
        $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
        $data['error'] = $this->session->error;
        $this->session->unset_userdata('error');
    } else {
        $data['error'] = '';
    }

    $this->load->template('report/index', $data);
  }

  
  public function program($slug, $register_program_id=null) 
  {
    $data = array();
    $data['action'] = base_url('report/graph');

    $program_info = $this->model_program->getProgramBySlug($slug);
    $id = $program_info->id;

    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
    $year_id = $this->model_setting->get('config_register_year_id'); // year
    $data['year'] = $this->model_year->getList($year_id)->year;
    $data['year_open'] = $this->model_setting->get('config_register_open') == 1 ? true : false; // now is open?
    $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
    $company_id = $register_info->company_id;
    $register_id = isset($register_info->id) ? $register_info->id : 0; // debug when register error not found id

    $data['register_program_id'] = $register_program_id;

     // filter choose program
     $program_choose = $this->model_register_program->getListProgramByYear($register_id, $member_id, $company_id, null, $year_id);
     $program_has_slip = array();
     foreach ($program_choose as $key => $value) {
       if ($value->send_slip==1) {
        $program_has_slip[] = $value->program_id;
       }
     }
    //  if (!in_array($id,$program_has_slip)) {
    //   $this->session->set_userdata('error', 'ไม่สามารถเข้าโปรแกรม '.$program_info->name.' ได้ เนื่องจากคุณยัง ไม่ได้สมัคร หรือยังไม่ได้แจ้งชำระเงิน');
    //   redirect('report');
    //  }

    $program = $this->model_program->getList($id);
    $data['name'] = $program->name;

    $filter = array(
      'program_id' => $program->id,
    );
    $trial = $this->model_trial->getLists($filter);
    foreach ($trial as $value) {
      // Check my send report
      $filter = array('member_id' => $member_id, 'register_id'=>$register_id, 'trial_id'=>$value->id);
      $report = $this->model_report->getReport($filter);
      if (count($report)>0) {
        $value->has_report = true;
      } else{
        $value->has_report = false;
      }
      // Check my send report

      // $value->can_send = time() < strtotime($value->date_send.' 00:00:00') ? true : false;
      $value->can_send = (time() > strtotime($value->start_report_date.' 00:00:00') && time() < strtotime($value->end_report_date.' 23:59:59')) ? true : false;

      //get register program 
      $register_program = $this->model_register_program->getListProgramByYear($register_info->id, $member_id, $company_id, true, $year_id);
      
      // get payment status

      $remaining = strtotime($value->end_report_date.' 23:59:59') - time();
      $day = floor($remaining / (60*60*24));
      $remaining -= (60*60*24) * $day;
      $hour = floor($remaining / (60*60));
      $remaining -= (60*60) * $hour;
      $min = floor($remaining / (60));
      $value->send_remaining = ($day>0 ? $day.' วัน ': '').($hour>0 ? $hour.' ชั่วโมง ': '').($min>0 ? $min.' นาที ' : '');

      $value->program_slug = $slug;

      $filter = array(
        'year_id'    => $year_id,
        'program_id' => $id,
        'trial_id'   => $value->id,
      );
      $value->files = $this->model_result_link->getLists($filter, 0, 99999999999);

      $data['trial'][] = $value;
    }

    $data['heading_title'] = 'Trial in program '.$program->name;

  

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->userdata('success');
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->userdata('error');
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }

    $this->load->template('report/detail',$data);
  }
  public function trial($program_slug, $trial_slug, $register_program_id=null)
  {
    $data = array();



    $data['heading_title'] = 'รายงานผลการทดสอบ';
    $data['action'] = base_url('report/trial/'.$program_slug.'/'.$trial_slug.($register_program_id!=null?'/'.$register_program_id:'')); 

    // ! ========== default variable ==========
      $program_info = $this->model_program->getProgramBySlug($program_slug);
      $program_id = $program_info->id;

      $trial_info = $this->model_trial->getTrialBySlug($trial_slug, $program_id);
      $trial_id = $trial_info->id;

      $year_id = $this->model_setting->get('config_register_year_id'); // year

      if ($register_program_id!=null) { // sub member 
        $tempRP = $this->model_register_program->getList($register_program_id);

        $member_id = $tempRP->member_id;
        $member_info = $this->model_member->getList($member_id);

        $register_id = $tempRP->register_id;
        $company_id = $tempRP->company_id;
      } else {
        $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
        $member_info = $this->model_member->getList($member_id);
      
        $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
        $register_id = $register_info->id;
        $company_id = $register_info->company_id;
      }


      $company_info = $this->model_company->getList($company_id);
    // ! ========== default variable ==========


    // ? ========== initial loading data ==========
      $filter = array('del'=>0);
      $infection_all = $this->model_program_infection->getLists($filter, 0, 9999999999999); 
      $data['infection_all'] = $infection_all;

      $filter = array('del'=>0, 'program_id'=>$program_id);
      $data['infections'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>1);
      $data['infections_sec1'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>2);
      $data['infections_sec2'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>3);
      $data['infections_sec3'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>4);
      $data['infections_sec4'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>5);
      $data['infections_sec5'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'section'=>6);
      $data['infections_sec6'] = $this->model_program_infection->getLists($filter, 0, 9999999999999);

      $filter = array('del'=>0, 'program_id'=>$program_id, 'trial_id'=>$trial_id);
      $data['specimens'] = $this->model_specimen->getLists($filter, 0, 9999999999999);

      // eqah
      $filter = array('del'=>0, 'program_id'=>$program_id);
      $data['principles'] = $this->model_program_principle->getLists($filter, 0, 9999999999999);

      // eqah
      $filter = array('program_id'=>$program_id);
      $data['tools'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
      
      // eqaisyphilis
      $filter = array('program_id'=>$program_id, 'section'=>'Qualitative');
      $data['tools_qualitative'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
      $filter = array('program_id'=>$program_id, 'section'=>'NTP');
      $data['tools_ntp'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
      $filter = array('program_id'=>$program_id, 'section'=>'TP');
      $data['tools_tp'] = $this->model_program_tool->getLists($filter, 0, 9999999999);

      // eqaihbv
      $filter = array('program_id'=>$program_id, 'section'=>'auto');
      $data['tools_auto'] = $this->model_program_tool->getLists($filter, 0, 9999999999);

      // only eqac
      $filter = array('program_id'=>$program_id,'section'=>1);
      $data['tools_sec1'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
      $filter = array('program_id'=>$program_id,'section'=>2);
      $data['tools_sec2'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
      $filter = array('program_id'=>$program_id,'section'=>3);
      $data['tools_sec3'] = $this->model_program_tool->getLists($filter, 0, 9999999999);
    // ? ========== initial loading data ==========


    // ? ========== Setting value to <input> ==========
      // Head
      $data['program_id']      = $program_id;
      $data['trial_id']        = $trial_id;
      $data['program_name']    = $program_info->name;
      $data['trial_name']      = $trial_info->name;
      $data['member_id']       = $member_id;
      $data['year_id']         = $year_id;
      $data['register_id']     = $register_id;
      $data['company_id']      = $company_info->id;
      $data['address']         = $company_info->name.': '.$company_info->address_1.' '.$company_info->address_2.' '.$company_info->district.' '.$company_info->country.' '.$company_info->province.' '.$company_info->postcode;
      $data['date_report']     = date('d-m-Y', time());
      $data['received_status'] = null;
      $data['received_status_other'] = '';

      // Footer
      $data['name']      = $company_info->name;
      $data['telephone'] = $company_info->telephone;
      $data['position']  = '';
      $data['comment']   = '';
      
    // ? ========== Setting value to <input> ==========


    // ? ========== Loading old data ==========
      $has_olddata = false;
      $report_id = 0;

      $filter = array(
        'program_id'  => $program_id,
        'trial_id'    => $trial_id,
        'member_id'   => $member_id,
        'year_id'     => $year_id,
        'register_id' => $register_id,
        'company_id'  => $company_info->id
      );
      $report_info = $this->model_report->getReport($filter);
      if (count($report_info)>0) {
        $has_olddata = true;
        $report_info = $report_info[0]; // last send

        $report_id = $report_info->id;
        $data['date_report'] = date('d-m-Y', strtotime($report_info->date_report));
        $data['received_status'] = null;
        if ($report_info->received_status == 1) {
          $data['received_status'] = 'true';
        } else if ($report_info->received_status == 0){
          $data['received_status'] = 'false';
        }
        $data['received_status_other'] = $report_info->received_status_other;
        $data['save'] = json_decode($report_info->save, true);
        if (isset($data['save']['name'])) { 
          $data['name'] = $data['save']['name']; 
        }
        if (isset($data['save']['telephone'])) { 
          $data['telephone'] = $data['save']['telephone']; 
        }
        if (isset($data['save']['position'])) { 
          $data['position'] = $data['save']['position']; 
        }
        if (isset($data['save']['comment'])) { 
          $data['comment'] = $data['save']['comment']; 
        }
      }
      
    // ? ========== Loading old data ==========



    if ($_SERVER['REQUEST_METHOD']=='POST') {
      // ? ========== Save to db ==========
        if ($this->input->post('type')=='submit') {
          $post = $this->input->post();
          
          unset($post['type'], $post['program_name'], $post['trial_name'], $post['address']);

          // Change format date
          $post['date_report'] = date('Y-m-d', strtotime( $post['date_report'] ));
          $post['save']['report_date'] = date('Y-m-d', strtotime( $post['save']['report_date'] ));
          $post['received_status'] = ($post['received_status']=='true') ? 1 : 0;
          $post['admin_id'] = 0; // ready to checking by admin
          $post['save'] = json_encode($post['save']);
          if ($has_olddata) {
            $post['date_modify'] = date('Y-m-d H:i:s', time());
          } else {
            $post['date_added'] = date('Y-m-d H:i:s', time());
          }
          $post['edit_member_id'] = json_decode($this->encryption->decrypt($this->session->token))->id;
          

          // Check this use has "register > register_program_id" for make sure
          $main = false;
          if ($register_program_id==null) {
            $register_program_id = $this->model_register_program->checkProgramInRegister($post['register_id'], $post['program_id'], $post['member_id'], $post['company_id']);
            $main = true;
          }
          $post['register_program_id'] = $register_program_id;
          if ($register_program_id!==false) {
            if ($has_olddata == true && $report_id > 0) {
              unset($post['member_id'], $post['register_id'], $post['program_id'], $post['trial_id'], $post['year_id'], $post['company_id']);
              $result = $this->model_report->edit($report_id, $post);
              $result = $result==1 ? true : false;
            } else {
              $result = $this->model_report->add($post);
              $result = $result>0 ? true : false;
            }

            if ($result) {
              $this->session->set_userdata('success', 'Send report <b>'.$program_info->name.' - '.$trial_info->name.'</b> successful');
            } else {
              $this->session->set_userdata('error', 'Fail something has wrong about send report <b>'.$program_info->name.' - '.$trial_info->name.'</b> ');
            }
          } else {
            $this->session->set_userdata('error', 'Your account not found program <b>'.$program_info->name.' - '.$trial_info->name.'</b> on your register, please contact to admin.');
          }

          redirect('report/program/'.$program_slug.(!$main?'/'.$register_program_id:''));
        }
      // ? ========== Save to db ==========


      // ? ========== Repleace value for show ==========
        $data['program_id']            = $this->input->post('program_id');
        $data['trial_id']              = $this->input->post('trial_id');
        $data['program_name']          = $this->input->post('program_name');
        $data['trial_name']            = $this->input->post('trial_name');
        $data['year_id']               = $this->input->post('year_id');
        $data['member_id']             = $this->input->post('member_id');
        $data['register_id']           = $this->input->post('register_id');
        $data['company_id']            = $this->input->post('company_id');
        $data['address']               = $this->input->post('address');
        $data['date_report']           = $this->input->post('date_report');
        $data['received_status']       = $this->input->post('received_status');
        $data['received_status_other'] = $this->input->post('received_status_other');
        
        $save = $this->input->post();
        $data['save'] = $save['save'];

        if (isset($data['save']['name'])) { 
          $data['name'] = $data['save']['name']; 
        }
        if (isset($data['save']['telephone'])) { 
          $data['telephone'] = $data['save']['telephone']; 
        }
        if (isset($data['save']['position'])) { 
          $data['position'] = $data['save']['position']; 
        }
        if (isset($data['save']['comment'])) { 
          $data['comment'] = $data['save']['comment']; 
        }
      // ? ========== Repleace value for show ==========
    }

    $this->load->TemplateProgram('report/form/program_report_'.$program_slug,$data);  
    
  }

  public function updateSlug() {
    $list = $this->model_trial->getLists(array(), 0, 10000);
    foreach ($list as $value) {
      echo $slug = url_title($value->name, 'dash', true);
      echo '<br>';
      $this->model_trial->edit($value->id, array('slug'=>$slug));
    }
    
  }





  public function detail()
  {
    $data = array();
    $data['heading_title'] = 'Trial';
    $data['action'] = base_url('report/graph');
    $id_pro = $this->uri->uri_to_assoc();
    $id_program = $id_pro['id'];
    $val_program = $this->model_program->getList($id_program);
    $name = $val_program->name;
    $data['name'] = preg_replace('/[-:& ]/','_',$name);
    $this->load->template('report/detail',$data);
  }
  public function graph()
  {
    $data = array();
    $data['heading_title'] = 'Graph';
    $this->load->template('report/graph',$data);  
  }
}