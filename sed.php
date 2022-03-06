<?php
	class SED {
	// Estas son las claves para encriptar y desencriptar
	// puedes generarlas en el siguiente link:
	// https://www.lastpass.com/es/features/password-generator
	// para tener seguro tus datos se recomienda un mínimo de 16 caracteres en las 2 claves
	// recuerda guardan bien las claves, ya que si las pierdes no podrás desencriptar los datos

	      private $METHOD = "AES-256-CBC"; // Este es el método de encriptación
	      private $SECRET_KEY = "yZMX%5uNBYj^EehuGvH#l5%zxBEhH0&2"; // Esta clave puede contener mayúsculas, minúsculas, números y símbolos
	      private $SECRET_IV = "23006541971613219213028680229858"; // En esa solo se pueden números
	      private $output,$iv,$key;

		private function fol(){
		    $this->iv = substr(hash('sha256', $this->SECRET_IV), 0, 16); // El número 16 significa las capas de encriptado, entre más alto es el número más seguridad, pero tardará más en encriptar/desencriptar
		    $this->key = hash('sha256', $this->SECRET_KEY);
		}
		public function encryption($string){
		    $this->fol();
		    $this->output = base64_encode(openssl_encrypt($string, $this->METHOD, $this->key, 0, $this->iv));
		    return $this->output;
		}
		public function decryption($string){
		    $this->fol();
		    $this->output = openssl_decrypt(base64_decode($string), $this->METHOD, $this->key, 0, $this->iv);
		    return $this->output;
		}
	    }
  
