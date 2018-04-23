<?php
//Iniciamo sesion y comprobamos que el usuario está logueado, en caso contrario redireccionamos a index.php
session_start();
//Cargamos usuario.php que contiene la Clases Usuario que gestionará las acciones del usuario sobre los código promocionales
require_once ('usuario.php');
//Instacionamos la clase Usuario
$usuario= new Usuario();
//Capturamos la variable 'accion' enviada por Ajax desde usuario.js para saber si creamos un nuevo código promocional o canjeamos uno existente
switch ($_POST['accion']){
    case "nuevo":
        //Llamamos al método crear_cupon de la Clase usuario que se encargará de insertarlo en la base de datos
        $usuario->crear_cupon();
        //Llámamos al método listar_cupones para obtener todos los códigos pormocionales del usuario
        $usuario->listar_cupones();
        //Llamamos a lista_cupones.php el cual generá el código Html para visualizar los códigos de pormoción del usuario
        include "lista_cupones.php";
        break;
    case "canjear":
        //Llámamos al método canjear de la Clase usuario que se encargará de marcar como canjeado el código promocional
        $usuario->canjear($_POST['idcupon']);
        //Llámamos al método listar_cupones para obtener todos los códigos pormocionales del usuario
        $usuario->listar_cupones();
        //Llamamos a lista_cupones.php el cual generá el código Html para visualizar los códigos de pormoción del usuario
        include "lista_cupones.php";
        break;
}