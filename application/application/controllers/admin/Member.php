<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Member extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function lists($page=0)
  {
    $data = array();
    $data['heading_title'] = 'จัดการสมาชิก';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      $data['heading_title'] => base_url('admin/member/lists/'.$page)
    );

    $data['action'] = base_url('admin/member/lists/'.$page);

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

    $filter = array();

    if ( $this->input->post('filter_memberno') )  {
      $data['filter_memberno'] = $this->input->post('filter_memberno');
      $filter['member_no'] = $this->input->post('filter_memberno');
    } else {
      $data['filter_memberno'] = '';
    }
    if ( $this->input->post('filter_email') )  {
      $data['filter_email'] = $this->input->post('filter_email');
      $filter['email'] = $this->input->post('filter_email');
    } else {
      $data['filter_email'] = '';
    }
    if ( $this->input->post('filter_name') )  {
      $data['filter_name'] = $this->input->post('filter_name');
      $filter['firstname'] = $this->input->post('filter_name');
    } else {
      $data['filter_name'] = '';
    }

    $config = array(
      'uri_segment' => 4,
      'base_url' => base_url(). 'admin/member/lists/',
      'full_tag_open' => '<div class="btn-group pagination-group mt-3">',
      'full_tag_close' => '</div>',
      'cur_tag_open' => '<button type="button" class="btn btn-primary">',
      'cur_tag_close' => '</button>',
      'num_tag_open' => '<button type="button" class="btn btn-default">',
      'num_tag_close' => '</button>',
      'next_link' => '<button type="button" class="btn btn-default btn-prev">&gt;</button>',
      'prev_link' => '<button type="button" class="btn btn-default btn-next">&lt;</button>',
      'first_link' => '<button type="button" class="btn btn-default btn-prev">First</button>',
      'last_link' => '<button type="button" class="btn btn-default btn-prev">Last</button>',
      'per_page' => 10, // ! this is limit per page
  );

    
    $lists = $this->model_member->getLists($filter, $page, $config['per_page'], 'id', 'desc');
    $data['lists'] = array();
    foreach ($lists as $key => $value) {
      // ? ตรวจสอบการชำระเงิน
      // $value['payment_status'] = true;
      // $value['payment_status'] = false;
      $value->payment_status = null;

      $data['lists'][] = $value;
      
    }
    $config['total_rows'] = $this->model_member->countLists($filter);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    $this->load->template('admin/member/index', $data);
  }

  public function edit($id)
  {
    $data = array();
    $data['heading_title'] = 'แก้ไขข้อมูลผู้สมัคร';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'จัดการสมาชิก' => base_url('admin/member/lists/0'),
      $data['heading_title'] => base_url('admin/member/edit/'.$id)
    ); 
    $data['action'] = base_url('admin/member/edit/'.$id);

    $data['member'] = $this->model_member->getList($id);
    if (isset($data['member']->id)) {
      $data['company'] = $this->model_company->getList($data['member']->id);
      if (!isset($data['company']->id)) { 
        $data['company']            = new stdClass();
        $data['company']->name      = '';
        $data['company']->room      = '';
        $data['company']->address_1 = '';
        $data['company']->address_2 = '';
        $data['company']->district  = '';
        $data['company']->country   = '';
        $data['company']->province  = '';
        $data['company']->postcode  = '';
      }
    } else {
      $data['member']            = new stdClass();
      $data['member']->email     = '';
      $data['member']->firstname = '';
      $data['member']->lastname  = '';
      $data['member']->telephone = '';
      $data['member']->confirm   = 0;
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

    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $check = $this->model_member->findEmail($this->input->post('email'), $id);
      if ($check) {
        $update = array(
          'email'       => $this->input->post('email'),
          'firstname'   => $this->input->post('firstname'),
          'lastname'    => $this->input->post('lastname'),
          'confirm'     => $this->input->post('confirm'),
          'date_modify' => date('Y-m-d H: i: s')
        );
        if ($this->input->post('password')) {
          $update['password'] = md5($this->input->post('password'));
        } 
        $result_member = $this->model_member->edit($id, $update);
        


        // ! you can update system for (1user more company address)
        // ? find id address
        $company_info = $this->model_company->getListByIdMember($id);
        if (isset($company_info->id)&&$company_info->id>0) {
          // ? update address
          $update = array(
            'name'        => $this->input->post('hospital'),
            'room'        => $this->input->post('room'),
            'address_1'   => $this->input->post('address_1'),
            'address_2'   => $this->input->post('address_2'),
            'district'    => $this->input->post('district'),
            'country'     => $this->input->post('country'),
            'province'    => $this->input->post('province'),
            'postcode'    => $this->input->post('postcode'),
            'date_modify' => date('Y-m-d H: i: s')
          );
          $result_company = $this->model_company->edit($company_info->id, $update);
        } else {
          // ? update address
          $insert = array(
            'member_id'   => $id,
            'name'        => $this->input->post('hospital'),
            'room'        => $this->input->post('room'),
            'address_1'   => $this->input->post('address_1'),
            'address_2'   => $this->input->post('address_2'),
            'district'    => $this->input->post('district'),
            'country'     => $this->input->post('country'),
            'province'    => $this->input->post('province'),
            'postcode'    => $this->input->post('postcode'),
            'date_modify' => date('Y-m-d H:i:s')
          );
          $result_company = $this->model_company->add($insert);

        }
        

        if ($result_member&&$result_company) {
          $this->session->set_userdata('success','แก้ไขข้อมูลผู้สมัครเรียบร้อยแล้ว');
          redirect('admin/member/lists/0/');
        } else {
          $this->session->set_userdata('error', 'เกิดข้อผิดพลาดในการแก้ไขข้อมูลผู้สมัคร');
          redirect('admin/member/edit/'.$id);
        }
        
      } else {
        $this->session->set_userdata('error', 'อีเมลนี้มีคนอื่นใช้งานแล้ว');
        redirect('admin/member/edit/'.$id);
      }
      
    }

    $this->load->template('admin/member/form', $data);
  }

  public function del($id) 
  {
    $this->model_member->del($id);
    $this->model_company->delmember($id); // ? update del all company
    $this->model_register->delmember($id); // ? update del register
    $this->model_register_program->delmember($id); // ? update del program register
    
    redirect('admin/member/lists/0');
  }


  public function sendEmailConfirm($id)
  {
    $member_info = $this->model_member->getList($id);

    $this->model_member->edit($member_info->id, array('date_modify'=>date('Y-m-d H:i:s')));
    $dataemail = array(
      'name' => $member_info->firstname.' '.$member_info->lastname,
      'email' => $member_info->email,
      'link' => base_url('member/forgot'),
      'link_confirm' => base_url('member/confirm/'.urlencode(base64_encode($member_info->email)))
    );
    $message = $this->load->view('email/register', $dataemail, true);
    $subject = 'สมัครสมาชิก โครงการประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก';
    
    if ($this->email->smtpsend($member_info->email, $subject, $message)) {
      $this->session->set_userdata('success', 'ส่งอีเมล ยืนยันการสมัครให้ '.$member_info->email.' แล้ว');
    } else {
      $this->session->set_userdata('error', 'เกิดข้อผิดพลาดในการส่งอีเมล');
    }
    redirect('admin/member/lists/');
  }

  public function sendEmailForgot($id)
  {
    $member_info = $this->model_member->getList($id);
    $code = rand(10000,99999);
    $this->model_member->edit($member_info->id, array('forget_code'=>$code,'date_modify'=>date('Y-m-d H:i:s')));
    $dataemail = array(
      'name' => $member_info->firstname.' '.$member_info->lastname,
      'link' => base_url('member/change/'.$member_info->email.'/'.$code)
    );
    $message = $this->load->view('email/forgot', $dataemail, true);
    $subject = 'ลืมรหัสผ่าน โครงการประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก';
    if ($this->email->smtpsend($member_info->email, $subject, $message)) {
      $this->session->set_userdata('success', 'ส่งอีเมลรีเซทรหัสผ่านให้ '.$member_info->email.' แล้ว');
    } else {
      $this->session->set_userdata('error', 'เกิดข้อผิดพลาดในการส่งอีเมล');
    }
    redirect('admin/member/lists/');
  }

}