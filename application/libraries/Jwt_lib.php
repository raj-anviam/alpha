<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Jwt_lib
{

  public function zoom_account_id()
  {
    return 'VPjejor8TD-P-gq3-4RjRw';
  }

  public function zoom_client_id()
  {
    return 'uV9Ei9F2SuqOrf_Gm81ZA';
  }

  public function zoom_client_secret()
  {
    return 'oPzu0b58GyEzimk7R7A3DJ36ctuEQnQ7';
  }

  public function zoom_sdk_client_id()
  {
    return 'iUz9SwKvR4ukNwljywvvg';
  }

  public function zoom_sdk_client_secret()
  {
    return 'Uigr8rGL4oRSSNz4cDkpFvrBPtEKotH3';
  }

  public function generate_jwt($meeting_id, $role, $duration)
  {

    $seconds = $duration * 60;
    if ($seconds < 1800) {
      $seconds = 1800;
    }
    date_default_timezone_set('Asia/Kolkata');
    // $start_time = date('Y-m-d H:i:s');
    // $end_time = date('Y-m-d H:i:s', strtotime('+' . $duration . ' minute'));

    // $start_time = strtotime($start_time);
    // $end_time = strtotime($end_time);
    $start_time = time(); // Current timestamp
    $end_time = $start_time + $seconds;

    $client_id = $this->zoom_sdk_client_id();
    $payload = array(
      "appKey"=> $client_id,
      "sdkKey" => $client_id,
      "mn" => (int)$meeting_id,
      "role" => $role,
      "iat" => $start_time,
      "exp" => $end_time,
      "tokenExp" => $end_time
    );
    $header = array(
      "alg" => "HS256",
      "typ" => "JWT"
    );

    $client_secret = $this->zoom_sdk_client_secret();
    $jwt = JWT::encode($payload, $client_secret, 'HS256', null, $header);
    return $jwt;
  }

  public function generate_auth_token()
  {
    $client_id = $this->zoom_client_id();
    $client_secret = $this->zoom_client_secret();
    $token = array(
      "iss" => $client_id,
      "exp" => time() + 3600 //60 seconds as suggested
    );
    return JWT::encode($token, $client_secret, 'HS256');
  }
}
