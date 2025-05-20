<?php

namespace App\Libraries;

class EncryptionHelper
{
    private $key = 'your-secret-key'; // Ganti dengan kunci rahasia yang kuat
    private $cipher = 'aes-256-cbc';

    public function encrypt($data)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $encrypted = openssl_encrypt($data, $this->cipher, $this->key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public function decrypt($data)
    {
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, $this->cipher, $this->key, 0, $iv);
    }
}
