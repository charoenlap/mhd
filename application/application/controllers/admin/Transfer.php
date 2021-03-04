<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Transfer
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Transfer extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array(); 
    $data['heading_title'] = 'เนื้อหา';
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home')
    );
    $data['success'] = $this->session->has_userdata('success') ? $this->session->success : ''; $this->session->unset_userdata('success');
    $data['error'] = $this->session->has_userdata('error') ? $this->session->error : ''; $this->session->unset_userdata('error');

    $this->load->template('admin/transfer/index', $data);
  }

  public function member()
  {
    $users = $this->model_old->getLists();
    $this->load->helper('file');
    $jsonthai = json_decode(read_file(APPPATH.'../assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/database/raw_database/raw_database.json'));

    foreach ($users as $user) {
      $realemail = strtolower(trim(filter_var($user->email, FILTER_SANITIZE_EMAIL))); // not thai charactor
      $ex = explode('@', $realemail);
      if (count($ex)==2) { // some people add 2 email like 'email@gmail.comemail@gmail.com' it user error
        $lastid = 0;
        $check = $this->model_member->getListByEmail($realemail);
        if ($check!==false) {
          $lastid = $check->id;
        } else {
          // add member 
          $insert = array(
            'oldref'          => $user->user_id,
            'is_waiting'      => 0,
            'member_no'       => null,
            'email'           => $realemail,
            'password'        => $user->password,
            'firstname'       => trim($user->name),
            'lastname'        => trim($user->lname),
            'telephone'       => trim($user->phone),
            'forget_code'     => null,
            'del'             => 0,
            'date_login'      => null,
            'date_added'      => date('Y-m-d H:i:s', time()),
            'date_modify'     => null,
            'confirm'         => 1,
            'transfer_oldweb' => 1,
          );
          $lastid = $this->model_member->add($insert);
        }

        
        if ($lastid>0) {
          // update memberno
          $update = array('member_no'=>sprintf('%011d',$lastid));
          $this->model_member->edit($lastid, $update);

          // read json province,country,district
          $kt = 0;
          foreach ($jsonthai as $k => $p) {
            if ($p->zipcode==$user->postal && $p->amphoe==trim($user->aumper) && $p->district==trim($user->tumbon)) {
              $kt=$k;
            }
          }
          $prov = (isset($this->model_old->getProvince((int)$user->province)->name_province) ? $this->model_old->getProvince((int)$user->province)->name_province : '');

          // add company info
          $insert = array(
            'member_id'           => (int)$lastid,
            'name'                => trim($user->name_hospital),
            'type_hospital'       => trim($user->type_place),
            'type_hospital_other' => trim($user->type_place)== 'อื่นๆ' ? trim($user->affiliation): '',
            'total_bed'           => trim($user->licenseSelect),
            'room'                => trim($user->laboratory),
            'address_1'           => trim($user->num).(!empty(trim($user->moo))?', '.trim($user->moo)                                                                     : '').(!empty(trim($user->road))?', '.trim($user->road): ''),
            'address_2'           => '',
            'district'            => isset($jsonthai[$kt]->district) ? $jsonthai[$kt]->district                                                                           : $user->tumbon,
            'country'             => isset($jsonthai[$kt]->country) ? $jsonthai[$kt]->country                                                                             : $user->aumper,
            'province'            => isset($jsonthai[$kt]->province) ? $jsonthai[$kt]->province                                                                           : $prov,
            'postcode'            => isset($jsonthai[$kt]->postcode) ? $jsonthai[$kt]->postcode                                                                           : $user->postal,
            'address_fail'        => isset($jsonthai[$kt]->district)||isset($jsonthai[$kt]->country)||isset($jsonthai[$kt]->province)||isset($jsonthai[$kt]->postcode) ? 1: 0,
            'temp_oldaddress'     => implode(',',array($user->tumbon,$user->aumper,$prov  ,$user->postal)),
            'telephone'           => trim($user->phone),
            'fax'                 => '',
            'del'                 => 0,
            'date_added'          => date('Y-m-d H                                                                                                                        : i                                                    : s', time()),
            'date_modify'         => null,
          );
          $company_id = $this->model_company->add($insert);


          // add default register
          $insert = array(
            'member_id'   => (int)$lastid,
            'company_id'  => (int)$company_id,
            'year_id'     => (int)$this->model_setting->get('config_register_year_id'),
            'total'       => 0,
            'date_added'  => date('Y-m-d H: i: s'),
            'date_modify' => '',
            'del'         => 0
          );
          $register_id = $this->model_register->add($insert);

        }
      }
    }
    
  }

}


/* End of file Transfer.php */
/* Location: ./application/controllers/Transfer.php */