<?php
class MY_Email extends CI_Email {

    public function __construct($config = array())
    {
            parent::__construct($config);
            // Your own constructor code

    }

    public function smtpsend($email, $subject, $message='') 
    {
        $config = array(
            'protocol'     => 'smtp',
            'smtp_host'    => 'smtp.gmail.com',
            // 'smtp_user' => 'munk.gorn@gmail.com',
            // 'smtp_pass' => 'xiymhnzdnbhekygh',
            'smtp_user'    => 'support@fsoftpro.com',
            'smtp_pass'    => 'fiverama2',
            'smtp_port'    => 587,
            'smtp_timeout' => 5,
            'smtp_crypto'  => 'tls',
            'charset'      => 'utf8',
            'mailtype'     => 'html'
          );
        $this->initialize($config);
        $this->set_newline("\r\n");
        $this->from('eqamtmu@gmail.com', 'Admin');
        $this->to($email);
  
        $this->subject('EQAS MUMT - '.$subject);;
        $this->message($message);

        if (!$this->send()) {
            // show_error($this->print_debugger());
            return false;
        } else {
            return true;
        }
    }
    

}