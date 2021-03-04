<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Google extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();


  }

  public function index()
  {
    // 
  }

  public function drive() 
  {
    $data = array(); 
    $data['heading_title'] = 'ภาพรวม';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home')
    );
    $this->load->template('admin/google/index', $data);
  }

}
