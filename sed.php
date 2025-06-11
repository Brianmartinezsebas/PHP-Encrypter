<?php
  	class SED {
	    private $method = "AES-256-CBC"; // Este es el método de encriptación
	    private $secret_key = "yZMX%5uNBYj^EehuGvH#l5%zxBEhH0&2"; // Esta clave puede contener mayúsculas, minúsculas, números y símbolos
	
	    public function encryption($string){
	        $key = hash('sha256', $this->secret_key);
	        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
	        $encrypted = openssl_encrypt($string, $this->method, $key, 0, $iv);
	        return base64_encode($iv . $encrypted);
	    }
	
	    public function decryption($string){
	        $data = base64_decode($string);
	        $iv_length = openssl_cipher_iv_length($this->method);
	        $iv = substr($data, 0, $iv_length);
	        $encrypted = substr($data, $iv_length);
	        $key = hash('sha256', $this->secret_key);
	        return openssl_decrypt($encrypted, $this->method, $key, 0, $iv);
	    }
	}

