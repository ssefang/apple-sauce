<?php


function decryption($str){
    // Store the cipher method 加密方法
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption  注册时候加密用 $encryption_iv
    //登陆时候解密 用 $decryption_iv
    $decryption_iv = '1234567891011121';

    // Store the decryption key 解密用 decryption_key ，内容和加密一样
    $decryption_key = "GeeksforGeeks";

    $decryption = openssl_decrypt($str, $ciphering, $decryption_key, $options, $decryption_iv);

    return $decryption;
}

//test

// $password = decryption("4Vcq");
// echo $password;

?>