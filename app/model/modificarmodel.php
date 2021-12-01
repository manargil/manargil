<?php

class   modificarModel extends coreModel{

    public function __construct(){
        parent::__construct();

    }
    static function modificarusuario($id,$user, $pass, $email, $direccion, $fech_nac){

        $db = new bd();
        $conexion = $db->conectar();

        $id = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id='$id'";
        $resultado = $mysqli->query($sql);
        $row = $resultado->fetch_array(MYSQL_ASSOC);

        if($resultado){
          return true;
        }else{
          return false;
        }

    }
}

?>
