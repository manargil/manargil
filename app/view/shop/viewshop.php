<?php

class shopView extends coreView{

function index($productos){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/core-style.css"> 
    <title>DiverJugue</title>
</head>
<body>
  
  <?php require_once MVCDIR.'app/view/header.php'?>

  <div class="container mb-4 mt-5">
    <h1 class="mb-5 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-success">Diver Shop</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
           <?php foreach($productos as $producto){?>
            <div class="col">
                <div class="card">
                    <img src="../../../diverjugue/img/<?php echo $producto->imagen?>" class="card-img-size" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto->nombre?></h5>
                        <p class="card-text"><?php echo $producto->precio?>€</p>
                        <a href="#" class="btn btn-success" onclick="addtocart(<?php echo $producto->id?>)">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <?php }?>
    </div>
  </div>



  <?php require_once MVCDIR.'app/view/footer.php'?>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo URL?>app/javascript/shop/shop.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</html>
<?php

}
}
?>
