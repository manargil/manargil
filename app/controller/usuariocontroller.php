<?php

require_once MVCDIR.'app/model/adminmodel.php';

class usuarioController extends coreController{


    static function register(){

        if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['fech_nac'])){

          $resultado = adminModel::checkRegister($_POST['user'], $_POST['pass'], $_POST['email'], $_POST['direccion'], $_POST['fech_nac']);

          if($resultado){
            echo json_encode(array(
                'STATUS'=>'OK',
                'STATUS_MSG'=>'Registro completado.',
                'DATA'=>null
            ));
          }else{
            echo json_encode(array(
                'STATUS'=>'ERROR',
                'STATUS_MSG'=>'Error en la respuesta de la base de datos.',
                'DATA'=>null
            ));
          }

        }else{
          echo json_encode(array(
              'STATUS'=>'ERROR',
              'STATUS_MSG'=>'No se han recibido algunos parámetros necesarios.',
              'DATA'=>null
          ));
        }

    }


    function borrar(){
        
        $id = $_GET['id'];
        $resultado = adminModel::borrarusuario($id);
        if($resultado==true){
            echo'Usuario Eliminado';
        }else{
            echo'Error al eliminar el usuario';
        }
    }



    static function update(){
        
        $id = $_POST['usuarioid'];
       $user = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $fech_nac = $_POST['fech_nac'];
        
        $resultado = adminModel::modificarusuario($id,$user, $pass, $email, $direccion, $fech_nac);

        if($resultado){
            echo json_encode(array(
                'STATUS'=>'OK',
                'STATUS_MSG'=>'Modificación completada.',
                'DATA'=>null
            ));
          }else{
            echo json_encode(array(
                'STATUS'=>'ERROR',
                'STATUS_MSG'=>'Error en la respuesta de la base de datos.',
                'DATA'=>null
            ));
          }

        }

        
        static function agregarproductos(){

            if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['stock']) && isset($_POST['imagen'])){
    
              $resultado = adminModel::checkProducto($_POST['nombre'], $_POST['precio'], $_POST['stock'], $_POST['imagen']);
    
              if($resultado){
                echo json_encode(array(
                    'STATUS'=>'OK',
                    'STATUS_MSG'=>'Producto agregado.',
                    'DATA'=>null
                ));
              }else{
                echo json_encode(array(
                    'STATUS'=>'ERROR',
                    'STATUS_MSG'=>'Error en la respuesta de la base de datos.',
                    'DATA'=>null
                ));
              }
    
            }else{
              echo json_encode(array(
                  'STATUS'=>'ERROR',
                  'STATUS_MSG'=>'No se han recibido algunos parámetros necesarios.',
                  'DATA'=>null
              ));
            }
    
        }
    

        function borrarproducto(){
        
            $id = $_GET['id'];
            $resultado = adminModel::borrarproducto($id);
            if($resultado==true){
              echo'Producto Eliminado';
          }else{
              echo'Error al eliminar el producto';
          }
        }
    

}