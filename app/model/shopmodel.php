<?php

require_once MVCDIR.'app/core/coreModel.php';

class shopmodel extends coreModel{

    public function __construct(){
        parent::__construct();
    }
    
    
    
    static function getproductos(){

      $db = new bd();
      $conexion = $db->conectar();
      $query="SELECT * FROM productos";

      $consulta_execute = $conexion->prepare($query);
      $consulta_execute->execute();

      $resultado=$consulta_execute->fetchAll(PDO::FETCH_OBJ);
      return $resultado;
  }


  static function getproducto($id){
      
      $db = new bd();
      $conexion = $db->conectar();
      $query="SELECT * FROM productos where id=$id";
     
      $consulta_execute=$conexion->prepare($query);
      $consulta_execute->execute();
      $resultado=$consulta_execute->fetch(PDO::FETCH_OBJ);
      return $resultado;
  }






   /* static function mostrarproductos($nombre, $precio, $stock, $categoria, $imagen){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'SELECT nombre,precio,stock,imagen from productos';

        $consulta_preparada = $conexion->prepare($sql);
        $consulta_preparada -> execute([':nombre'=>$nombre,':precio'=>$precio,':stock' => $stock, ':categoria' => $categoria, ':imagen' => $imagen]);

        $resultado=$consulta_preparada->rowCount();

        if($resultado){
          return true;
        }else{
          return false;
        }

    }*/
}

?>