<?php
class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        date_default_timezone_set('Asia/Kolkata');
    }

    function index()
    {
        $this->signin();
    }

    function register()
    {
        $data['error'] = "";
        $uri3 = '';
        if (isset($_GET['sp']) && $_GET['sp'] != '') {
            $uri3 = $_GET['sp'];
        }
        $data['uri3'] = $uri3;
        $this->load->view('auth/register', $data);
    }

    function sign_up()
    {
        $uri3 = $this->uri->segment(3);
        $formSubmit = array('status' => 'error', 'url' => '', 'msg' => 'Something Went Wrong.');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|is_unique[users.username]');
        $this->form_validation->set_rules('name', 'name', 'trim|required|alpha_numeric_spaces|max_length[30]');
        $this->form_validation->set_rules('mailid', 'Email', 'trim|required|valid_email|max_length[30]|is_unique[users.email]');
        $this->form_validation->set_rules('authentication_password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[authentication_password]|min_length[6]');
        $this->form_validation->set_rules('address', 'Address', 'trim|alpha_numeric_spaces|max_length[100]');
        $this->form_validation->set_rules('phone', 'Mobile', 'trim|numeric|max_length[10]');
        $this->form_validation->set_rules('code', 'Code', 'trim');
        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            $errors = str_replace("<p>", "<li>", $errors);
            $errors = str_replace("</p>", "</li>", $errors);
            $errors = str_replace("The", "", $errors);
            $errors = '<ul>' . $errors . '</ul>';
            $formSubmit['msg'] = $errors;
            echo json_encode($formSubmit);
        } else {
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $email = $this->input->post('mailid');
            $mobile = $this->input->post('phone');
            $address = $this->input->post('address');
            $code = $this->input->post('code');
            if($uri3 !=''){
                $code =$uri3;
            }
            $password = md5($this->input->post('authentication_password'));

            $data = array(
                'username' => $username,
                'full_name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'password' => $password,
                'address' => $address
            );
            $ref_data = array();
            if ($code != '') {
                $Whr = "referal_code = '" . $this->db->escape_str($code) . "'";
                $ref_data = $this->common_model->getRecordData('itroducing_alpha', $Whr);
                if (!empty($ref_data)) {
                    $reference_id = $ref_data[0]['user_id'];
                    $reference_user = $ref_data[0]['user_name'];
                    $data['reference_id'] = $reference_id;
                    $data['reference_user'] = $reference_user;
                }
            }
            $table = 'users';
            $result = $this->common_model->insert($data, $table);
            if (is_numeric($result)) {
                $new_user = $result;
                if (!empty($ref_data)) {
                    $itroducing_alpha_id = $ref_data[0]['itroducing_alpha_id'];
                    $reference_id = $ref_data[0]['user_id'];
                    $intro_data[] = array(
                        'itroducing_alpha_id' => $itroducing_alpha_id,
                        'down_user_id' => $new_user,
                        'level' => 1
                    );
                    $custom_where = "down_user_id = '" . $reference_id . "'";
                    $order_by = array(
                        'level' => 'ASC'
                    );
                    $matrix_downline_rec = $this->common_model->getRecordData('downline_matrix', $custom_where, '', $order_by);
                    foreach ($matrix_downline_rec as $val) {
                        $itroducing_alpha_id = $val['itroducing_alpha_id'];
                        $level = $val['level'];
                        $next_level = $level + 1;
                        $intro_data[] = array(
                            'down_user_id' => $new_user,
                            'itroducing_alpha_id' => $itroducing_alpha_id,
                            'level' => $next_level
                        );
                    }
                    $LData = $this->common_model->insert_batch($intro_data, 'downline_matrix');
                }
                $this->load->library('Email_lib');
                $otp = rand(1000, 9999);
                $mailMsg = '<h2>Your verification Code is ' . $otp . '</h2>';
                $result = $this->email_lib->send_email(
                    $email,
                    'Email Verification Code',
                    $mailMsg
                );

                if ($result === true) {

                    $datetime = new DateTime(); // Current date and time
                    $created_on = $datetime->format('Y-m-d H:i:s');

                    $expire_on_datetime = $datetime->modify('+10 minutes');
                    $expire_on = $datetime->format('Y-m-d H:i:s');
                    $token = randomString(32);
                    $otp_d = array(
                        'user_id' => $new_user,
                        'token' => $token,
                        'otp' => $otp,
                        'otp_type_id' => 1,
                        'created_on' => $created_on,
                        'expire_on' => $expire_on
                    );
                    $otp_result = $this->common_model->insert($otp_d, 'verification_otp');
                    if (is_numeric($otp_result)) {
                        $formSubmit['status'] = 'success';
                        $formSubmit['url'] = site_url('auth/verify_email/' . $token);
                        $formSubmit['msg'] = 'Otp has been sent to your mail.Please verify.';
                    }
                } else {
                    $formSubmit['msg'] = 'Email Verification Error.';
                }
            }
            echo json_encode($formSubmit);
        }
    }

    function verify_email()
    {
        $uri3 = $this->uri->segment(3);
        if ($uri3 == '') {
            echo 'Something Went Wrong.';
            exit;
        }
        $curDate = date('Y-m-d H:i:s');
        $cwhr = "token = '".$uri3."' AND expire_on > '".$curDate."'";
        $recById = $this->common_model->getRecordData('verification_otp',$cwhr);
        $showForm = 0;
        if(!empty($recById)){
            $showForm = 1;
        }
        $data['uri3'] = $uri3;
        $data['showForm'] = $showForm;
        $this->load->view('auth/verify_email', $data);
    }

    function confirm_otp()
    {
        $formSubmit = array('status' => 'error', 'url' => '', 'msg' => 'Something Went Wrong.');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uri3 = $this->uri->segment(3);
            
            if ($uri3 !='') {
                $formSubmit['msg'] = 'Invalid OTP-';
                $curDate = date('Y-m-d H:i:s');
                $cwhr = "token = '".$uri3."' AND expire_on > '".$curDate."'";
                $recById = $this->common_model->getRecordData('verification_otp',$cwhr);
                if (!empty($recById)) {
                    $otpSent = $recById[0]['otp'];
                    $user_id = $recById[0]['user_id'];
                    $one = $this->input->post('one');
                    $two = $this->input->post('two');
                    $three = $this->input->post('three');
                    $four = $this->input->post('four');
                    $user_entered_otp = $one . $two . $three . $four;
                    if ($user_entered_otp == $otpSent) {
                        $uData = array('is_email_verified' => 1);
                        $rData = $this->common_model->update($user_id, $uData, 'user_id', 'users');
                        if (is_numeric($rData)) {
                            $formSubmit['status'] = 'success';
                            $formSubmit['url'] = site_url('auth/signin');
                            $formSubmit['msg'] = 'Thank u for verification.';
                        }
                    }
                }
            }
        }
        echo json_encode($formSubmit);
    }

    function resend_otp()
    {
        $formSubmit = array('status' => 'error', 'url' => '', 'msg' => 'Something Went Wrong.');
        $uri3 = $this->uri->segment(3);
        
        if ($uri3 != '') {
            // Get the existing OTP record to find user_id (even if expired, we can still resend)
            $cwhr = "token = '".$this->db->escape_str($uri3)."'";
            $recById = $this->common_model->getRecordData('verification_otp', $cwhr);
            
            if (!empty($recById)) {
                $user_id = $recById[0]['user_id'];
                $otp_type_id = $recById[0]['otp_type_id'];
                
                // Get user email
                $userWhr = "user_id = " . (int)$user_id;
                $userData = $this->common_model->getRecordData('users', $userWhr);
                
                if (!empty($userData)) {
                    $email = $userData[0]['email'];
                    
                    // Generate new OTP
                    $otp = rand(1000, 9999);
                    
                    // Send email
                    $this->load->library('Email_lib');
                    $mailMsg = '<h2>Your verification Code is ' . $otp . '</h2>';
                    $result = $this->email_lib->send_email(
                        $email,
                        'Email Verification Code',
                        $mailMsg
                    );
                    
                    if ($result === true) {
                        // Generate new token
                        $token = randomString(32);
                        
                        $datetime = new DateTime();
                        $created_on = $datetime->format('Y-m-d H:i:s');
                        $expire_on_datetime = $datetime->modify('+10 minutes');
                        $expire_on = $expire_on_datetime->format('Y-m-d H:i:s');
                        
                        // Update existing OTP record with new token, OTP, and expiry
                        $otp_d = array(
                            'token' => $token,
                            'otp' => $otp,
                            'created_on' => $created_on,
                            'expire_on' => $expire_on
                        );
                        $otp_id = $recById[0]['verification_otp_id'];
                        $rData = $this->common_model->update($otp_id, $otp_d, 'verification_otp_id', 'verification_otp');
                        
                        if (is_numeric($rData)) {
                            $formSubmit['status'] = 'success';
                            $formSubmit['url'] = site_url('auth/verify_email/' . $token);
                            $formSubmit['msg'] = 'OTP has been resent to your email. Please check your inbox.';
                        }
                    } else {
                        $formSubmit['msg'] = 'Email Verification Error.';
                    }
                } else {
                    $formSubmit['msg'] = 'User not found.';
                }
            } else {
                $formSubmit['msg'] = 'Invalid or expired token.';
            }
        } else {
            $formSubmit['msg'] = 'Token is required.';
        }
        echo json_encode($formSubmit);
    }

    function signin()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
    {
        is_already_logged_in();
        $data['error'] = "";

        $this->form_validation->set_rules('username', 'Username Or Email', 'trim|required|callback__validate_login');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/signin', $data);
        } else {
            $usr = $this->input->post('username');
            $password = $this->input->post('password');
            $cryptPwd = md5($password);
            $userData = $this->common_model->validate_login($usr, $cryptPwd);

            if (empty($userData)) {
                $this->session->set_flashdata('error', 'Invalid login details');
                redirect('auth/signin');
            } else {

                $user_id = $userData[0]['user_id'];
                $username = $userData[0]['username'];
                $user_token_id = $userData[0]['user_token_id'];

                $domian = 'mineralpha5000';
                $cookie_secure = false;
                $domain_valid = '';

                delete_cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_' . $domian);
                delete_cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_' . $domian);
                delete_cookie('QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_' . $domian);
                delete_cookie('GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_' . $domian);

                $cookie1 = array(
                    'name'   => 'ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_' . $domian,
                    'value'  => base64e($user_id),
                    'expire' => '2595000', //one month expiry
                    'domain' => $domain_valid,
                    'secure' => $cookie_secure
                );
                $this->input->set_cookie($cookie1);


                $cookie2 = array(
                    'name'   => 'ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_' . $domian,
                    'value'  => base64e($username),
                    'expire' => '2595000', //one month expiry
                    'domain' => $domain_valid,
                    'secure' => $cookie_secure
                );
                $this->input->set_cookie($cookie2);
                $token = rand(1000000000, 9999999999);
                $ip_address = user_ip();
                $datetime = new DateTime(); // Current date and time
                $created_on = $datetime->format('Y-m-d H:i:s');

                $expire_on_datetime = $datetime->modify('+10 minutes');
                $token_expiry = $datetime->format('Y-m-d H:i:s');
                $tokencookie = array(
                    'name'   => 'QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_' . $domian,
                    'value'  => base64e($token . '~' . $ip_address),
                    'expire' => '86400', //one day expiry
                    'domain' => $domain_valid,
                    'secure' => $cookie_secure
                );
                $this->input->set_cookie($tokencookie);

                $expirycookie = array(
                    'name'   => 'GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_'. $domian,
                    'value'  => base64e($token_expiry),
                    'expire' => '86400', //one month expiry
                    'domain' => $domain_valid,
                    'secure' => $cookie_secure
                );
                $this->input->set_cookie($expirycookie);
                $data = array(
                    'user_id' => $user_id,
                    'token' => $token,
                    'ip_address' => $ip_address,
                    'created_date' => $created_on,
                    'token_expiry' => $token_expiry
                );

                $table = 'user_token';
                if ((int)$user_token_id > 0) {
                    $result = $this->common_model->update($user_token_id, $data, 'user_token_id', $table);
                } else {
                    $result = $this->common_model->insert($data, $table);
                }
                redirect('user/home');
            }
        }
    }

    function _validate_login($usr)
    {
        $password = $this->input->post('password');
        if ($usr != '' && $password != '') {
            $cryptPwd = md5($password);
            $userData = $this->common_model->validate_login($usr, $cryptPwd);
            if (empty($userData)) {
                $this->form_validation->set_message('_validate_login', 'Invalid Username or Password.');
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }


    function logout()
    {
        $domian = 'mineralpha5000';
        delete_cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_' . $domian);
        delete_cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_' . $domian);
        delete_cookie('QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_' . $domian);
        delete_cookie('GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_' . $domian);
        redirect('auth/signin', 'refresh');
    }

    function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_valid_mail');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot_password');
        } else {
            $status = 'error';
            $message = 'Email Verification Error.';
            $email = $this->input->post('email');
            $whr = "email = '" . $email . "'";
            $dataByMail = $this->common_model->getRecordData('users', $whr);
            $user_id = $dataByMail[0]['user_id'];
            $this->load->library('Email_lib');
            $otp = randomString(32);
            $resetLink = site_url('auth/resetuserpassword/?id=' . $otp);
            $mailMsg = '<h2>Follow this link to reset password - ' . $resetLink . '</h2>';
            $result = $this->email_lib->send_email(
                $email,
                'Reset your Password',
                $mailMsg
            );

            if ($result === true) {

                $datetime = new DateTime(); // Current date and time
                $created_on = $datetime->format('Y-m-d H:i:s');

                $expire_on_datetime = $datetime->modify('+30 minutes');
                $expire_on = $datetime->format('Y-m-d H:i:s');
                $otp_d = array(
                    'user_id' => $user_id,
                    'token' => $otp,
                    'otp_type_id' => 2,
                    'created_on' => $created_on,
                    'expire_on' => $expire_on
                );
                $otp_result = $this->common_model->insert($otp_d, 'verification_otp');
                if (is_numeric($otp_result)) {
                    $status = 'success';
                    $message = 'We have just sent you an email with instructions to reset your password.Please ensure you check your email’s spam folder.';
                }
            }
            if ($status == 'success') {
                $flashMessage = '<div class="alert alert-success d-flex align-items-center mt-5" role="alert">
                            <svg class="flex-shrink-0 me-2 svg-success" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
                            <div>' . $message . '</div>
                        </div>';
            } else {
                $flashMessage = '<div class="alert alert-danger d-flex align-items-center mt-5" role="alert">
                    <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><g><path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z"/><rect height="6" width="2" x="11" y="7"/><rect height="2" width="2" x="11" y="15"/></g></g></g></svg>
                    <div>' . $message . '</div>
                </div>';
            }
            $this->session->set_flashdata('formMsg', $flashMessage);
            redirect('auth/signin');
        }
    }

    function _check_valid_mail($str)
    {
        if ($str != '') {
            $whr = "email = '" . $str . "'";
            $dataByMail = $this->common_model->getRecordData('users', $whr);
            if (empty($dataByMail)) {
                $this->form_validation->set_message('_check_valid_mail', 'Invalid Email.');
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    function resetuserpassword()
    {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $token = $_GET['id'];
            $currentTime = date('Y-m-d H:i:s');
            $whr = "token = '" . $token . "' and expire_on > '" . $currentTime . "'";
            $getByToken = $this->common_model->getRecordData('verification_otp', $whr);
            $showForm = 0;
            if (!empty($getByToken)) {
                $showForm = 1;
            }
            $data['uri3'] = $token;
            $data['showForm'] = $showForm;
            $this->load->view('auth/change_password', $data);
        }
    }

    function change_password()
    {
        $formSubmit = array('status' => 'error', 'url' => '', 'msg' => 'Invalid Link Or Link Expired.');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]|min_length[6]');
        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            $errors = str_replace("<p>", "<li>", $errors);
            $errors = str_replace("</p>", "</li>", $errors);
            $errors = str_replace("The", "", $errors);
            $errors = '<ul>' . $errors . '</ul>';
            $formSubmit['msg'] = $errors;
            echo json_encode($formSubmit);
        } else {
            $password = $this->input->post('password');
            $token = $this->uri->segment(3);
            if ($token != '') {
                $currentTime = date('Y-m-d H:i:s');
                $whr = "token = '" . $token . "' and expire_on > '" . $currentTime . "'";
                $getByToken = $this->common_model->getRecordData('verification_otp', $whr);
                if (!empty($getByToken)) {
                    $user_id = $getByToken[0]['user_id'];
                    $newPassword = md5($password);
                    $uData = array('password' => $newPassword);
                    $rData = $this->common_model->update($user_id, $uData, 'user_id', 'users');
                    if (is_numeric($rData)) {
                        $domian = 'mineralpha5000';
                        delete_cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_' . $domian);
                        delete_cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_' . $domian);
                        delete_cookie('QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_' . $domian);
                        delete_cookie('GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_' . $domian);
                        $formSubmit['status'] = 'success';
                        $formSubmit['url'] = site_url('auth/signin');
                        $formSubmit['msg'] = 'Your Password has been changed successfully.';
                    }
                }
            }
            echo json_encode($formSubmit);
        }
    }

    function user_rec()
    {
        // Custom parameters are ALWAYS delivered via the query string
        $trans_no = $_GET['tnxno'] ?? ($data['tnxno'] ?? null);

        $trans_no = base64d($trans_no);
        if (is_numeric($trans_no)) {
            $cWhr = "transaction_no = " . $trans_no;
            $recByno = $this->common_model->getRecordData('payments', $cWhr);
            if (!empty($recByno)) {
                $payment_id = $recByno[0]['payment_id'];
                $user_id = $recByno[0]['user_id'];
                date_default_timezone_set('Asia/Kolkata');
                $response_received_at = date('Y-m-d H:i:s');
                $udata = array('status_id' => 2, 'response_received_at' => $response_received_at);
                $rData = $this->common_model->update($payment_id, $udata, 'payment_id', 'payments');
                if(is_numeric($rData)){
                    $cWhr = "user_id =".$user_id;
                    $userData = $this->common_model->getRecordData('users',$cWhr);
                    if(!empty($userData)){
                        $email = $userData[0]['email'];
                        $this->load->library('Email_lib');
                        $mailMsg = '<h2>THANK YOU FOR CHOOSING US.</h2><h3></h3>';
                        $result = $this->email_lib->send_email(
                            $email,
                            'Payment Successful.',
                            $mailMsg
                        );
                    }
                }
            }
        }
    }
}
