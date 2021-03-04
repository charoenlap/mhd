<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Result extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array();
    $data['heading_title'] = 'ผลการประเมิน ';
    $data['action'] = base_url('result/detail');

    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
    $year_id = $this->model_setting->get('config_register_year_id'); // year
    $data['year'] = $this->model_year->getList($year_id)->year;
    $data['year_open'] = $this->model_setting->get('config_register_open') == 1 ? true : false; // now is open?
    $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
    $register_id = isset($register_info->id) ? $register_info->id : 0; // debug when register error not found id
    $company_id = 0;

    $filter = array();
    $data['programs'] = $this->model_program->getLists($filter, 0, 99999999999);
     $program_choose = $this->model_register_program->getListProgramByYear($register_id, $member_id, $company_id, null, $year_id);
     $data['program_choose'] = array(); 
     foreach ($program_choose as $key => $value) {
      
      // $filter = array(
      //   'year_id'    => 0,
      //   'program_id' => 1,
      //   'trial_id'   => 0,
      // );
      // $data['files'] = $this->model_result_link->getLists($filter, 0, 99999999999);
       $data['program_choose'][] = $value;
     }

    $this->load->template('result/index', $data);
  }

  public function program($slug) 
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

     // filter choose program
     $program_choose = $this->model_register_program->getListProgramByYear($register_id, $member_id, $company_id, null, $year_id);
     $program_has_slip = array();
     foreach ($program_choose as $key => $value) {
       if ($value->send_slip==1) {
        $program_has_slip[] = $value->program_id;
       }
     }
     if (!in_array($id,$program_has_slip)) {
      $this->session->set_userdata('error', 'ไม่สามารถเข้าโปรแกรม '.$program_info->name.' ได้ เนื่องจากคุณยัง ไม่ได้สมัคร หรือยังไม่ได้แจ้งชำระเงิน');
      redirect('report');
     }

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
        'member_id'  => $member_id,
        'status'     => 1
      );
      $value->files = $this->model_result_link->getLists($filter, 0, 99999999999);
      // print_r($value->files);

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

    $this->load->template('result/detail',$data);
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */