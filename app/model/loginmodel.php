<?php

class loginmodel extends coreModel{

    public function __construct(){
        parent::__construct();
    }

    static function checkLogin($user, $pass){

        $db = new bd();
        $conexion = $db->conectar();

        $sql = 'SELECT * from usuarios where user = :user AND password = :pass';

        $consulta_preparada = $conexion->prepare($sql);
        $consulta_preparada -> execute([':user'=>$user,':pass'=>$pass]);

        $resultado=$consulta_preparada->fetchObject();
        if($resultado){
            @session_start();
            $_SESSION['user']=$user;
            $_SESSION['user_group']=$resultado->user_group;
            $_SESSION['userid']=$resultado->id;
        }
        return $resultado;
    }
}

?>