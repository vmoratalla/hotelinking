<?php
//Iniciamos sesion para poder guardad las variables SESSION de nuestro usuario
session_start();
//Cargamos conexion.php que contiene la Clases DB que gestionará la conexión y consulta a la base de datos
require_once ('conexion.php');
//Instanciamos la Clase DB para crear una conexion a nuestra base de datos
$conexion=new DB();
//Capturamos la variable 'accion' enviada por Ajax desde login.js para saber si hacemos un login o un registro
switch ($_POST['accion']){

    case "login":
        //Consultamos en la base de datos si exites el usuario a través del método 'consulta' de la Clase DB
        $obtener_usuario= $conexion->consulta("Select * from usuarios where nombre='".$_POST['usuario']."'");
        //Si existe un usuario con ese nombre:
        if($obtener_usuario->num_rows!=0){
            //Cosnultamos si existe un usuario con el nombre y password recibidos
            $obtener_usuario= $conexion->consulta("Select * from usuarios where nombre='".$_POST['usuario']."' and password='".$_POST['password']."'");
                //Si existe obtenemos su nombre y su id dentro de la base de datos y lo guardamos en las variables SESSION
            if($obtener_usuario->num_rows>0){
                $usuario = $obtener_usuario->fetch_assoc();
                $_SESSION['nomusuario'] = $usuario['nombre'];
                $_SESSION['idusu'] = $usuario['id_usuario'];
                //Devolvemos 2 para que login.js sepa que usuario y contraseña coinciden
                echo 2;

            }else{
                //En caso de encontrar el usuario pero no coincidir la contraseña devolvemos 1 a login.js
                echo 1;
            }
        }else{
            //En caso de no encontrar el usuario  devolvemos  a login.js
            echo 0;
        }
        break;
    case "registro":
        //Consultamos en la base de datos si exites el usuario a través del método 'consulta' de la Clase DB
        $obtener_usuario= $conexion->consulta("Select * from usuarios where nombre='".$_POST['usuario']."'");
        //Si existe devolvemos 0 para que login.js sepa que ya existe ese usuario
        if($obtener_usuario->num_rows!=0){
            echo 0;
        }else{
            //Si no, insertamos un nuevo usuario y su password y devolvemos 1 a login.js
            $nuevo_usuario= $conexion->consulta("Insert into usuarios (nombre, password) values ('".$_POST['usuario']."' , '".$_POST['password']."')");
            $obtener_usuario= $conexion->consulta("Select * from usuarios where nombre='".$_POST['usuario']."' and password='".$_POST['password']."'");
            $usuario = $obtener_usuario->fetch_assoc();
            $_SESSION['nomusuario'] = $usuario['nombre'];
            $_SESSION['idusu'] = $usuario['id_usuario'];
            echo 1;
        }

}
