<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Permission extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index($year_select='')
  {
    $data = array();

    $data['action'] = base_url('permission/save');

    $data['success'] = $this->session->has_userdata('success') ? $this->session->success : '';
    if (!empty($year_select)) { $this->session->unset_userdata('success'); }
    $data['error'] = $this->session->has_userdata('error') ? $this->session->error : '';
    if (!empty($year_select)) { $this->session->unset_userdata('error'); }

    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;

    $data['years'] = $this->model_year->getLists();
    $data['year_select'] = $year_select;

    if (!empty($year_select)) {
      $year_info = $this->model_year->getYear($year_select);
      $year_id = $year_info->id;
    }
    

    if (empty($year_id)) { 
      $year_id = $this->model_setting->get('config_register_year_id'); // year
      $year_info = $this->model_year->getList($year_id);
      $data['year_select'] = $year_info->year;
      if (!empty($year_info->year)) {
        redirect('permission/index/' . $year_info->year); 
        exit();
      }
      
    }
    // $data['year'] = $this->model_year->getList($year_id)->year;
    // $data['year_open'] = $this->model_setting->get('config_register_open') == 1 ? true : false; // now is open?
    $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
    $register_id = isset($register_info->id) ? $register_info->id : 0; // debug when register error not found id
    $company_id = 0;
    
    // $member_info = $this->model_member->getList($member_id);
    // $data['email'] = $member_info->email;
    $filter = array('mhd_member.id != '=>$member_id);
    // $filter = array();
    $data['members'] = $this->model_member->getLists($filter, 0, 99999999999);
    

    $filter = array();
    $data['programs'] = $this->model_program->getLists($filter, 0, 99999999999);

    // filter choose program
    $program_choose = $this->model_register_program->getListProgramByYear($register_id, $member_id, $company_id, null, $year_id);
    $data['program_choose'] = array(); 
    foreach ($program_choose as $key => $value) {
      if ($value->send_slip) {
        $value->sub_email = ($value->sub_member_id>0) ? $this->model_member->getList($value->sub_member_id)->email : '';
        $data['program_choose'][] = $value;
      }
    }
    krsort($data['program_choose']);


    $this->load->template('permission/index', $data);
  }

  public function ajaxCheck() 
  {
    $email = $this->input->post('email');

    if (isset($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $check = $this->model_member->getListByEmail($email);
      if (isset($check->id)&&$check->id>0) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function save()
  {
    $email = $this->input->post('email'); // array
    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
    $member_info = $this->model_member->getList($member_id);
    $year_id = $this->model_setting->get('config_register_year_id');

    if (isset($email) && count($email)>0) {
      foreach ($email as $program_id => $e) {
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
          $this->session->set_userdata('error', 'กรุณากรอกอีเมล');
          redirect('permission/index/');
        } else {

          // get info program
          $program_info = $this->model_program->getList($program_id);
          // get year
          $year_info = $this->model_year->getList($year_id);

          // check input email (have or not)
          $check = $this->model_member->getListByEmail($e); 
          $sub_member_id = null;

          // same id alert fail
          if (isset($check->id)&&$check->id==$member_id) { 
            $this->session->set_userdata('error','ไม่จำเป็นต้องกรอกอีเมลของตัวเองเพราะคุณมีสิทธิ์อยู่แล้ว, กรุณากรอกอีเมลคนอื่น');
            redirect('permission/index/');
          } else if (isset($check->id)&&$check->id!=$member_id) {
            $sub_member_id = $check->id;
          }

          $new = false;

          // add member
          if (!isset($check->id)&&$check==null) { 
            $insert = array(
              'is_waiting' => 1,
              'email'      => trim($e),
              'confirm'    => 0
            );
            $sub_member_id = $this->model_member->add($insert);
            $new = true;
          }

          // send email confirm 
          $dataemail = array(
            'name'          => $member_info->firstname.' '.$member_info->lastname,
            'email'         => $e,
            'program'       => $program_info->name.' ('.$year_info->year.')',
            'isnew' => $new,
            'link_register' => base_url('member/register/'.urlencode(base64_encode(trim($e)))),
            'link_login'    => base_url('member/login')
          );
          $message = $this->load->view('email/invinte', $dataemail, true);
          $subject = 'ให้สิทธิ์ โครงการประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก';
          $this->email->smtpsend($e, $subject, $message);


          // find register_id
          $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
          $register_id = $register_info->id;
          $company_id = $register_info->company_id;

          // find register_program_id
          $register_program = $this->model_register_program->getListProgramByYear($register_id,$member_id,$company_id,true,$year_id);
          $find_register_program_id = 0;
          foreach ($register_program as $r) {
            if ($r->program_id==$program_id) {
              $find_register_program_id = $r->id;
            }
          }

          // update sub member id -> program register 
          $update = array(
            'sub_member_id' => $sub_member_id,
            'date_modify'   => date('Y-m-d H:i:s', time())
          );
          $result = $this->model_register_program->edit($find_register_program_id, $update);

          if ($result==1) {
            $this->session->set_userdata('success', 'บันทึก '.$e.' เป็นผู้มีสิทธิใช้งานโปรแกรม '.$program_info->name.' ('.$year_info->year.') ของ คุณ '.$member_info->firstname.' '.$member_info->lastname.' สำเร็จ');
          } else {
            $this->session->set_userdata('error', 'ผิดพลาด ผู้มีสิทธิใช้งานโปรแกรม '.$program_info->name.' ('.$year_info->year.')'.' เกิดข้อผิดพลาด');
          }


        }
      }
      redirect('permission/index/');
    } else {
      $this->session->set_userdata('error', 'Invalid email, please key email and click for confirm.');
      redirect('permission/index/');
    }
  }

}
