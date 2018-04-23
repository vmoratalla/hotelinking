<?php
//Cargamos las variables de conexxión de vars.php
require_once ('vars.php');
class DB{
    //decalramos privadas las variables para crear una conexión ya que no serán necesarias usarlas desde fuera de esta clase
    private $ip = ipservidor;
    private $basedatos = basedatosservidor;
    private $usuario = usuarioservidor;
    private $password = passwordservidor;

    //declaramos publica la variable $dbh que contendrá la conexión a la base de datos.
    public $dbh;


    public function __construct(){
        //Inicializamos $dbh con una nueva conexión usando
        $this->dbh=new mysqli($this->ip,$this->usuario,$this->password,$this->basedatos);

    }

    public function consulta($query){
        //Este método será usado para todas las consultas a la base de datos.
        return $this->dbh->query($query);
    }

}
?>