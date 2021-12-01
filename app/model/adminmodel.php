<?php
require_once MVCDIR.'app/core/coreModel.php';


class adminModel extends coreModel{

    public function __construct(){
        parent::__construct();
    }

    static function checkRegister($user, $pass, $email, $direccion, $fech_nac){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'INSERT INTO usuarios (user, password, email, user_group, direccion, fech_nac) VALUES (:user, :pass, :email,:user_group, :direccion, :fech_nac)';

        $consulta_preparada = $conexion->prepare($sql);
        $consulta_preparada -> execute([':user'=>$user,':pass'=>$pass,':email' => $email,':user_group' => 2, ':direccion' => $direccion, ':fech_nac' => $fech_nac]);

        $resultado=$consulta_preparada->rowCount();

        if($resultado){
          return true;
        }else{
          return false;
        }

    }

    static function borrarusuario($id){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'DELETE FROM usuarios where id='.$id;

        $resultado=$conexion->query($sql);

        if($resultado){
          return true;
        }else{
          return false;
        }

    }


    static function getusuarios(){

        $db = new bd();
        $conexion = $db->conectar();
        $query="SELECT * FROM usuarios";

        $consulta_execute = $conexion->prepare($query);
        $consulta_execute -> execute();

        $resultado=$consulta_execute->fetchAll();
        return $resultado;
    }



    static function modificarusuario($id,$user, $pass, $email, $direccion, $fech_nac){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = "UPDATE usuarios SET user ='$user',password ='$pass',email='$email',direccion='$direccion',fech_nac='$fech_nac' WHERE id='$id'";
        
        $consulta_preparada = $conexion->prepare($sql);
        $resultado=$consulta_preparada -> execute();

        if($resultado){
          return true;
        }else{
          return false;
        }

    }

    static function getusuario($id){

        $db = new bd();
        $conexion = $db->conectar();

        $query="SELECT * FROM usuarios where id=$id";

        $consulta_execute=$conexion->prepare($query);
        $consulta_execute->execute();

        $resultado=$consulta_execute->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }


    static function getproductos(){

        $db = new bd();
        $conexion = $db->conectar();
        $query="SELECT * FROM productos";

        $consulta_execute = $conexion->prepare($query);
        $consulta_execute -> execute();

        $resultado=$consulta_execute->fetchAll();
        return $resultado;
    }




    static function checkProducto($nombre, $precio, $stock, $imagen){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'INSERT INTO productos (nombre, precio, stock,imagen) VALUES (:nombre, :precio, :stock,:imagen)';

        $consulta_preparada = $conexion->prepare($sql);
        $consulta_preparada -> execute([':nombre'=>$nombre,':precio'=>$precio,':stock' => $stock,':imagen' => $imagen]);

        $resultado=$consulta_preparada->rowCount();

        if($resultado){
          return true;
        }else{
          return false;
        }

    }

    static function borrarproducto($id){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'DELETE FROM productos where id='.$id;

        $resultado=$conexion->query($sql);

        if($resultado){
          return true;
        }else{
          return false;
        }

    }

}

?>
