<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Specimen_model
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

class Specimen_model extends CI_Model {

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
    $this->db->insert('program_trial_specimen');
    return $this->db->insert_id();
  }

  public function edit($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->set($data);
    $this->db->update('program_trial_specimen');
    // echo $this->db->last_query();
    // exit();
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function del($id)
  {
    $this->db->where('id', $id);
    $this->db->set( array('del'=>1) );
    $this->db->update('program_trial_specimen');
    return $this->db->affected_rows()==1 ? true : false;
  }

  public function getList($id)
  {
    $this->db->select('mhd_program_trial_specimen.*,mhd_program_trial_specimen.id as id,mhd_program_trial.name as trial');
    $this->db->where('mhd_program_trial_specimen.id', $id);
    $this->db->where('mhd_program_trial_specimen.del', 0);
    $this->db->join('mhd_program_trial','mhd_program_trial.id=mhd_program_trial_specimen.trial_id','LEFT');
    $query = $this->db->get('program_trial_specimen');
    return $query->num_rows() == 1 ? $query->row() : false;
  }

  public function getLists($filter=array(), $start=0, $limit=10, $sort='', $by='')
  {
    $this->db->select('mhd_program_trial_specimen.*,mhd_program_trial_specimen.id as id,mhd_program_trial.name as trial');

    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where('mhd_program_trial_specimen.'.$key, $value);
      }
    }
    if ($start>=0 && $limit>=1) {
      $this->db->limit($limit, $start);
    }
    if (!empty($sort) && !empty($by)) {
      $this->db->order_by($sort, $by);
    }
    $this->db->where('mhd_program_trial.del', 0);
    $this->db->where('mhd_program_trial_specimen.del', 0);
    $this->db->join('mhd_program_trial','mhd_program_trial.id = mhd_program_trial_specimen.trial_id','LEFT');
    $query = $this->db->get('program_trial_specimen');
    // echo $this->db->last_query();
    return $query->result();
  }
  // ------------------------------------------------------------------------



  // Custom Query ------------------------------------------------------------------------
  public function countLists($filter=array()) 
  {
    if (count($filter)>0) {
      foreach ($filter as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $query = $this->db->get('program_trial_specimen');
    return $query->num_rows();
  }

}

/* End of file Specimen_model.php */
/* Location: ./application/models/Specimen_model.php */