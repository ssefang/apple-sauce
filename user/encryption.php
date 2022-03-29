<?php

function encryption($str){

// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "GeeksforGeeks";

$encryption = openssl_encrypt($str, $ciphering, $encryption_key, $options, $encryption_iv);

return $encryption;
}

//test

// $password = encryption("123");
// echo $password;

?>