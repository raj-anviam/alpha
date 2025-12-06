<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function is_logged_in()
{
    $CI = &get_instance();
    $CI->load->model('common_model');
    $user_id =  $CI->input->cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_mineralpha5000', true);
    $user_name =  $CI->input->cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_mineralpha5000', true);
    $token_data =  $CI->input->cookie('QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_mineralpha5000', true);
    $token_expiry =  $CI->input->cookie('GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_mineralpha5000', true);
    $current_date_time = date('Y-m-d H:i:s');
    if ($user_id == '' || $user_name == '' || $token_data == '' || $token_expiry == '') {
        redirect('auth/logout', 'refresh');
    } else {
        $expiry_date = base64d($token_expiry);
        if (strtotime($expiry_date) > strtotime($current_date_time)) {
            $user_id = base64d($user_id);
            $saved_token_data = $CI->common_model->getRecordData('user_token', "user_id = '" . $user_id . "'");
            if (!empty($saved_token_data)) {
                $saved_token = $saved_token_data[0]['token'];
                $saved_ip = $saved_token_data[0]['ip_address'];
                $token_data = base64d($token_data);

                $explose = explode('~', $token_data);
                if (isset($explose[0]) && isset($explose[1])) {
                    $token = $explose[0];
                    $ip_address = $explose[1];
                    if ($saved_token == $token && $saved_ip == $ip_address) {
                        return true;
                    } else {
                        redirect('auth/logout', 'refresh');
                    }
                } else {
                    redirect('auth/logout', 'refresh');
                }
            } else {
                redirect('auth/logout', 'refresh');
            }
        } else {
            redirect('auth/logout', 'refresh');
        }
    }
}


function is_already_logged_in()
{
    $CI = &get_instance();
    $CI->load->model('common_model');

    $user_id =  $CI->input->cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_mineralpha5000', true);
    $user_name =  $CI->input->cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_mineralpha5000', true);
    $token_data =  $CI->input->cookie('QYxEUB0TTj4cZ0gi9PVLMsGOQQwm0VWj_mineralpha5000', true);
    $token_expiry =  $CI->input->cookie('GZRwhaB9JSzwgfH8kC4bZhe1udg70pev_mineralpha5000', true);
    $current_date_time = date('Y-m-d H:i:s');

    if ($user_id != '' && $user_name != '' && $token_data !='' && $token_expiry !='') {
        $expiry_date = base64d($token_expiry);
        if (strtotime($expiry_date) > strtotime($current_date_time)) {
            $user_id = base64d($user_id);
            $saved_token_data = $CI->common_model->getRecordData('user_token', "user_id = '" . $user_id . "'");
            if (!empty($saved_token_data)) {
                $saved_token = $saved_token_data[0]['token'];
                $saved_ip = $saved_token_data[0]['ip_address'];
                $token_data = base64d($token_data);

                $explose = explode('~', $token_data);
                if (isset($explose[0]) && isset($explose[1])) {
                    $token = $explose[0];
                    $ip_address = $explose[1];
                    if ($saved_token == $token && $saved_ip == $ip_address) {
                        redirect('user/home', 'refresh');
                    } else {
                        return true;
                    }
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function get_user_id()
{
    $CI = &get_instance();
    $user_id =  $CI->input->cookie('ALPHiH5NwzfBDBRVwbGIEUA31cYsrw5niVmK_mineralpha5000', true);
    if ($user_id != '') {
        $user_id =  base64d($user_id);
    }
    return $user_id;
}

function get_user_name()
{
    $CI = &get_instance();
    $user_name =  $CI->input->cookie('ALPHQulXPjdIvx21G3JQbNRoeYm3f6CkyUca_mineralpha5000', true);
    if ($user_name != '') {
        $user_name =  base64d($user_name);
    }
    return $user_name;
}

function get_user_email()
{
    $CI = &get_instance();
    $user_email =  $CI->input->cookie('uy86PVn67cYZGHaX_bookkworm', true);
    if ($user_email != '') {
        $user_email =  base64d($user_email);
    }
    return $user_email;
}

function get_user_role()
{
    $CI = &get_instance();
    $user_role_id =  $CI->input->cookie('B5Vf9GBzoAAvIh2z_bookkworm', true);
    $user_role_id =  (int)base64d($user_role_id);
    return $user_role_id;
}

function check_is_admin()
{
    if (get_user_role() == 1) {
        return true;
    } else {
        redirect('admin', 'refresh');
    }
}

function user_ip()
{
    $CI = &get_instance();
    return $CI->input->ip_address();        //return ip.
}
