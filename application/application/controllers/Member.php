<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Member extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array();
    $data['heading_title'] = 'ข้อมูลผู้ใช้งาน';
    $this->load->template('member/form', $data);
  }

  public function address()
  {
    $data = array();
    $data['heading_title'] = 'แก้ไขที่อยู่';
    $data['action'] = base_url('member/address');
    $data['year'] = $this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year;

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }

    $member_id = json_decode($this->encryption->decrypt($this->session->token))->id;
    $member_info = $this->model_member->getListById($member_id);

    // $year_id = $this->model_setting->get('config_register_year_id'); // year
    // $data['year'] = $this->model_year->getList($year_id)->year;
    // $data['year_open'] = $this->model_setting->get('config_register_open') == 1 ? true : false; // now is open?
    // $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
    // $company_id = $register_info->company_id;
    // $register_id = isset($register_info->id) ? $register_info->id : 0; // debug when register error not found id

    $company_info = $this->model_company->getListByIdMember($member_id);

    $data['hospital']      = $company_info->name;
    $data['type_hospital'] = $company_info->type_hospital;
    $data['total_bed']     = $company_info->total_bed;
    $data['room']          = $company_info->room;
    $data['address_1']     = $company_info->address_1;
    $data['address_2']     = $company_info->address_2;
    $data['district']      = $company_info->district;
    $data['country']       = $company_info->country;
    $data['province']      = $company_info->province;
    $data['postcode']      = $company_info->postcode;

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $this->model_company->delmember($member_id);

      $insert = array(
        'member_id'  => $member_id,
        'name'       => $this->input->post('hospital'),
        'room'       => $this->input->post('room'),
        'address_1'  => $this->input->post('address_1'),
        'address_2'  => $this->input->post('address_2'),
        'district'   => $this->input->post('district'),
        'country'    => $this->input->post('country'),
        'province'   => $this->input->post('province'),
        'postcode'   => $this->input->post('postcode'),
        'telephone'  => $member_info->telephone,
        'date_added' => date('Y-m-d H:i:s', time())
      );
      $result = $this->model_company->add($insert);

      $year_id = $this->model_setting->get('config_register_year_id'); // year
      $register_info = $this->model_register->getRegisterByYearAndMember($member_id, $year_id);
      $update = array(
        'company_id' => $result
      );
      $this->model_register->edit($register_info->id, $update);

      if ($result>0) {
        $this->session->set_userdata('success','Add address success');
      } else {
        $this->session->set_userdata('error','Fail add address');
      }
      redirect('member/dashboard');
      exit();
    }

    $data['email'] = $member_info->email;
    $data['firstname'] = $member_info->firstname;
    $data['lastname'] = $member_info->lastname;
    // $data['telephone'] = $member_info->telephone;


    $this->load->view('member/address', $data);
  }
  
  public function dashboard()
  {
    $data = array();
    $data['heading_title'] = 'Dashboard';

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }

    
    $this->load->template('member/dashboard', $data);
  }

  public function login() 
  {
    $data = array();  

    $data['action'] = base_url('member/login');
    $data['link_forgot'] = base_url('member/forgot');

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }

    $data['year'] = $this->model_setting->get('config_register_open')==1 ? $this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year : false;

    if ($this->input->server('REQUEST_METHOD')=='POST') {
      if ($this->model_member->checkConfirm($this->input->post('email'), md5($this->input->post('password'))) == false) {
        $this->session->set_userdata('error','ท่านยังไม่ได้ยืนยันอีเมล หรือ รหัสผ่านไม่ถูกต้อง');
        log_message('error', 'ท่านยังไม่ได้ยืนยันอีเมล หรือ รหัสผ่านไม่ถูกต้อง');
        redirect('member/login');
        exit();
      }
      $result = $this->model_member->login($this->input->post('email'), md5($this->input->post('password')));
      if ( $result !== false ) {

        // ? หาค่า รหัสสมาชิก และ อีเมลบน navbar
        $member_info = $this->model_member->getLists(array('mhd_member.id'=>$result->id)); // get again for detail year;


        $edit = array('date_login'=>date('Y-m-d H:i:s', time()));
        $this->model_member->edit($result->id, $edit);


        $email = '';
        if (count($member_info)==0) {
          $member_no = '';
          $member_no = $member_info->member_no;
          $email = $member_info->email;
        } else { // ? กรณีที่ผู้ใช้ เป็นสมาชิกหลายปี จึงมีหลายรหัส ปปปปxxxx
          $member_no = array();
          foreach ($member_info as $value) {
            $member_no[] = $value->member_no;
            $email = $value->email;
          }
          $member_no = implode(', ', $member_no);
        }

        $member_no = substr($member_no, 0, 4).substr($member_no, 4);

        $this->session->set_userdata('token', $this->encryption->encrypt(json_encode($result)));
        $this->session->set_userdata('member_info', array('member_no'=>$member_no, 'email'=>$email));

        $year = $this->model_setting->get('config_register_open')==1 ? $this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year : false;
        $this->session->set_userdata('year', $year);
      
        // check user has address
        // $company_info = $this->model_company->getListByIdMember($result->id);
        if ($member_info[0]->date_login==null||$member_info[0]->date_login=='0000-00-00 00:00:00') {
          redirect('member/address');
        } else {
          redirect('member/dashboard');
        }
        
        
      } else {
        $this->session->set_userdata('error', 'อีเมล รหัสผ่านผิดพลาด');
        log_message('error', 'อีเมล รหัสผ่านผิดพลาด '.$this->input->post('email').' '.$this->input->post('password'));
        redirect('member/login?notfound');
      }
      exit();
    }

    $this->load->view('member/login', $data);
  }

  public function logout() {
    $this->session->unset_userdata('token');
    $this->session->set_userdata('success','ออกจากระบบเรียบร้อยแล้ว');
    redirect('member/login');
  }

  public function register($email='') {
    $data = array();
    $data['action'] = base_url('member/register/'.$email);
    $data['year'] = $this->model_year->getList( $this->model_setting->get('config_register_year_id') )->year;

    $email = !empty($email) ? base64_decode(urldecode($email)) : $email;
    $data['email'] = $email;

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }
    
    if ($this->input->server('REQUEST_METHOD')=='POST' && (empty($email) ? $this->validation_register() : true)) {

      if (!empty($email)) {
        // ? Find Member in db because main member regis to child member
        $memberFind = $this->model_member->findWaitingEmail($email);
        if ($memberFind!==false) {
          $member_id = (int)$memberFind;

          $update = array(
            'password'   => md5($this->input->post('password')),
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'telephone'  => $this->input->post('telephone'),
            'date_modify' => date('Y-m-d H: i: s'),
            'is_waiting' => 0
          );
          $this->model_member->edit($member_id, $update);
        } else {
          // ? Add Member
          $insert = array(
            'email'      => $this->input->post('email'),
            'password'   => md5($this->input->post('password')),
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'telephone'  => $this->input->post('telephone'),
            'date_added' => date('Y-m-d H: i: s')
          );
          $member_id = $this->model_member->add($insert);
        }

      } else {
        // ? Add Member
        $insert = array(
          'email'      => $this->input->post('email'),
          'password'   => md5($this->input->post('password')),
          'firstname'  => $this->input->post('firstname'),
          'lastname'   => $this->input->post('lastname'),
          'telephone'  => $this->input->post('telephone'),
          'date_added' => date('Y-m-d H: i: s')
        );
        $member_id = $this->model_member->add($insert);
    }

      if ($member_id>0) {
        // ? Add Company of member
        $insert = array(
          'member_id'  => $member_id,
          'name'       => $this->input->post('hospital'),
          'room'       => $this->input->post('room'),
          'address_1'  => $this->input->post('address_1'),
          'address_2'  => $this->input->post('address_2'),
          'district'   => $this->input->post('district'),
          'country'    => $this->input->post('country'),
          'province'   => $this->input->post('province'),
          'postcode'   => $this->input->post('postcode'),
          'telephone'  => $this->input->post('telephone'),
          'fax'        => $this->input->post('fax'),
          'date_added' => date('Y-m-d H: i: s')
        );
        $company_id = $this->model_company->add($insert);

        // ? Add Register
        $insert = array(
          // 'parent_id' => 0, // ! Fixed this อีกเคสคือ สมัครสมาชิกให้คนอื่น
          'member_id' => $member_id,
          'company_id' => $company_id,
          'year_id' => $this->model_setting->get('config_register_year_id'),
          'total' => 0.00,
          'date_added' => date('Y-m-d H:i:s')
        );
        $this->model_register->add($insert);
        


        

        $member_info = $this->model_member->getListByEmail($this->input->post('email'));
        $this->model_member->edit($member_info->id, array('date_modify'=>date('Y-m-d H:i:s')));
        $dataemail = array(
          'name' => $this->input->post('firstname').' '.$this->input->post('lastname'),
          'email' => $this->input->post('email'),
          'link' => base_url().'member/forgot',
          'link_confirm' => base_url().'member/confirm/'.urlencode(base64_encode($this->input->post('email')))
        );
        $message = $this->load->view('email/register', $dataemail, true);
        $subject = 'สมัครสมาชิก โครงการประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก';
        $this->email->smtpsend($this->input->post('email'), $subject, $message);

        $this->session->set_userdata('success', 'สมัครสมาชิกเรียบร้อยแล้ว กรุณาตรวจสอบอีเมลเพื่อยืนยันการเข้าใช้งานระบบ');
        redirect('member/login');
      } else {
        $this->session->set_userdata('error', 'เกิดข้อผิดพลาดในการสมัครสมาชิก');
        redirect('member/register');
      }
    }
    $this->load->view('member/register', $data);
  }

  public function forgot() 
  {
    $data = array();
    $data['action'] = base_url('member/forgot');
    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->success;
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }
    if ($this->session->has_userdata('error')) {
      $data['error'] = $this->session->error;
      $this->session->unset_userdata('error');
    } else {
      $data['error'] = '';
    }
    
    if ($this->input->server('REQUEST_METHOD')=='POST') {
      $email = $this->input->post('email');
      $check_email = $this->model_member->findEmail($email);
      if ($check_email) {
        $member_info = $this->model_member->getListByEmail($email);
        $code = rand(10000,99999);
        $this->model_member->edit($member_info->id, array('forget_code'=>$code,'date_modify'=>date('Y-m-d H:i:s')));
        $dataemail = array(
          'name' => $member_info->firstname.' '.$member_info->lastname,
          'link' => base_url('member/change/'.$email.'/'.$code)
        );
        $message = $this->load->view('email/forgot', $dataemail, true);
        $subject = 'ลืมรหัสผ่าน โครงการประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก';
        $this->email->smtpsend($member_info->email, $subject, $message);
      } else {
        $this->session->set_userdata('error', 'ไม่พบอีเมลในระบบ กรุณาติดต่อเจ้าหน้าที่');
        redirect('member/forgot');
      }
    }

    $this->load->view('member/forgot', $data);
  }

  public function change($email,$code) 
  {
    // $email = $this->input->get('email');
    // $code = $this->input->get('code');

    if ($this->input->server('REQUEST_METHOD')=='POST'){
      $check = $this->model_member->getEmailAndCode($email, $code);
      if ($check) {
        $member_info = $this->model_member->getListByEmail($email);
        $update = array(
          'forget_code' => '',
          'date_modify' => date('Y-m-d H:i:s'),
          'password' => md5($this->input->post('password'))
        );
        $this->model_member->edit($member_info->id, $update);
        $this->session->set_userdata('success', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
        redirect('member/login');
      } else {
        $this->session->set_userdata('error', 'รหัสและอีเมลของท่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง');
        redirect('member/forgot');
      }
    }

    $data = array();
    $data['action'] = base_url('member/change/'.$email.'/'.$code);
    
    $this->load->view('member/change', $data);
  }

  public function confirm($email='')
  {
    $email = base64_decode(urldecode($email));
    if (!empty($email)) {
      $member_info = $this->model_member->getListByEmail($email);
      $this->model_member->edit($member_info->id, array('confirm'=>1));
      $this->session->set_userdata('success','ยืนยันอีเมลเรียบร้อยแล้ว ท่านสามารถเข้าสู่ระบบได้');
      redirect('member/login');
    } else {
      $this->session->set_userdata('error','ไม่พบอีเมลในการยืนยัน');
      redirect('member/login');
    }
    
  }

  public function validation() 
  {
    $this->session->unset_userdata('error');
    if ( valid_email($this->input->post('email')) == false ) {
      $this->session->set_userdata('error', 'ไม่พบอีเมล');
    }
    if ($this->input->post('password') == null) {
      $this->session->set_userdata('error', 'ไม่พบรหัสผ่าน');
    }

    if ($this->session->has_userdata('error')) {
      redirect('member/login');
    }
    
    return true;
  }

  public function validation_register() 
  {
    $this->session->unset_userdata('error');
    if ( valid_email($this->input->post('email')) == false ) {
      $this->session->set_userdata('error', 'ไม่พบอีเมล');
    } else {
      $result = $this->model_member->findEmail($this->input->post('email'));
      if ($result) {
        $this->session->set_userdata('error', 'อีเมลนี้มีผู้ใช้งานในระบบแล้ว');
      }
    }
    if ($this->input->post('password') == null) {
      $this->session->set_userdata('error', 'ไม่พบ รหัสผ่าน');
    }
    if ($this->input->post('confirm') == null) {
      $this->session->set_userdata('error', 'กรุณายืนยันรหัสผ่าน');
    }
    if ($this->input->post('password')!=$this->input->post('confirm')) {
      $this->session->set_userdata('error','รหัสผ่านไม่ตรงกัน');
    }
    if ($this->input->post('firstname') == null) {
      $this->session->set_userdata('error', 'ไม่พบ ชื่อ');
    }
    if ($this->input->post('lastname') == null) {
      $this->session->set_userdata('error', 'ไม่พบ นามสกุล');
    }
    if ($this->input->post('telephone') == null) {
      $this->session->set_userdata('error', 'ไม่พบ เบอร์โทรศัพท์');
    }
    if ($this->input->post('hospital') == null) {
      $this->session->set_userdata('error', 'ไม่พบ ชื่อโรงพยาบาล');
    }
    if ($this->input->post('room') == null) {
      $this->session->set_userdata('error', 'ไม่พบ ชื่อห้องปฏิบัติการ');
    }
    if ($this->input->post('address_1') == null) {
      $this->session->set_userdata('error', 'ไม่พบ ที่อยู่เลขที่บ้าน');
    }
    if ($this->input->post('district') == null) {
      $this->session->set_userdata('error', 'ไม่พบ แขวง/ตำบล');
    }
    if ($this->input->post('country') == null) {
      $this->session->set_userdata('error', 'ไม่พบ เขต/อำเภอ');
    }
    if ($this->input->post('province') == null) {
      $this->session->set_userdata('error', 'ไม่พบ จังหวัด');
    }
    if ($this->input->post('postcode') == null) {
      $this->session->set_userdata('error', 'ไม่พบ รหัสไปษณีย์');
    }
    

    if ($this->session->has_userdata('error')) {
      redirect('member/register');
    }
    
    return true;
  }

}


/* End of file Member.php */
/* Location: ./application/controllers/Member.php */