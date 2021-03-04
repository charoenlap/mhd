<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Old_model
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

class Old_model extends CI_Model {

  // ------------------------------------------------------------------------


  public function __construct()
  {
    parent::__construct();

  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getLists()
  {
    $this->db->set_dbprefix('md_');

    // $this->db->select("user_id,SUBSTR(member_no,5) as oldref,REPLACE(trim(email),' ','') as email,`password`,trim(`name`) as firstname,trim(`lname`) as lastname,trim(telephone) as telephone,0 as del,0 as confirm");

    $this->db->where('del', 0);
    $this->db->where('email is not null',null,false);
    $this->db->where('email LIKE \'%_@__%.__%\'',null,false);
    $this->db->where('parent_user_id', 0);

    $this->db->group_by('email');

    $query = $this->db->get('users');

    $this->db->set_dbprefix('mhd_');

    // echo $this->db->last_query();

    return $query->result();
  }

  public function getProvince($id) 
  {
    $this->db->set_dbprefix('md_');
    $this->db->where('province_id', $id);
    $query = $this->db->get('province');
    $this->db->set_dbprefix('mhd_');
    return $query->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Old_model.php */
/* Location: ./application/models/Old_model.php */