<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require __DIR__ . '/vendor/autoload.php';


class Result extends CI_Controller
{

  public static $docpath = '';
    
  public function __construct()
  {
    parent::__construct();
    self::$docpath = $_SERVER['DOCUMENT_ROOT'] . '/mhd/';
    require self::$docpath.'assets/vendor/google-drive/autoload.php';
  }

  public function index()
  {
    // default path
    redirect('admin/result/list');
    exit();
  }

  public function list($folderid='', $foldername='') 
  {
    $data = array(); 
    $foldername = base64_decode(urldecode($foldername));
    $data['heading_title'] = 'จัดการไฟล์'.(!empty($folderid) ? ' '.$foldername : '');
    $data['breadcrumbs'] = array(
      'ภาพรวม' => base_url('admin/home'),
      'จัดการไฟล์' => base_url('admin/result/list')
    );
    $data['isfolder'] = false;
    if (!empty($folderid)) {
      $data['breadcrumbs'][$foldername] = base_url('admin/result/list/' . $folderid . '/' .$foldername);
      $data['isfolder'] = true;
    }
    // $data['action'] = base_url('admin/result/lists/'.$page);


    $data['year_id'] = $this->model_setting->get('config_register_year_id');

    // get year
    $data['years'] = $this->model_year->getLists();

    $filter = array();
    $data['programs'] = $this->model_program->getLists($filter);

    $data['trials'] = array();


    $data['success'] = $this->session->has_userdata('success') ? $this->session->success : ''; $this->session->unset_userdata('success');
    $data['error'] = $this->session->has_userdata('error') ? $this->session->error : ''; $this->session->unset_userdata('error');

    $data['program_selected'] = array();

    if ($this->session->has_userdata('urlredirect')) {
      $data['link_redirect'] = $this->session->urlredirect;
      $credentials = json_decode(file_get_contents(self::$docpath . 'google/credentials.json'), true);
      $data['credentials'] = $credentials;
      $this->session->unset_userdata('urlredirect');
      $this->load->template('admin/result/permission', $data);
    } else {
      $data['link_clear'] = base_url('admin/result/clearToken');

      $code = $this->input->get('code');
      $client = $this->getClient($code);
  
      $results = $this->getResult($client, $folderid);

      foreach ($results as $key => $result) {

        if ($result['type']=='application/pdf') { // only pdf not use folder

          // == get data
            $filename = explode('.', $result['name']);
            array_pop($filename);
            $file = explode('_', implode('.', $filename));

            $program_code = isset($file[0])&&!empty($file[0]) ? $file[0]: null ;
            $program_name = isset($file[1])&&!empty($file[1]) ? $file[1]: null ;
            $trial_name   = isset($file[2])&&!empty($file[2]) ? $file[2]: null ;
            $user         = isset($file[3])&&!empty($file[3]) ? $file[3]: null ;
            $subuser      = isset($file[4])&&!empty($file[4]) ? $file[4]: null ;

            $year_id = $this->model_setting->get('config_register_year_id');

            // find program
            $program_id = 0;
            if (!empty($program_name)&&!empty($program_code)) {
              $slug = url_title(convert_accented_characters($program_name), 'dash', true);
              $program_info = $this->model_program->getProgramBySlug($slug);
              $program_id = isset($program_info->id) ? $program_info->id : 0;
            }

            // find trial
            $trial_id = 0;
            if (!empty($trial_name)) {
              $slug = url_title(convert_accented_characters($trial_name), 'dash', true);
              $trial_info = $this->model_trial->getTrialBySlug($slug, $program_id);
              $trial_id = isset($trial_info->id) ? $trial_info->id : 0;
            }

            // find main user
            $user_id = 0;
            $forsubuser = 0;
            $array_sub = array();
            if (!empty($user)) { // 202012345
              $year = substr($user, 0, 4); // 2020
              $year_id = $this->model_year->getYear($year)->id;
              $usercode = substr($user, 4); // 1234
              $user_info = $this->model_member->getListByCode(sprintf('%011d',$usercode));
              $user_id = isset($user_info->id) ? $user_info->id : 0;

              $subs = $this->model_register_program->getListProgramByMemberId($user_id);
              if (count($subs)>0) {
                foreach ($subs as $s) {
                  if (isset($s->sub_member_id)&&!empty($s->sub_member_id)) {
                    $array_sub[] = $s->sub_member_id;
                  }
                }
              }
            }

            

            // find main user
            $subuser_id=0;
            $matchsub = false;
            if (!empty($subuser)) { // 202012345
              $year = substr($subuser, 0, 4); // 2020
              $subusercode = substr($subuser, 4); // 1234
              $subuser_info = $this->model_member->getListByCode(sprintf('%011d',$subusercode));
              // print_r($subuser_info);
              if (in_array($subuser_info->id, $array_sub)) {
                $matchsub = true;
                $subuser_id = isset($subuser_info->id) ? $subuser_info->id : 0;
                if ($subuser_id>0) {
                  $forsubuser = 1;
                  // $user_id = $subuser_id;
                }
              }
            } else {
              $matchsub = true;
            }
            
          // == get data
          
          $check = $this->model_result_link->getListByGoogleId($result['id']);
          if ($check!=false) {
            $id = $check->id; // this id is primary key on table not google id
            $update = array(
              'year_id'       => $year_id,
              'program_id'    => $program_id,
              'trial_id'      => $trial_id,
              'member_id'     => $user_id,
              'sub_member_id' => $subuser_id,
              'is_forsub'     => $forsubuser,
              'google_id'     => $result['id'],
              'google_name'   => $result['name'],
              'google_type'   => $result['type'],
              'date_modify'   => date('Y-m-d H:i:s', time()),
              // 'status'      => 1
            );
            $r = $this->model_result_link->edit($id, $update);
            if ($r==1) {
              $results[$key]['saved'] = true;
            } else {
              $results[$key]['saved'] = false;
            }
          } else {
            $insert = array(
              'year_id'     => $year_id,
              'program_id'  => $program_id,
              'trial_id'    => $trial_id,
              'member_id'     => $user_id,
              'is_forsub'   => $forsubuser,
              'google_id'   => $result['id'],
              'google_name' => $result['name'],
              'google_type' => $result['type'],
              'date_added'  => date('Y-m-d H:i:s', time()),
              'status'      => 1
            );
            $r = $this->model_result_link->add($insert);
            if ($r>0) {
              $results[$key]['saved'] = true;
            } else {
              $results[$key]['saved'] = false;
            }
          }

          // get last data update
          $lastupdate = $this->model_result_link->getListByGoogleId($result['id']);
          $tempYear = $this->model_year->getList($lastupdate->year_id);
          $lastupdate->year_name = isset($tempYear->year) ? $tempYear->year : '-';
          $tempProgram = $this->model_program->getList($lastupdate->program_id);
          $lastupdate->program_name = isset($tempProgram->name) ? $tempProgram->name : '-';
          $tempTrial = $this->model_trial->getList($lastupdate->trial_id);
          $lastupdate->trial_name = isset($tempTrial->name) ? $tempTrial->name : '-';
          $tempMember = $this->model_member->getList($lastupdate->member_id);
          $lastupdate->member_id = isset($tempMember->member_no) ? $tempYear->year.sprintf('%04d',$tempMember->id) : '-';
          $tempSubMember = $lastupdate->sub_member_id > 0 ? $this->model_member->getList($lastupdate->sub_member_id) : false;
          $lastupdate->sub_member_id = isset($tempSubMember->member_no) ? $tempYear->year.sprintf('%04d',$tempSubMember->id) : '-';

          $lastupdate->match_sub = $matchsub;
          // print_r($lastupdate);
          $results[$key]['data'] = $lastupdate;
          // $data['program_selected'][] = array('key' => $key, 'id' => $lastupdate->program_id);

          $filter = array(
            'year_id' => $lastupdate->year_id,
            'program_id' => $lastupdate->program_id
          );
          $results[$key]['trials'] = $this->model_trial->getLists($filter);

          $results[$key]['users'] = $this->model_member->getList($lastupdate->member_id);

        }
      }
      // echo '<pre>';
      // print_r($results);
      // echo '</pre>';
      $data['results'] = $results;
  
      $this->load->template('admin/result/index', $data);
    }
  }

  public function findTrial()
  {
    $year_id = $this->input->post('year_id');
    $program_id = $this->input->post('program_id');
    $data = array();
    $data = array();
    if ($year_id>0) {
      $filter = array(
        'year_id' => $year_id,
        'program_id' => $program_id
      );
      $data = $this->model_trial->getLists($filter);
    }
    
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
  }

  public function saveStatus()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    $result = $this->model_result_link->edit($id, array('status'=> $status));
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }

  // ========================================

  public function getClient($code) 
  {
    $client = null;

    try {
      $credentials = json_decode(file_get_contents(self::$docpath . 'google/credentials.json'), true);

      $client = new Google_Client();
      $client->setApplicationName('Google Drive API PHP Quickstart');
      $client->setScopes('https://www.googleapis.com/auth/drive');
      $client->setAuthConfig(self::$docpath . 'google/credentials.json');
      $client->setAccessType('offline');
      $client->setPrompt('select_account consent');
      // $urlcallback = base_url('admin/result'); // Link Redirect in Google Drive API
      $client->setRedirectUri($credentials['redirect_uris']);

      $tokenPath = self::$docpath . 'google/token.json';
      if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
      }
      // If there is no previous token or it's expired.
      if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
          $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
          if (empty($code)) {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            $this->session->set_userdata('urlredirect', $authUrl);
            $this->session->set_userdata('error', 'Request authorization by google.');
            redirect('admin/result/list/');
            exit();  
          } else {
            $authCode = trim(($code));
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
          }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    } catch (Exception $e) {
      throw $e;
    }

    return $client;
  }

  public function clearToken()
  {
    $tokenPath = self::$docpath . 'google/token.json';
    unlink($tokenPath);
    redirect('admin/result/list');
  }

  public function getResult($client, $folderid = '') 
  {
    $data = array();
    try {
      $service = new Google_Service_Drive($client);
      $credentials = json_decode(file_get_contents(self::$docpath . 'google/credentials.json'), true);

      $folderid = urldecode($folderid);

      // Print the names and IDs for up to 10 files.
      $optParams = array(
        'pageSize' => 100,
        // 'q'        => "'".$credentials['folderId']."' in parents and mimeType = 'application/pdf'",
        // 'q' => "'".$credentials['folderId']."' in parents and  mimeType = 'application/vnd.google-apps.folder'",
        'fields'   => 'nextPageToken, files(id, name, mimeType)',
      );
      if (empty($folderid)) {
        $optParams['q'] = "'".$credentials['folderId']."' in parents and (mimeType = 'application/vnd.google-apps.folder' or mimeType = 'application/pdf')";
      } else {
        $optParams['q'] = "'".$folderid."' in parents and (mimeType = 'application/vnd.google-apps.folder' or mimeType = 'application/pdf')";
      }
  
      $results = $service->files->listFiles($optParams);
      // echo $nextPage = $service->nextPageToken;
      // exit();

      if (!empty($folderid)) {
        $data[] = array(
          'link' => base_url('admin/result/list'),
          'target' => '',
          'id' => '',
          'type' => 'application/vnd.google-apps.folder',
          'name' => '..',
        );
      }

  
      if (count($results->getFiles()) == 0) {
          // print "No files found.\n";
      } else {
        
          foreach ($results->getFiles() as $file) {
            $data[] = array(
              'link' => (!empty($folderid)) ? 'https://drive.google.com/file/d/'.$file->getId().'/view?usp=sharing' : base_url('admin/result/list/'.urlencode($file->getId()).'/'.urlencode(base64_encode($file->getName()))),
              'target' => (!empty($folderid)) ? '_blank' : '',
              'id'   => $file->getId(),
              'type' => $file->getMimeType(),
              'name' => $file->getName()
            );
              // echo '<a href="https://drive.google.com/file/d/'.$file->getId().'/view?usp=sharing" target="new">'.$file->getName().'</a><br>';
          }
      }
    } catch (Exception $e) {
      throw $e;
    }

    return $data;
  }
    

}