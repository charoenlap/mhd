<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Content_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Content_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  // Content zone
  // ------------------------------------------------------------------------
  public function addContent($data)
  {
    $this->db->set($data);
    $this->db->insert('content');
    return $this->db->insert_id();
  }

  public function editContent($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('content');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function delContent($id)
  {
    $this->db->where('id', $id);
    $this->db->set( array('del'=>1) );
    $this->db->update('content');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function getContentListByCat($cat)
  {
    $this->db->select('mhd_content.*, mhd_language_detail.*, mhd_content.id as id');
    $this->db->where('mhd_language_detail.type', 1);
    $this->db->where('mhd_content.cat', $cat);
    $this->db->where('mhd_content.del', 0);
    $this->db->join('mhd_language_detail', 'mhd_language_detail.ref_id=mhd_content.id', 'LEFT');
    $query = $this->db->get('content');
    // return $query->num_rows() == 1 ? $query->result() : false;
    return $query->result();
  }
  public function getContentList($id)
  {
    $this->db->select('mhd_content.*, mhd_language_detail.*, mhd_content.id as id');
    $this->db->where('mhd_language_detail.type', 1);
    $this->db->where('mhd_content.id', $id);
    $this->db->where('mhd_content.del', 0);
    $this->db->join('mhd_language_detail', 'mhd_language_detail.ref_id=mhd_content.id', 'LEFT');
    $query = $this->db->get('content');
    // echo $this->db->last_query();
    // exit();
    // echo $this->db->last_query();
    return $query->row();
  }

  public function getContentLists($filter=array(), $start=0, $limit=10, $sort='', $by='')
  {
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort) && !empty($by)) {
      $this->db->order_by($sort, $by);
    }
    $this->db->where('del', 0);
    $query = $this->db->get('content');
    return $query->result();
  }
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
  // Category content zone
  // ------------------------------------------------------------------------
  public function addCat($data)
  {
    $this->db->set($data);
    $this->db->insert('content_cat');
    return $this->db->insert_id();
  }

  public function editCat($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('content_cat');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function delCat($id)
  {
    $this->db->where('id', $id);
    $this->db->set( array('del'=>1) );
    $this->db->update('content_cat');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function getCatList($id)
  {
    $this->db->select('mhd_content_cat.*, mhd_language_detail.*, mhd_content_cat.id as id');
    $this->db->where('mhd_language_detail.type', 0);
    $this->db->where('mhd_content_cat.id', $id);
    $this->db->where('mhd_content_cat.del', 0);
    // $this->db->where('mhd_language_detail.language_id', 1);
    $this->db->join('mhd_language_detail', 'mhd_language_detail.ref_id=mhd_content_cat.id', 'LEFT');
    $query = $this->db->get('content_cat');
    return $query->num_rows() == 1 ? $query->row() : false;
  }

  public function getCatLists($filter=array(), $start=0, $limit=10, $sort='', $by='')
  {
    $this->db->select('mhd_content_cat.*, mhd_language_detail.*, mhd_content_cat.id as id');
    $this->db->where('mhd_language_detail.type', 0);
    if (isset($filter) && !empty($filter) && is_array($filter) && count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort) && !empty($by)) {
      $this->db->order_by($sort, $by);
    }
    $this->db->where('mhd_content_cat.del', 0);
    $this->db->join('mhd_language_detail', 'mhd_language_detail.ref_id=mhd_content_cat.id', 'LEFT');
    $query = $this->db->get('content_cat');
    return $query->result();
  }
  public function getContentByCat($cat)
  {
    $this->db->select('mhd_content.*, mhd_language_detail.*, mhd_content.id as id');
    $this->db->where('mhd_language_detail.type', 1);
    $this->db->where('mhd_content.cat', $cat);
    $this->db->where('mhd_content.del', 0);
    $this->db->join('mhd_language_detail', 'mhd_language_detail.ref_id=mhd_content.id', 'LEFT');
    $query = $this->db->get('content');
    return $query->result();
  }
  // ------------------------------------------------------------------------

}

/* End of file Content_model.php */
/* Location: ./application/models/Content_model.php */