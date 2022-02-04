<?php
	// Estas son las claves para encriptar y desencriptar
	// puedes generarlas en el siguiente link:
	// https://www.lastpass.com/es/features/password-generator
	// para tener seguro tus datos se recomienda un minimo de 16 caracteres en las 2 claves
	// recuerda guardan bien las claves ya que si las pierdes no podras desencriptar los datos
	define('METHOD','AES-256-CBC'); // este es el metodo de encriptacion
	define('SECRET_KEY','yZMX%5uNBYj^EehuGvH#l5%zxBEhH0&2'); // esta clave puede contener mayusculas, minusculas, numeros y simbolos
	define('SECRET_IV','23006541971613219213028680229858'); // en esa solo se pueden numeros
	class SED {
		public static function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16); // el numero 16 significa las capas de encriptado, entre mas alto es el numero mas seguridad, pero tardara mas en encriptar/desencriptar
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16); // el numero 16 significa las capas de encriptado, entre mas alto es el numero mas seguridad, pero tardara mas en encriptar/desencriptar
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
	}
