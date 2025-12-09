<?php
class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('user/user_model');
        is_logged_in();
        date_default_timezone_set('Asia/Kolkata');
    }

    function home()
    {
        $user_id = get_user_id();
        $user_details = $this->user_model->getUserDetails($user_id);
        $data['user_details'] = $user_details;
        $whr = "user_id = " . $user_id;
        $refData = $this->common_model->getRecordData('itroducing_alpha', $whr);
        $data['refData'] = $refData;
        $this->load->view('user/home', $data);
    }

    function create_account()
    {
        $this->load->view('user/create_account');
    }

    function start_trading()
    {
        $pWhr = "status = 1";
        $payment_method = $this->common_model->getRecordData('payment_method', $pWhr);
        $data['payment_method'] = $payment_method;
        $this->load->view('user/start_trading', $data);
    }

    function get_qrcode()
    {

        $formMsg = array('status' => 'error', 'msg' => 'Invalid Data.');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $method = $_POST['method_id'];
            $server_name = $_POST['server_name'];
            $trading_id = $_POST['trading_id'];
            $trading_password = $_POST['trading_password'];
            $email_id = $_POST['email_id'];
            if ($method != '' && $server_name != '' && $trading_id != '' && $trading_password != '' && $email_id != '') {
                if ($method == '7sb0HhFOpRWRAHfOKxM1QA_E0L0S__E0L0S_' || $method == 'f4S6C_S0L0H_amUTH36Z2OjmVhZQ_E0L0S__E0L0S_') {
                    if ($method == 'f4S6C_S0L0H_amUTH36Z2OjmVhZQ_E0L0S__E0L0S_') {
                        $coin = 'trc20_usdt';
                        $my_address = 'THwvpLa6bMRTLvxbB2cFFQzUcoVNoXJCTJ';
                    } else {
                        $coin = 'bep20_usdt';
                        $my_address = '0x64377b35ab5d687Dec7E11fE4016f314703B1B0B';
                    }
                    $user_id = get_user_id();
                    $transaction_no = get_transaction_no();
                    $currency = $coin;
                    $amount = 1;

                    $this->load->library('Crypt_lib');
                    $trans_no_enc = base64e($transaction_no);
                    $parameters = ['tnxno' => $trans_no_enc];
                    $callback_url = site_url('auth/user_rec');
                    //$encodedUrl = urlencode($callback_url);
                    //echo $callback_url; exit;
                    $qrcodeArr = $this->crypt_lib->get_payment_qr($coin, $my_address, $parameters, $amount, $callback_url);
                    if (isset($qrcodeArr['qrcode'])) {
                        $qrcode = $qrcodeArr['qrcode'];
                        if (isset($qrcode->status)) {
                            $status = $qrcode->status;
                            if ($status == 'success') {
                                $qr = $qrcode->qr_code;
                                $payment_address = $qrcodeArr['payment_address'];
                                $user_name = get_user_name();
                                $payment_method_id = base64d($method);
                                $description = 'Payment request for' . $amount . ' created by ' . $user_name;
                                $created_at = date('Y-m-d H:i:s');
                                $uData = array(
                                    'user_id' => $user_id,
                                    'order_id' => $transaction_no,
                                    'transaction_no' => $transaction_no,
                                    'payment_method_id' => $payment_method_id,
                                    'currency' => $currency,
                                    'amount' => $amount,
                                    'status_id' => 1,
                                    'description' => $description,
                                    'created_at' => $created_at,
                                    'qr' => $qr
                                );
                                $rData = $this->common_model->insert($uData, 'payments');
                                if (is_numeric($rData)) {
                                    $payment_id = $rData;
                                    $server_name = $this->input->post('server_name');
                                    $trading_id = $this->input->post('trading_id');
                                    $trading_password = base64e($this->input->post('trading_password'));
                                    $email_id = $this->input->post('email_id');
                                    $serverDetails = array(
                                        'user_id' => $user_id,
                                        'server' => $server_name,
                                        'payment_id' => $payment_id,
                                        'td_id' => $trading_id,
                                        'password' => $trading_password,
                                        'email_id' => $email_id,
                                        'created_on' => $created_at
                                    );
                                    $sData = $this->common_model->insert($serverDetails, 'user_td_account');
                                    $html = '<div class="col-xl-12"><img src="data:image/png;base64,' . $qrcode->qr_code . '"/></div><div class="col-xl-12"><label for="qr" class="form-label">Or Copy this address</label><input type="text" class="form-control" value="' . $payment_address . '" readonly></div><div class="col-xl-12"><a href="' . site_url('user/payment_successful/?id=' . $trans_no_enc) . '" class="btn btn-outline-primary btn-wave">Click After Payment.</a></div>';
                                    $formMsg = array('status' => 'success', 'msg' => $html);
                                }
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($formMsg);
    }

    function payment_successful()
    {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = base64d($_GET['id']);
            if (is_numeric($id)) {
                $cWhr = "transaction_no = " . $id;
                $recByno = $this->common_model->getRecordData('payments', $cWhr);
                if (!empty($recByno)) {
                    $payment_id = $recByno[0]['payment_id'];
                    $uData = array('is_user_submitted' => 1);
                    $rData = $this->common_model->update($payment_id, $uData, 'payment_id', 'payments');
                }
            }
        }
        $this->load->view('user/payment_successful');
    }

    function refer_friend()
    {
        $user_id = get_user_id();
        $whr = "user_id = " . $user_id;
        $refData = $this->common_model->getRecordData('itroducing_alpha', $whr);
        $data['refData'] = $refData;
        $this->load->view('user/refer_friend', $data);
    }

    function apply_refferal()
    {
        $user_id = get_user_id();
        $whr = "user_id = " . $user_id;
        $rData = 'error';
        $getById = $this->common_model->getRecordData('itroducing_alpha', $whr);
        if (empty($getById)) {
            $user_name = get_user_name();
            $date = date('Y-m-d');
            $data = array(
                'user_id' => $user_id,
                'user_name' => $user_name,
                'status' => 0,
                'date' => $date
            );
            $rData = $this->common_model->insert($data, 'itroducing_alpha');
        }
        if (is_numeric($rData)) {
            redirect('user/thanksforapplying');
        } else {
            redirect('user/refer_friend');
        }
    }

    function thanksforapplying()
    {
        $this->load->view('user/thanks');
    }

    function user_profile()
    {
        $user_id = get_user_id();
        $recById = $this->user_model->getUserDetails($user_id);
        $data['recById'] = $recById;
        $this->load->view('user/user_profile', $data);
    }

    function profile_settings()
    {
        $user_id = get_user_id();
        $whr = "user_id = " . $user_id;
        $recById = $this->common_model->getRecordData('users', $whr);
        $data['recById'] = $recById;
        $data['countriesRec'] = $this->common_model->getRecordData('countries');
        $data['gendersRec'] = $this->common_model->getRecordData('genders');
        $this->load->view('user/profile_settings', $data);
    }

    function save_profile_settings()
    {
        $formSubmit = array('status' => 'error', 'url' => '', 'msg' => 'Something Went Wrong.');
        $user_id = get_user_id();
        $whr = "user_id = " . $user_id;
        $recById = $this->common_model->getRecordData('users', $whr);
        if (empty($recById)) {
            echo json_encode($formSubmit);
            exit;
        }
        $db_user_name = $recById[0]['username'];
        $username = $this->input->post('username');
        $is_unique = '|is_unique[users.username]';
        if ($db_user_name == $username) {
            $is_unique = '';
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]' . $is_unique);
        $this->form_validation->set_rules('full_name', 'name', 'trim|required|alpha_numeric_spaces|max_length[30]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim');
        $this->form_validation->set_rules('dob', 'DOB', 'trim');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('country', 'Country', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');
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
            $name = $this->input->post('full_name');
            $gender = $this->input->post('gender');
            $gender_id = '';
            if ($gender != '') {
                $gender_id = (int)base64d($gender);
            }
            $country = $this->input->post('country');
            $country_id = '';
            if ($country != '') {
                $country_id = (int)base64d($country);
            }
            $date = $this->input->post('dob');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');

            // Handle image upload
            $profile_image = '';
            if (!empty($_FILES['profileImageInput']['name'])) {
                $config['upload_path'] = './uploads/profile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE;

                // Create directory if it doesn't exist
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profileImageInput')) {
                    $upload_data = $this->upload->data();
                    $profile_image = $upload_data['file_name'];

                    // Delete old profile image if exists
                    if (!empty($recById[0]['profile_image']) && file_exists('./uploads/profile/' . $recById[0]['profile_image'])) {
                        @unlink('./uploads/profile/' . $recById[0]['profile_image']);
                    }
                } else {
                    $formSubmit['msg'] = $this->upload->display_errors('', '');
                    echo json_encode($formSubmit);
                    exit;
                }
            }

            $uData = array(
                'username' => $username,
                'full_name' => $name,
                'gender_id' => $gender_id,
                'country_id' => $country_id,
                'dob' => $date,
                'mobile' => $mobile,
                'address' => $address
            );

            // Check if profile_image column exists before adding it
            // Only add profile image if column exists in database
            if (!empty($profile_image)) {
                // Check if column exists in users table
                $query = $this->db->query("SHOW COLUMNS FROM `users` LIKE 'profile_image'");
                $column_exists = ($query->num_rows() > 0);
                $uData['profile_image'] = $profile_image;
                if (!$column_exists) {
                    $this->db->query("ALTER TABLE `users` ADD `profile_image` VARCHAR(255) NULL");
                    // end of add column here for profile image
                }
              
            }

            $rData = $this->common_model->update($user_id, $uData, 'user_id', 'users');
            if (is_numeric($rData)) {
                $formSubmit['status'] = 'success';
                $formSubmit['url'] = site_url('user/profile_settings');
                $formSubmit['msg'] = 'Your Profile Settings Changed Successfully.';
            }
            echo json_encode($formSubmit);
        }
    }

    function partner_program()
    {
        $user_id = get_user_id();
        $whr = "user_id = " . $user_id;
        $refData = $this->common_model->getRecordData('itroducing_alpha', $whr);
        $data['refData'] = $refData;
        $this->load->view('user/partner_program', $data);
    }

    function tnc()
    {
        $this->load->view('user/tnc');
    }
    function privacy_policy()
    {
        $this->load->view('user/privacy_policy');
    }
}
