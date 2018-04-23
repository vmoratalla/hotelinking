<?php
//Cargamos coniexion.php para utilizar la clase DB
require_once ('conexion.php');
//Declaramos la clase Usuario que hereda de la clase DB
class Usuario extends DB{
    //Declaramos la variable $nombre como privada para evitar acceso indebido
    private $nombre;

    public function __construct()
    {
        //Llamamos al construcctor de la clase padre (DB) para crear la conexión a la base de datos y guardarla en $dhb
        parent::__construct();
        // Guardamos el nombre del usuario en la variable $nombre para su posterior uso
        $this->nombre= $this->consulta("Select * from usuarios where id_usuario=".$_SESSION['idusu'])->fetch_assoc()['nombre'];
    }

    public function obtenerNombre(){
        //Método para devolver el nombre del usuario

        return $this->nombre;
    }
    public function listar_cupones(){
        //Método que devuelve todos los cupones del usuario
        return $this->consulta("Select * from cupones where id_usuario=".$_SESSION['idusu']);
    }
    public function crear_cupon(){
        //Método que inserta un nuevo cupón. El código del cupón está compuesto por el Id del usuario en la base de datos más
        // un número aleatorio en 0 y 9999 para que sea único
        return $this->consulta("Insert into cupones (id_usuario,codigo) values ('".$_SESSION['idusu']."','".$_SESSION['idusu'].rand(0,9999)."')");
    }
    public function canjear($cupon){
        //Método que cambia el campo canjeado de un cupón en la base de datos.
        return $this->consulta("Update cupones set canjeado=true where id_cupon=".$_POST['idcupon']);
    }
}