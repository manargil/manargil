<?php
require_once constant('MVCDIR'). "app/core/bd.php";

class coreModel{

  function __construct(){
    $this->db = new bd();
  }

  protected static function sanitizeInput($input){

    $db = new bd();

    $conexion = $db->conectar();

    // Eliminamos la posibilidad de inserción de comentarios
    $input = preg_replace('/([^\\-]*)([\\-]+)([^\\-]*)/', '$1-$3', $input);

    $input = str_replace('#', '_', $input);

    if($conexion instanceof mysqli){

      // Escapamos las comillas
      $input = $conexion->rea_escape_string($input);
      // Devolvemos parámetro saneado
      return $input;
    }elseif($conexion instanceof PDO){

      return $input;
    }else{
      return false;
    }
  }

}

 ?>
