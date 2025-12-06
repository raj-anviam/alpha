<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function base64e($pure_string, $key = '')
{
    if ($key == '') {
        $keyUsed =  "sdfSf38kj$%tF#12345";
    } else {
        $keyUsed = trim($key);
    }
    $password = substr(hash('sha256', $keyUsed, true), 0, 32);
    $method = 'aes-256-cbc';
    $pure_string = trim($pure_string);
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $encrypted = base64_encode(openssl_encrypt($pure_string, $method, $password, OPENSSL_RAW_DATA, $iv));
    $dirty = array("+", "/", "=");
    $clean = array("_P0L0S_", "_S0L0H_", "_E0L0S_");
    $rValue = str_replace($dirty, $clean, $encrypted);
    return trim($rValue);
}

function base64d($encrypted_string, $key = '')
{
    if ($key == '') {
        $keyUsed =  "sdfSf38kj$%tF#12345";
    } else {
        $keyUsed = trim($key);
    }
    $method = 'aes-256-cbc';
    $password = substr(hash('sha256', $keyUsed, true), 0, 32);
    $encrypted_string = trim($encrypted_string);
    $dirty = array("+", "/", "=");
    $clean = array("_P0L0S_", "_S0L0H_", "_E0L0S_");

    $encrypted = str_replace($clean, $dirty, $encrypted_string);

    // IV must be exact 16 chars (128 bit)
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);

    return $decrypted;
}


function aes_encrypt($plain_text)
{

    $plaintext = $plain_text;
    $password = '3sc3RLrpd17';
    $method = 'aes-256-cbc';
    // Must be exact 32 chars (256 bit)
    $password = substr(hash('sha256', $password, true), 0, 32);


    // IV must be exact 16 chars (128 bit)
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
    $encrypted = str_replace('+', '_pls_', $encrypted);
    $encrypted = str_replace('=', '_eql_', $encrypted);
    $encrypted = str_replace('/', '_sls_', $encrypted);
    return $encrypted;
}


function aes_decrypt($enc_text)
{

    $encrypted = str_replace('_pls_', '+', $enc_text);
    $encrypted = str_replace('_eql_', '=', $encrypted);
    $encrypted = str_replace('_sls_', '/', $encrypted);
    $password = '3sc3RLrpd17';
    $method = 'aes-256-cbc';
    // Must be exact 32 chars (256 bit)
    $password = substr(hash('sha256', $password, true), 0, 32);


    // IV must be exact 16 chars (128 bit)
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);

    return $decrypted;
}
