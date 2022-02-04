# PHP-Encripter
Esta es una API/Modulo para poder encriptar/desencriptar datos, textos con el metodo de encriptado "AES-256-CBC" (SHA256)

This is an API/Module to be able to encrypt/decrypt data, texts with the encryption method "AES-256-CBC" (SHA256)
# Integracion | Integration
Para poder usar esta API/Modulo debemos incluirla en nuestro codigo:

In order to use this API / Module we must include it in our code:
```php
  require_once "sed.php";
```
Luego hay que configurar las claves privadas (recuerda guardarlas bien ya que perderas todo lo encriptado sino)

Then you have to configure the private keys (remember to save them well since you will lose everything encrypted otherwise)
```php
  // puedes generarlas en el siguiente link:
  // https://www.lastpass.com/es/features/password-generator
  define('SECRET_KEY','yZMX%5uNBYj^EehuGvH#l5%zxBEhH0&2'); // esta clave puede contener mayusculas, minusculas, numeros y simbolos
  define('SECRET_IV','23006541971613219213028680229858'); // en esa solo se pueden numeros
```
Para encriptar / desencriptar usaremos los siguientes parametros:

To encrypt / decrypt we will use the following parameters:

Codigo para encriptar:

Code to encrypt:
```php
  SED::encryption("texto sin encriptar")
```

Codigo para desencriptar:

Code to decrypt:
```php
  SED::decryption("texto encriptado")
```
# Ejemplo | Example
A continuacion vamos a encriptar un nombre y guardarlo en una variable:

Next we are going to encrypt a name and save it in a variable:
```php
    $name = SED::encryption("Brian Sebastian Martinez"); //encriptamos texto, tambien se pueden variables
    // se generara un texto unico, $name devuelve = "bGt0V1pXZGZKdDB1cCtndWphSUpLVjZXQ2FoYVZ4eWtZUTl1SUJNSGZscz0="
  ```
Ahora desencriptaremos la variable:

Now we will decrypt the variable:
```php
  echo SED::decryption($name);
```
	
  
