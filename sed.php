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
	      private $output,$iv,$key;

		private function fol(){
		    $this->iv = substr(hash('sha256', $this->SECRET_IV), 0, 16); // el numero 16 significa las capas de encriptado, entre mas alto es el numero mas seguridad, pero tardara mas en encriptar/desencriptar
		    $this->key = hash('sha256', $this->SECRET_KEY);
		}
		public function encryption($string){
		    $this->fol();
		    $this->output = FALSE;
		    $this->output = openssl_encrypt($string, $this->METHOD, $this->key, 0, $this->iv);
		    $this->output = base64_encode($this->output);
		    return $this->output;
		}
		public function decryption($string){
		    $this->fol();
		    $this->output = openssl_decrypt(base64_decode($string), $this->METHOD, $this->key, 0, $this->iv);
		    return $this->output;
		}
	    }
  
