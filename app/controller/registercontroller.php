<?php

require_once MVCDIR.'app/model/registermodel.php';
require_once MVCDIR.'app/view/register/viewregistro.php';

class registerController extends coreController{

    function __construct(){

    }

    function register(){

        if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['fech_nac'])){

          $resultado = registerModel::checkRegister($_POST['user'], $_POST['pass'], $_POST['email'], $_POST['direccion'], $_POST['fech_nac']);

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

    public function index(){
        $view = new viewRegistro();

        $view -> index();
    }



}

?>
