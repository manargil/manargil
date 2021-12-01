<?php

class contactmodel extends coreModel{

    public function __construct(){
        parent::__construct();
    }

    static function contactform($user, $email, $asunto, $mensaje){

        $db = new bd();
        $conexion = $db->conectar();

        
        mysqli_query($conexion, "INSERT INTO tblcontact (user, email,asunto,mensaje) VALUES ('" . $name. "', '" . $email. "','" . $asunto. "','" . $mensaje. "')");
        $insert_id = mysqli_insert_id($conexion);
        if(!empty($insert_id)) {
        $message = "Your contact information is saved successfully";

        
        
        }
    }
}

?>








