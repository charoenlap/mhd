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
    $data['heading_title'] = 'Program';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      $data['heading_title'] => base_url('admin/report')
    );

    $data['action'] = base_url('admin/report');

    $filter = array();
    $data['lists'] = $this->model_year->getLists($filter, 0, 99999999999);

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

    $this->load->template('admin/report/index', $data);
  }

  public function year($slug) 
  {
    $data = array();
    $data['heading_title'] = 'Program';
    $data['breadcrumbs'] = array(
      'ภาพรวม'               => base_url('admin/home'),
      $data['heading_title'] => base_url('admin/report/year/'.$slug),
    );

    $data['action'] = base_url('admin/report');

    $year_info = $this->model_year->getYear($slug);
    $data['year'] = $slug;
    // $filter = array(
      // 'year_id' => $year_info->id
    // );
    $filter=array();
    $data['lists'] = $this->model_program->getLists($filter, 0, 99999999999);

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

    $this->load->template('admin/report/year', $data);
  }

  public function program($year, $slug) 
  {

    $data = array();
    $data['heading_title'] = 'Trial';
    $data['breadcrumbs'] = array(
      'ภาพรวม'               => base_url('admin/home'),
      'Year'                 => base_url('admin/report/year/'.$year),
      $data['heading_title'] => base_url('admin/report/program/'.$year.'/'.$slug),
    );

    $data['action'] = base_url('admin/report');

    $data['year'] = $year;

    $program_info = $this->model_program->getProgramBySlug($slug);
    $id = $program_info->id;

    $program = $this->model_program->getList($id);
    $data['name'] = $program->name;
    $data['program_slug'] = $slug;

    $filter = array(
      'program_id' => $program->id,
    );
    $data['lists'] = $this->model_trial->getLists($filter);

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

    $this->load->template('admin/report/program', $data);
  }

  public function trial($year, $program_slug, $trial_slug) 
  {

    $data = array();
    $data['heading_title'] = 'Member In Program';
    $data['breadcrumbs'] = array(
      'ภาพรวม'               => base_url('admin/home'),
      'Year'                 => base_url('admin/report/year/'.$year),
      'Program'              => base_url('admin/report/program/'.$year.'/'.$program_slug),
      $data['heading_title'] => base_url('admin/report/trial/'.$year.'/'.$program_slug.'/'.$trial_slug),
    );

    $data['action'] = base_url('admin/report');

    $year_info = $this->model_year->getYear($year);
    $year_id = $year_info->id;
    $data['year'] = $year;

    $program_info = $this->model_program->getProgramBySlug($program_slug);
    $program_id = $program_info->id;
    $data['program_slug'] = $program_slug;

    $trial_info = $this->model_trial->getTrialBySlug($trial_slug, $program_id);
    $trial_id = $trial_info->id;
    $data['trial_slug'] = $trial_slug;



    $data['lists'] = array();
    $lists = $this->model_report->getMemberInReport($year_id,$program_id,$trial_id);
    
    $memberid = array();
    foreach ($lists as $value) {
      $memberid[] = $value->member_id;

      $member_info = $this->model_member->getList($value->member_id);
      $member_info->is_report = 1;
      $data['lists'][] = $member_info;
    }
  
    $filter = array(
      'year_id' => $year_id,
      'program_id' => $program_id,
    );
    $register_programs = $this->model_register_program->getLists($filter);
    foreach ($register_programs as $value) {
      if (!in_array($value->member_id, $memberid))  {

        $member_info = $this->model_member->getList($value->member_id);
        $member_info->is_report = 0; 
        $data['lists'][] = $member_info;
      }
    }

    // echo '<pre>';
    // print_r($data['lists']);
    // echo '</pre>';
    


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

    $this->load->template('admin/report/trial', $data);
  }

  public function detail($year, $program_slug, $trial_slug, $member_id) 
  {
    $data = array();
    $data['heading_title'] = 'View Report';
    $data['breadcrumbs'] = array(
      'ภาพรวม'               => base_url('admin/home'),
      'Year'                 => base_url('admin/report/year/'.$year),
      'Program'              => base_url('admin/report/program/'.$year.'/'.$program_slug),
      'Trial'                => base_url('admin/report/trial/'.$year.'/'.$program_slug.'/'.$trial_slug),
      $data['heading_title'] => base_url('admin/report/detail/'.$year.'/'.$program_slug.'/'.$trial_slug.'/'.$member_id),
    );

    $data['action'] = base_url('admin/report');




    // ! ========== default variable ==========
      $program_info = $this->model_program->getProgramBySlug($program_slug);
      $program_id = $program_info->id;

      $trial_info = $this->model_trial->getTrialBySlug($trial_slug, $program_id);
      $trial_id = $trial_info->id;

      $year_id = $this->model_setting->get('config_register_year_id'); // year

  
        // $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
        $member_info = $this->model_member->getList($member_id);
      
        $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
        $register_id = $register_info->id;
        $company_id = $register_info->company_id;


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
      $this->model_report->edit($report_info->id, array('admin_id' => $this->session->admin_info['admin_id']));

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


    $this->load->TemplateAdminProgram('report/form/program_report_'.$program_slug,$data);
  }
}