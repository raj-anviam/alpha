<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_lib {

    protected $CI;

    public function __construct() {
        // Get CI instance
        $this->CI =& get_instance();

        // Load email library
        $this->CI->load->library('email');

        // Gmail SMTP configuration
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.gmail.com',
            'smtp_port'   => 587,
            'smtp_user' => 'info@alphagoldtrading.com',
            'smtp_pass' => 'glrxousefqqhjfuh', // 16-digit App Password
            'smtp_crypto' => 'tls',
            'mailtype'    => 'html',   // You want HTML emails
            'charset'     => 'utf-8',
            'wordwrap'    => TRUE,
            'newline'     => "\r\n"
        );

        // Initialize email config
        $this->CI->email->initialize($config);
    }


    // ------------------------------------------
    // Send Email Function
    // ------------------------------------------
    public function send_email($to, $subject, $message, $from_email = null, $from_name = null)
    {
        if (!$from_email) $from_email = 'info@alphagoldtrading.com';
        if (!$from_name)  $from_name  = 'Alpha Gold Trading';

        $this->CI->email->from($from_email, $from_name);
        $this->CI->email->to($to);

        $this->CI->email->subject($subject);
        $this->CI->email->message($message);

        if ($this->CI->email->send()) {
            return true;
        } else {
            return $this->CI->email->print_debugger();
        }
    }
}
