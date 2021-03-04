<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class User extends CI_Controller
{
    
  public function __construct()
  { 
    parent::__construct();
  }

  public function index()
  {
    $this->login();
  }

  public function login() 
  {
    $data = array();

    $data['action'] = base_url('admin/user/login');

    $data['success'] = '';
    $data['error'] = '';
    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    }

    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $result = $this->model_admin->login($this->input->post('username'), md5($this->input->post('password')));
      if ($result!==false) {
        $edit = array('date_login'=>date('Y-m-d H:i:s', time()));
        $this->model_admin->edit($result->id, $edit);
        $this->session->set_userdata('admin_token', $this->encryption->encrypt(json_encode($result)));
        $this->session->set_userdata('admin_info', array('admin_id' => $result->id, 'username'=>$result->username));
        $text_open = $this->model_setting->get('config_register_open')==0 ? '<span class="badge badge-danger right">ปิด</span>' : '<span class="badge badge-success right">เปิด '.$this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year.'</span>' ;
        $this->session->set_userdata('admin_register', $text_open);
        redirect('admin/home');
      } else {
        $this->session->set_userdata('error', 'เกิดข้อผิดพลาดในการเข้าสู่ระบบแอดมิน');
        redirect('admin/user/login');
      }
    }
    $this->load->view('admin/login', $data);
  }

  public function logout()
  {
    $this->session->unset_userdata('admin_token');
    $this->session->unset_userdata('admin_register');
    redirect('admin/user');
  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */