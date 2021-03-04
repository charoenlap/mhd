<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Setting extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->year();
  }

  public function year()
  {
    $data = array(); 
    $data['heading_title'] = 'ตั้งค่าเปิดปิด รับสมัคร';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      $data['heading_title'] => base_url('admin/setting/year')
    );

    $data['year'] = $this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year;
    $data['action'] = base_url('admin/setting/year');

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
    $data['years'] = $this->model_year->getLists($filter, 0, 99999999999);
    $data['config_register_year_id'] = $this->model_setting->get('config_register_year_id');
    $data['config_register_open'] = $this->model_setting->get('config_register_open');

    
    if ($this->input->server('REQUEST_METHOD')=='POST') {
        $result = $this->model_setting->set('config_register_year_id', $this->input->post('config_register_year_id'));
        $result2 = $this->model_setting->set('config_register_open', $this->input->post('config_register_open'));
        if ($result&&$result2) {
            $text_open = $this->model_setting->get('config_register_open')==0 ? '<span class="badge badge-danger right">ปิด</span>' : '<span class="badge badge-success right">เปิด '.$this->model_year->getList( $this->input->post('config_register_year_id') )->year.'</span>' ;
            $this->session->set_userdata('admin_register', $text_open);
            $this->session->set_userdata('success', 'Save successful');
        } else {
            $this->session->set_userdata('error', 'Save fail, something has wrong.');
        }
        redirect('admin/setting/year');
    }

    $this->load->template('admin/setting/year', $data);
  }

  public function years($page=0)
  {
    $data = array(); 
    $data['heading_title'] = 'จัดการปีที่สมัคร';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      $data['heading_title'] => base_url('admin/setting/years')
    );

    $data['action'] = base_url('admin/setting/years');

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

    $config = array(
        'base_url' => base_url(). 'admin/setting/years/page',
        'full_tag_open' => '<div class="btn-group mt-3">',
        'full_tag_close' => '</div>',
        'cur_tag_open' => '<button type="button" class="btn btn-sm btn-primary">',
        'cur_tag_close' => '</button>',
        'num_tag_open' => '<button type="button" class="btn btn-sm btn-default">',
        'num_tag_close' => '</button>',
        'next_link' => '<button type="button" class="btn btn-sm btn-default">&gt;</button>',
        'prev_link' => '<button type="button" class="btn btn-sm btn-default">&lt;</button>',
        'per_page' => 10, // ! this is limit per page
    );

    $filter = array();
    $data['lists'] = $this->model_year->getLists($filter, $page, $config['per_page'], 'id', 'desc');
    $config['total_rows'] = $this->model_year->countLists($filter);
   
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    if ($this->input->server('REQUEST_METHOD')=='POST') {
        if ($result==1) {
            $this->session->set_userdata('success', 'Save successful');
        } else {
            $this->session->set_userdata('error', 'Save fail, something has wrong.');
        }
        redirect('admin/setting/year');
    }

    $this->load->template('admin/setting/years', $data);
  }

    public function addyear() 
    {
        $data = array();
        $data['heading_title'] = 'เพิ่มปีที่สมัคร';
        $data['breadcrumbs'] = array(
            'ภาพรวม' => base_url('admin/home'),
            'จัดการปีที่สมัคร' => base_url('admin/setting/years'),
            $data['heading_title'] => base_url('admin/setting/addyear')
        );
        $data['action'] = base_url('admin/setting/addyear');
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
            $post = $this->input->post();
            $post['date_added'] = date('Y-m-d H:i:s');
            $result = $this->model_year->add($post);
            if ($result) {
                $this->session->set_userdata('success', 'Save Success');
            } else {
                $this->session->set_userdata('error', 'Save Fail');
            }
            redirect('admin/setting/years/page');
        }
        
        $this->load->template('admin/setting/year_form', $data);
    }

  public function edityear($id) 
  {
      $data = array();
      $data['heading_title'] = 'แก้ไขปีที่สมัคร';
      $data['breadcrumbs'] = array(
        'ภาพรวม' => base_url('admin/home'),
        'จัดการปีที่สมัคร' => base_url('admin/setting/years'),
        $data['heading_title'] => base_url('admin/setting/edityear/'.$id)
      );
  
      $data['action'] = base_url('admin/setting/edityear/'.$id);

      $data['list'] = $this->model_year->getList($id);
  
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
          $post = $this->input->post();
          $post['date_modify'] = date('Y-m-d H:i:s');
          $result = $this->model_year->edit($id, $post);
          if ($result) {
              $this->session->set_userdata('success', 'Save Success');
          } else {
              $this->session->set_userdata('error', 'Save Fail');
          }
          redirect('admin/setting/years/page');
      }
      
      $this->load->template('admin/setting/year_form', $data);
  }

  public function delyear($id)
  {
      $result = $this->model_year->del($id);
      if ($result) {
        $this->session->set_userdata('success', 'Save Success');
    } else {
        $this->session->set_userdata('error', 'Save Fail');
    }
    redirect('admin/setting/years/page');
  }

}