<?php

class contactView extends coreView{

function index(){
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
<?php require_once MVCDIR.'app/view/header.php'?>

<h3 class="mb-5 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-success">Diver Contact</h3>

<div class="container mb-5 mt-5">
  <div class="row">

    <div class="row cards m-5">

      <div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <img src="../../../diverjugue/img/co.png" class="card-img-top" alt="Card image" />

        <div class="card-block m-5">
          <h4 class="card-title">Correo</h4>
          <p class="card-text">diverjugue@gmail.com</p>
        </div>
      </div>

      <div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <img src="../../../diverjugue/img/faceb.png" class="card-img-top" alt="Card image" />

        <div class="card-block m-5">
          <h4 class="card-title">Facebook</h4>
          <p class="card-text">DiverJugue</p>
        </div>
      </div>

      <div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 .img-fluid">
        <img src="../../../diverjugue/img/telf.png" class="card-img-top" alt="Card image" />

        <div class="card-block m-5">
          <h4 class="card-title">Teléfono</h4>
          <p class="card-text">69299456123</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once MVCDIR.'app/view/footer.php'?>

</body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL?>app/javascript/contact/contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</html>
<?php

}
}
?>
