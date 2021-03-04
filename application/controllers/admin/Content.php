<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Content extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function category($category_id=null)
  {
    $data = array(); 
    $data['heading_title'] = 'เนื้อหา';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home')
    );
    $data['lists'] = array();

    if ($category_id==null) {
        $data['lists'] = $this->initList();
    } else {
        $filter['parent'] = 73;
        $filter['del'] = 0;
        $filter['hide'] = 0;
        $data['lists'] = $this->model_content->getCatLists($filter);
        
        $category_info = $this->model_content->getCatList($category_id);
        $data['heading_title'] = $category_info->name;
    }

    $data['pagination'] = '';
    $this->load->template('admin/content/category', $data);
  }

  public function initList() 
  {
    $list = array();

    $param = new stdClass();
    $param->name = 'รูปหน้าหลัก';
    $param->link = base_url('admin/content/edit/57/184/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'ข่าวประชาสัมพันธ์';
    $param->link = base_url('admin/content/list/59/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'ดาวน์โหลดเอกสารและคู่มือ';
    $param->link = base_url('admin/content/list/71/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'การประเมินความพึงพอใจ';
    $param->link = base_url('admin/content/list/72/');
    $list[] = $param;

    $param = new stdClass();
    $param->name = 'เกี่ยวกับโครงการ';
    $param->link = base_url('admin/content/category/73/');
    $list[] = $param;

    

    return $list;
  }

  public function list($category_id=null)
  {
    $data = array(); 
    $data['heading_title'] = 'เนื้อหา';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'จัดการเนื้อหา' => base_url('admin/content/category/')
    );
    $data['lists'] = array();
    $lists = $this->model_content->getContentListByCat($category_id);
    foreach ($lists as $value) {
        $data['lists'][] = $value;
    }

    $category_info = $this->model_content->getCatList($category_id);
    $data['heading_title'] = $category_info->name;

    $data['pagination'] = '';
    $this->load->template('admin/content/content', $data);

  }

  public function edit($category_id, $id)
  {
    echo $category_id.' '.$id;
    $this->load->template('admin/content/content', $data);
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */