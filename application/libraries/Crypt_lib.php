<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';

class Crypt_lib
{
    function get_payment_qr($coin,$my_address,$parameters,$amount,$callback_url){
       
        //$callback_url = 'https://example.com';
        $cryptapi_params =[
            'post' => 0,
            'json' => 0,
            'pending' => 1,
            'multi_token' => 0,
            'convert' => 1
        ];

        $ca = new CryptAPI\CryptAPI($coin, $my_address, $callback_url, $parameters, $cryptapi_params);
        //return $ca; exit;
        $payment_address = $ca->get_address();
        $qrcode = $ca->get_qrcode($amount, 128);
        $qrArr = array('payment_address'=>$payment_address,'qrcode'=>$qrcode);
        return $qrArr;
    }

    function callback_data($parm){
        $payment_data = CryptAPI\CryptAPI::process_callback($parm);
        return $payment_data;
    }
}