<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Trial extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function list($id, $page=0) // id program
  {
    $data = array();
      
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/'),
      'Trial' => base_url('admin/trial/list/'.$id)
    );
    $data['action'] = base_url('admin/trial/list/'.$id.'/'.$page);
    $data['lists'] = array();
    $data['pagination'] = '';
    // $data['lists'][] = (object)array('name'=>'');
    $data['link_add'] = base_url('admin/trial/add/'.$id);
    

    $data['year'] = '';
    $data['year_name'] = '';
    

    $filter = array();
    if ($this->input->post('year')) {
      $filter['year_id'] = $this->input->post('year');
      $data['year'] = $this->input->post('year');
      $data['year_name'] = $this->model_year->getList($this->input->post('year'))->year;
    }
    $filter['del'] = 0;
    $filter['program_id'] = $id;
    $config = array(
      'uri_segment' => 5,
      'base_url' => base_url(). 'admin/trial/list/'.$id.'/',
      'full_tag_open' => '<div class="btn-group pagination-group mt-3">',
      'full_tag_close' => '</div>',
      'cur_tag_open' => '<button type="button" class="btn btn-primary">',
      'cur_tag_close' => '</button>',
      'num_tag_open' => '<button type="button" class="btn btn-default">',
      'num_tag_close' => '</button>',
      'next_link' => '<button type="button" class="btn btn-default btn-prev">&gt;</button>',
      'prev_link' => '<button type="button" class="btn btn-default btn-next">&lt;</button>',
      'per_page' => 10, // ! this is limit per page
    );
    $data['lists'] = $this->model_trial->getLists($filter,$page, $config['per_page'], 'year_id','DESC');
    $config['total_rows'] = $this->model_trial->countLists($filter);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();


    $data['years'] = $this->model_year->getLists(array(), 0, 99999999999, 'year', 'DESC');
    
    
    $program_info = $this->model_program->getList($id);
    $data['heading_title'] = 'Trial ('.$program_info->name.')';

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


    $this->load->template('admin/trial/index', $data);
  }

  public function trialInput() 
  {
    $input = array();

      // upload image
      $result_upload = '';
      if ($_FILES['file']['error']==0) {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 0; //set 0 for free width
        $config['max_height'] = 0; //set 0 for free height
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
          $this->session->set_userdata('error', 'Fail upload file');
          redirect('admin/program/editTrial/'.$id);
        } else {
          $uploaded = $this->upload->data();
          $result_upload = $uploaded['file_name'];
        }
      }
      // upload image

      // check post
      $check = array('year_id','name','start_report_date','end_report_date','file','note','row_limit');
      $checkDate = array('dispatched', 'date_send','start_report_date','end_report_date');
      foreach ($this->input->post() as $key => $value) {
        if (in_array($key, $check)) {
          if (in_array($key, $checkDate)) {
            $input[$key] = date('Y-m-d', strtotime($value));
          } else if ($key=='dispatched_count'||$key=='row_limit') {
            $input[$key] = (int)$value;
          } else {
            $input[$key] = $value;
          }
        }
      }
      // check post
      $input['file'] = $result_upload; // post file
      $input['slug'] = url_title(convert_accented_characters($input['name']), 'dash', true);
      $input['date_added'] = date('Y-m-d H:i:s', time());
      $input['date_modify'] = date('Y-m-d H:i:s', time());
      return $input;
  }

  public function add($program_id) 
  {
    $data = array();

    // $trial_info = $this->model_trial->getList($id);
      
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/page/'),
      'Trial' => base_url('admin/trial/list/'.$program_id),
      'Add Trial' => base_url('admin/trial/add/'.$program_id)
    );

    $data['heading_title'] = 'Add Trial';
    $data['action'] = base_url('admin/trial/add/'.$program_id);
 
    $program_info = $this->model_program->getList($program_id);
    $data['program'] = !empty($program_info->name) ? $program_info->name : '';

    $years = $this->model_year->getLists();
    $data['years'] = $years;
    
    // init 
    $data['name'] = '';
    $data['dispatched'] = '';
    $data['dispatched_count'] = 0;
    $data['date_send'] = '';
    $data['file'] = '';
    $data['note'] = '';
    $data['row_limit'] = 0;
    $data['program_id'] = $program_id;

    // Submit
    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $input = $this->trialInput();
      $input['program_id'] = $program_id;

      $result = $this->model_trial->add($input);
      if ($result) {
        $this->session->set_userdata('success', 'Add trial successful');
      } else {
          $this->session->set_userdata('error', 'Add trial fail, something has wrong.');
      }
      redirect('admin/trial/list/'.$program_info->id);
    }

    $this->load->template('admin/trial/form', $data);
  }

  public function edit($id)
  {
    $data = array();

    $trial_info = $this->model_trial->getList($id);
    $program_info = $this->model_program->getList($trial_info->program_id);
      
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'โปรแกรมทั้งหมด' => base_url('admin/program/lists/page/'),
      'Trial' => base_url('admin/trial/list/'.$program_info->id),
      'Edit Trial' => base_url('admin/trial/edit/'.$id)
    );

    $data['heading_title'] = 'Edit Trial';
    $data['action'] = base_url('admin/trial/edit/'.$id);
 
    
    $data['program'] = !empty($program_info->name) ? $program_info->name : '';

    $years = $this->model_year->getLists();
    $data['years'] = $years;
    
    // init 
    $data['name'] = !empty($trial_info->name) ? $trial_info->name : '';
    $data['start_report_date'] = !empty($trial_info->start_report_date) ? date('d-m-Y', strtotime($trial_info->start_report_date)) : '';
    $data['end_report_date'] = !empty($trial_info->end_report_date) ? date('d-m-Y', strtotime($trial_info->end_report_date)) : '';
    $data['dispatched'] = !empty($trial_info->dispatched) ? date('d-m-Y', strtotime($trial_info->dispatched)) : '';
    $data['dispatched_count'] =  (int)$trial_info->dispatched_count;
    $data['date_send'] = !empty($trial_info->date_send) ? date('d-m-Y', strtotime($trial_info->date_send)) : '';
    $data['file'] = !empty($trial_info->file) ? base_url('upload/').$trial_info->file : '';
    $data['note'] = !empty($trial_info->note) ? $trial_info->note : '';
    $data['row_limit'] = (int)$trial_info->row_limit;
    $data['program_id'] = $trial_info->program_id;
    

    // Submit
    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $input = $this->trialInput();

      $result = $this->model_trial->edit($id, $input);
      if ($result) {
        $this->session->set_userdata('success', 'Save trial successful');
      } else {
          $this->session->set_userdata('error', 'Save trial fail, something has wrong.');
      }
      redirect('admin/trial/list/'.$program_info->id);
    }

    $this->load->template('admin/trial/form', $data);
  }

  public function del($id) 
  {
    $trial_info = $this->model_trial->getList($id);
    $program_id = $trial_info->program_id;
    $input = array('del' => 1);
    $result = $this->model_trial->edit($id, $input);
    if ($result) {
      $this->session->set_userdata('success','Delete trial success');
    } else {
      $this->session->set_userdata('error', 'Delete trial fail');
    }
    redirect('admin/trial/list/'.$program_id);
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */