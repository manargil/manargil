<?php

require_once MVCDIR.'app/model/loginmodel.php';

//

class logincontroller extends coreController{
    
    function __construct(){

    }

    function login(){
     
        $resultado = loginmodel::checkLogin($_POST['user'],$_POST['pass']);

        if($resultado){
            echo json_encode(array(
                'STATUS'=>'OK',
                'STATUS_MSG'=>'',
                'DATA'=>$resultado
            ));
        }else{
            echo json_encode(array(
                'STATUS'=>'ERROR',
                'STATUS_MSG'=>'',
                'DATA'=>null
            ));
        }

    }

    function logout(){

        @session_start();

        if(session_destroy()){
            echo json_encode(array(
                'STATUS'=>'OK',
                'STATUS_MSG'=>'',
                'DATA'=>null
            ));
        }else{
            echo json_encode(array(
                'STATUS'=>'ERROR',
                'STATUS_MSG'=>'',
                'DATA'=>null
            ));
        }
    }

  
}

?>