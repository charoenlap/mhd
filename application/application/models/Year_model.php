<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Year_model
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

class Year_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getList($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('year');
    return $query->row();
  }

  public function getLists($filter=array(), $start=false, $limit=false, $sort='', $by='asc')
  {
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort)) {
      $this->db->order_by($sort, $by);
    }
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }

    $this->db->where('del', 0);
    $query = $this->db->get('year');
    return $query->result();
  }

  public function countLists($filter=array())
  {
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $query = $this->db->get('year');
    return $query->num_rows();
  }

  public function add($data) 
  {
    $this->db->set($data);
    $this->db->insert('year');
    return $this->db->insert_id();
  }
  
  public function edit($id, $data) 
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('year');
    return $this->db->affected_rows();
  }

  public function del($id) 
  {
    $this->db->set('del', 1);
    $this->db->where('id', $id);
    $this->db->update('year');
    return $this->db->affected_rows();
  }
  

  // ------------------------------------------------------------------------

  public function getYear($year) {
    $this->db->where('year', $year);
    $this->db->where('del', 0);
    $query = $this->db->get('year');
    return $query->row();
  }

}

/* End of file Year_model.php */
/* Location: ./application/models/Year_model.php */