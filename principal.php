<?php
//Iniciamo sesion y comprobamos que el usuario está logueado, en caso contrario redireccionamos a index.php
session_start();
if(!isset($_SESSION['idusu'])){
    header('Location: index.php');
}
//Cargamos usuario.php que contiene la Clases Usuario que gestionará las acciones del usuario sobre los código promocionales
require_once ('app/usuario.php');
//Instacionamos la clase Usuario
$usuario= new Usuario();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="css/estilos.css" rel="stylesheet" type="text/css">

    <title>Prueba Hotelinking</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--    Script con la lógica para gestionar las acciones de los enlaces de la página-->
    <script src="js/usuario.js"></script>
    <script>

    </script>
</head>
<body>
<div id="tapa">
    <div class="mensaje">
        &nbsp;
    </div>
</div>
<div class="contenido">
    <div class="tituloventana">
        Bienvenido <?php
        //Obtenemos el nombre del usuario a traves del métdo obtenerNombre de la clase Usuario
        echo $usuario->obtenerNombre();
        ?>
    </div>
    <div class="listacupones">
        <div class="titulo">
            Lista de codigos promocionales
        </div>
        <div id="listadecupones">

            <?php
            //Llamamos a lista_cupones.php el cual generá el código Html para visualizar los códigos de pormoción del usuario
                include "app/lista_cupones.php";


            ?>
        </div>


    </div>
    <div class="nuevocupon">
        <a href="#" id="obtnuevocupon">Obtener código promocional</a>
    </div>
</div>
</body>
</html>