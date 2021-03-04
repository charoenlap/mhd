<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Payment_model
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

class Payment_model extends CI_Model {

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
    $this->db->insert('payment');
    return $this->db->insert_id();
  }

  public function edit($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('payment');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function del($id)
  {
    $this->db->where('id', $id);
    $this->db->set( array('del'=>1) );
    $this->db->update('payment');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function getList($id)
  {
    $this->db->where('id', $id);
    $this->db->where('del', 0);
    $query = $this->db->get('payment');
    return $query->num_rows() == 1 ? $query->row() : false;
  }
  public function getLists($filter=array(), $start=0, $limit=10, $sort='', $by='')
  {
    $this->db->select('mhd_payment.*, mhd_member.member_no');
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort) && !empty($by)) {
      $this->db->order_by('mhd_payment.'.$sort, $by);
    }
    $this->db->join('mhd_member','mhd_member.id = mhd_payment.member_id','LEFT');
    $this->db->where('mhd_member.del', 0);
    $query = $this->db->get('payment');
    // echo $this->db->last_query();
    // echo '<br>';
    return $query->result();
  }
  // ------------------------------------------------------------------------



  // Custom Query ------------------------------------------------------------------------
  public function delmember($id) 
  {
    $this->db->where('member_id', $id);
    $this->db->set(array('del'=>1));
    $this->db->update('register');
    return $this->db->affected_rows() == 1 ? true : false;
  }
  public function countLists($filter=array())
  {
    
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $this->db->join('mhd_member','mhd_member.id = mhd_payment.member_id','LEFT');
    $this->db->where('mhd_member.del', 0);
    $query = $this->db->get('payment');
    return $query->num_rows();
  }
  public function getuser($member_no,$firstname)
  {
    $this->db->where('firstname',$firstname);
    $this->db->where('member_no', $member_no);
    $this->db->where('del', 0);
    $query = $this->db->get('member');
    return $query->num_rows() == 1 ? $query->row() : false;
  }

  // ------------------------------------------------------------------------

}

/* End of file Payment_model.php */
/* Location: ./application/models/Payment_model.php */