<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_link_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  
  // Default Query------------------------------------------------------------------------
  public function add($data)
  {
    $this->db->set($data);
    $this->db->insert('result_link');
    return $this->db->insert_id();
  }

  public function edit($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('result_link');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function del($id)
  {
    $this->db->where('id', $id);
    $this->db->set( array('del'=>1) );
    $this->db->update('result_link');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function getList($id)
  {
    $this->db->where('id', $id);
    $this->db->where('del', 0);
    $query = $this->db->get('result_link');
    return $query->num_rows() == 1 ? $query->row() : false;
  }

  public function getLists($filter=array(), $start=0, $limit=10, $sort='', $by='')
  {
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        if ($key=='member_id') {
          $this->db->where('((member_id="'.$value.'" OR sub_member_id="'.$value.'") OR (member_id="0" AND sub_member_id="0"))', null);
        } else {
          $this->db->where($key, $value);
        }
        
      }
    }
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort) && !empty($by)) {
      $this->db->order_by($sort, $by);
    }
    $this->db->where('del', 0);
    $query = $this->db->get('result_link');
    // echo $this->db->last_query();
    // echo '<br>';
    return $query->result();
  }
  // ------------------------------------------------------------------------



  // Custom Query ------------------------------------------------------------------------
  public function getListByGoogleId($googleid)
  {
    $this->db->where('google_id', $googleid);
    $this->db->where('del', 0);
    $query = $this->db->get('result_link');
    return $query->num_rows() == 1 ? $query->row() : false;
  }

  // ------------------------------------------------------------------------

}
