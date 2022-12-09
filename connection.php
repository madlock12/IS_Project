<?php 
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password,"tichkulee");
    
    if(!$con){
        die("Connection failed!". mysqli_connect_error());
    }

    function encrypt($plaintext, $password) {
        $simple_string = $plaintext;

        //cipher method
        $ciphering = "AES-128-CTR";

        //Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption_iv = '1234567891011121';

        $encryption_key = $password;

        //encrypt the data
        $encryption = openssl_encrypt($simple_string, $ciphering,$encryption_key, $options, $encryption_iv);

        return ($encryption);
    }

    function decrypt($encryptedText, $password) {
        $decryption_iv = '1234567891011121';
        
        $ciphering = "AES-128-CTR";
        $options = 0;
        $decryption_key = $password;
        $encryption=$encryptedText;

        $decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
        return($decryption);
    }
?>