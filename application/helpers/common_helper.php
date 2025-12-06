<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function calculate_age($dob_string) {
    // Create DateTime objects for the date of birth and today's date
    $dob = new DateTime($dob_string);
    $today = new DateTime('today');

    // Calculate the difference between the two dates
    $diff = $today->diff($dob);

    // Extract the number of years from the DateInterval object
    return $diff->y;
}

function randomString($length = 12, $type = 'alpha_numeric')
{
    $str = "";
    if ($type == 'alpha_numeric') {
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    } else {
        $characters = array_merge(range('A', 'Z'), range('a', 'z'));
    }

    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    $CI = &get_instance();
    $CI->load->model('common_model');
    $cwhr = "token = '".$str."'";
    $getByno = $CI->common_model->getRecordData('verification_otp',$cwhr);
    if(!empty($getByno)){
        randomString($length);
    }else{
        return $str;
    }
}

function get_transaction_no(){
    $random_number = random_int(100000000, 999999999);
    $CI = &get_instance();
    $CI->load->model('common_model');
    $cwhr = "transaction_no = ".$random_number;
    $getByno = $CI->common_model->getRecordData('payments',$cwhr);
    if(!empty($getByno)){
        get_transaction_no();
    }else{
        return $random_number;
    }
}