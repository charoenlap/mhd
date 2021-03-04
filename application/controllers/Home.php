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

    $data['bgcontent'] = "background:url('".base_url()."assets/img/bghome.jpg') no-repeat center center / cover;";

    $data['banner'] = $this->model_content->getContentList(184)->picture1;
    $data['sub_menu'] = $this->model_content->getContentByCat(79);

    $data['right_side'] = $this->rightSide();

    $this->load->TemplateHome('home/index', $data);
  }

  public function rightSide()
  {
    $list = array();
    $param = new stdClass();
    $param->name = 'ข่าวประชาสัมพันธ์';
    $param->link = base_url('home/contentcat/59/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'ดาวน์โหลดเอกสารและคู่มือ';
    $param->link = base_url('home/contentcat/71/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'ใบสมัครสมาชิก';
    $param->link = base_url('home/contentcat/81/');
    $list[] = $param;

    return $list;
  }

  public function contentcat($catid) // หมวดหมู่หน้า
  {
    
    $data = array();

    $data['result'] = $this->model_content->getCatList($catid);
    $data['contents'] = $this->model_content->getContentByCat($catid);


    $data['contents'] = $this->model_content->getContentByCat($catid);

    
    $data['sub_menu'] = $this->rightSide();
    $this->load->TemplateHome('home/cat', $data);
  }

  public function content($id) // หน้า มีอ้างอิงจาก cat 
  {
    $data = array();
    $data['result'] = $this->model_content->getContentList($id);

    
    $data['sub_menu'] = $this->rightSide();

    $this->load->TemplateHome('home/content', $data);
  }
  public function about_schemes()
  {
    $data = array();
    $data['sub_menu'] = $this->model_content->getContentByCat(79);
    $data['size_bg'] = 'height';
    $this->load->TemplateHome('home/about_schemes', $data);
  }
  public function contact()
  {
    $data = array();

    $data['sub_menu'] = $this->model_content->getContentByCat(79);
    $this->load->TemplateHome('home/contact',$data);
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */