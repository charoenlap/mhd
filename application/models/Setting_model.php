<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Setting_model
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

class Setting_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function get($key) 
  {
    $this->db->where('key', $key);
    $query = $this->db->get('setting');
    return $query->row()->value;
  }

  public function set($key, $value)
  {
    $this->db->where('key', $key);
    $query = $this->db->get('setting');
    if ($query->num_rows()==1) {
      $this->db->set('value', $value);
      $this->db->where('key', $key);
      $this->db->update('setting');
      return true;
    } else {
      return false;
      // return false;
      // exit('Not Found Key, Please contact programmer');
      // ! add in Database table 'mhd_setting' key = 'thiskey', value = 'thisvalue'
      // ! maybe some text in 'thiskey' is wrong check it!!
    }
  } 

  // ------------------------------------------------------------------------

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */