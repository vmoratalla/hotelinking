Para utilizar en local:

Importar el archivo hotelinking.sql al servidor mysql, este crear� la base de datos y tablas necesarias.
Despu�s en la carpeta app, abrir el archivo vars.php y modificar:

define('ipservidor','localhost'); cambiar 'localhost' por nuestro servidor
define('basedatosservidor','hotelinking'); NO MODIFICAR
define('usuarioservidor','root'); cambiar 'root' por nombre de usuario de nuestro Mysql
define('passwordservidor',''); cambiar '' por nuestra contrase�a Mysql