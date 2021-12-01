<?php
require_once MVCDIR.'app/core/coreView.php';
require_once MVCDIR.'app/core/coreModel.php';

class modificarusuarioView extends coreView{

function index($usuario){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/core-style.css"> 
    <title>DiverJugue</title>
</head>
<body>
  
  <?php require_once MVCDIR.'app/view/admin/headeradmin.php'?>

    <div class="bold-line"></div>
    <div class="container">
      <div class="window">
        <div class="overlay"></div>
        <div class="content">
          <div class="welcome">¡MODIFICAR!</div>
          <div class="input-fields" class="input-group-prepend">
            <input type="hidden" name="usuarioid" id="usuarioid" value="<?php echo $usuario->id;?>" >
            <input type="text"id="user" class="input-group-text" placeholder="Usuario" value="<?php echo $usuario->user;?>"></input>
            <input type="password" class="input-group-text" id="pass" placeholder="Password" value="<?php echo $usuario->password;?>"></input>
            <input type="email" class="input-group-text" id="email" placeholder="Email" value="<?php echo $usuario->email;?>"></input>
            <input type="text" class="input-group-text" id="direccion"placeholder="Direccion" value="<?php echo $usuario->direccion;?>"></input>
            <input type="date" class="input-group-text" id="fech_nac" placeholder="Fecha de nacimiento formato dd/mm/yyyy" required value="<?php echo $usuario->fecha_nac;?>"></input>
            </div>
          <div><button class="ghost-round full-width" id="modbtn">Modificar</button></div>
        </div>
      </div>
    </div>


<?php require_once MVCDIR.'app/view/footer.php'?>

</body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL?>app/javascript/administracion/modificar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</html>
<?php

}
}
?>
