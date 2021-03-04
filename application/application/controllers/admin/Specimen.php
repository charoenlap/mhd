<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Specimen extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function list($trial_id, $page=0)
  {
    $trial_info = $this->model_trial->getList($trial_id);
    $program_info = $this->model_program->getList($trial_info->program_id);

    $data = array();
    $data['breadcrumbs'] = array(
      'ภาพรวม'         => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/page/'),
      'Trial'          => base_url('admin/trial/list/'.$trial_info->program_id),
      'Specimen'       => base_url('admin/specimen/list/'.$trial_id)
    );
    $data['action'] = base_url('admin/specimen/list/'.$trial_id);
    $data['link_add'] = base_url('admin/specimen/add/'.$trial_id);
    $data['lists'] = array();
    $data['pagination'] = '';
    $data['heading_title'] = 'Specimen ('.$program_info->name.'-'.$trial_info->name.')';

    $config = array(
      'uri_segment' => 5,
      'base_url' => base_url(). 'admin/specimen/list/'.$trial_id.'/',
      'full_tag_open' => '<div class="btn-group pagination-group mt-3">',
      'full_tag_close' => '</div>',
      'cur_tag_open' => '<button type="button" class="btn btn-primary">',
      'cur_tag_close' => '</button>',
      'num_tag_open' => '<button type="button" class="btn btn-default">',
      'num_tag_close' => '</button>',
      'next_link' => '<button type="button" class="btn btn-default btn-prev">&gt;</button>',
      'prev_link' => '<button type="button" class="btn btn-default btn-next">&lt;</button>',
      'per_page' => 2, // ! this is limit per page
    );
    $filter = array(
      'program_id' => $trial_info->program_id,
      'trial_id'   => $trial_id,
    );
    $data['lists'] = $this->model_specimen->getLists($filter,$page,$config['per_page']);
    $config['total_rows'] = $this->model_specimen->countLists($filter);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    
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

    $this->load->template('admin/specimen/index', $data);
  }

  public function add($trial_id)
  {
    $trial_info = $this->model_trial->getList($trial_id);
    $program_info = $this->model_program->getList($trial_info->program_id);

    $data = array();
    $data['breadcrumbs'] = array(
      'ภาพรวม'         => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/page/'),
      'Trial'          => base_url('admin/trial/list/'.$trial_info->program_id),
      'Specimen'       => base_url('admin/specimen/list/'.$trial_id)
    );
    $data['action'] = base_url('admin/specimen/add/'.$trial_id);
    $data['lists'] = array();
    $data['pagination'] = '';
    $data['heading_title'] = 'Add Specimen';

    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $input = $this->input->post();
      $input['trial_id'] = $trial_id;
      $input['program_id'] = $trial_info->program_id;
      $input['date_added'] = date('Y-m-d H:i:s');
      $result = $this->model_specimen->add($input);
      if ($result>0) {
        $this->session->set_userdata('success','Add specimen success');
      } else {
        $this->session->set_userdata('error','Add specimen fail');
      }
      redirect('admin/specimen/list/'.$trial_id);
    }

    $data['program'] = $program_info->name;
    $data['trial'] = $trial_info->name;
    $data['name'] = '';

    $data['trial_id'] = $trial_id;

    $this->load->template('admin/specimen/form', $data);
  }

  public function edit($id) 
  {
    $specimen_info = $this->model_specimen->getList($id);
    $trial_info = $this->model_trial->getList($specimen_info->trial_id);
    $program_info = $this->model_program->getList($specimen_info->program_id);

    $data = array();
    $data['breadcrumbs'] = array(
      'ภาพรวม'         => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/page/'),
      'Trial'          => base_url('admin/trial/list/'.$specimen_info->program_id),
      'Specimen'       => base_url('admin/specimen/list/'.$specimen_info->trial_id)
    );
    $data['action'] = base_url('admin/specimen/list/'.$specimen_info->trial_id);
    $data['link_add'] = base_url('admin/specimen/add/'.$specimen_info->trial_id);
    $data['lists'] = array();
    $data['pagination'] = '';
    $data['heading_title'] = 'Edit Specimen';

    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $input = $this->input->post();
      $input['trial_id'] = $specimen_info->trial_id;
      $input['program_id'] = $specimen_info->program_id;
      $input['date_modify'] = date('Y-m-d H:i:s');
      $result = $this->model_specimen->edit($id, $input);
      if ($result) {
        $this->session->set_userdata('success','Edit specimen success');
      } else {
        $this->session->set_userdata('error','Edit specimen fail');
      }
      redirect('admin/specimen/list/'.$specimen_info->trial_id);
    }

    $data['program'] = $program_info->name;
    $data['trial'] = $trial_info->name;
    $data['name'] = $specimen_info->name;

    $data['trial_id'] = $specimen_info->trial_id;

    $this->load->template('admin/specimen/form', $data);
  }

  public function del($id) 
  {
    $specimen_info = $this->model_specimen->getList($id);
    $result = $this->model_specimen->del($id);
    if ($result) {
      $this->session->set_userdata('success','Edit specimen success');
    } else {
      $this->session->set_userdata('error','Edit specimen fail');
    }
    redirect('admin/specimen/list/'.$specimen_info->trial_id);
    
  }

}


/* End of file Specimen.php */
/* Location: ./application/controllers/Specimen.php */