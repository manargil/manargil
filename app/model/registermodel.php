<?php

class registerModel extends coreModel{

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
}

?>
