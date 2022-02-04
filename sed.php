<?php
	class SED {
	// Estas son las claves para encriptar y desencriptar
	// puedes generarlas en el siguiente link:
	// https://www.lastpass.com/es/features/password-generator
	// para tener seguro tus datos se recomienda un minimo de 16 caracteres en las 2 claves
	// recuerda guardan bien las claves ya que si las pierdes no podras desencriptar los datos

      	private $METHOD = "AES-256-CBC"; // este es el metodo de encriptacion
      	private $SECRET_KEY = "yZMX%5uNBYj^EehuGvH#l5%zxBEhH0&2"; // esta clave puede contener mayusculas, minusculas, numeros y simbolos
      	private $SECRET_IV = "23006541971613219213028680229858"; // en esa solo se pueden numeros
	static $output,$iv,$key;

	private static function fol(){
	    $self = new self();
	    self::$iv = substr(hash('sha256', $self->SECRET_IV), 0, 16); // el numero 16 significa las capas de encriptado, entre mas alto es el numero mas seguridad, pero tardara mas en encriptar/desencriptar
	    self::$key = hash('sha256', $self->SECRET_KEY);
	}
        public static function encryption($string){
	    self::fol();
	    $self = new self();
	    self::$output = FALSE;
            self::$output = openssl_encrypt($string, $self->METHOD, $self->key, 0, $self->iv);
            self::$output = base64_encode(self::$output);
            return self::$output;
        }
        public static function decryption($string){
	    self::fol();
	    $self = new self();
	    self::$output = openssl_decrypt(base64_decode($string), $self->METHOD, $self->key, 0, $self->iv);
	    return self::$output;
	}
    }
