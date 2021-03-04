<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array(); 
    $data['heading_title'] = 'ภาพรวม';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home')
    );
    $this->load->template('admin/home', $data);
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */