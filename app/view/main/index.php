<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="app/javascript/login/login.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/core-style.css">    


    <title>Diver jugue</title>
</head>
<body>

<?php require_once MVCDIR.'app/view/header.php'?>

<?php
        @session_start();

        if(!isset($_SESSION['user'])){
             


        echo'   <!--Banner Hero -->
                <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <li>
                                <form>
                                <div class="">
                                         <div class="uk-inline">
                                            <input type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" id="username" type="text">
                                         </div>
                                     </div>
    
                                     <div class="">
                                         <div class="uk-inline">
                                           <input type="password" class="form-control" placeholder="Contraseña" id="password" type="text">
                                         </div>
                                     </div>
                                     <button type="button" id="loginbtn" class="btn btn-success">Log in</button>
                                     </form>
                                </li>
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left align-self-center">
                                        <h1 class="h1 text-success"><b>DiverJugue</b></h1>
                                        <h3 class="h2">Haz login para poder disfrutar de las diversas ofertas y la mayor diversión en tus juguetes</h3>
                                        <p>
                                            Una tienda muy diversa y divertida, contiene figuras y juegos de mesa
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid" src="img/anima.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">Figuras de dibujos</h1>
                                        <p>
                                            Encuentra las figuras de tus dibujos favoritos en DiverJ
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid"  src="img/bichito.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">DiverBichito</h1>
                                        <p>
                                        La mascota oficial de DiverJ te da la bienvenida</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
                </div>';


            echo'<section class="container py-5">
                        <div class="row text-center pt-3">
                            <div class="col-lg-6 m-auto">
                                <h1 class="h1">Figuras con más impresiones</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/potato.png" class="rounded-circle img-fluid border"></a>
                                <h5 class="text-center mt-3 mb-3">Figura potato</h5>
                                <p class="text-center"><a class="btn btn-success" href="#">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/trans.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura de acción</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/mago.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura Mago</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                        </div>
                        </section>
                        <!-- Cierre seccion-->


                        <!-- Productos Destacados -->
                        <section class="bg-light">
                        <div class="container py-5">
                            <div class="row text-center py-3">
                                <div class="col-lg-6 m-auto">
                                    <h1 class="h1">Productos Destacados</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bichito.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura de dibujos</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/pajar.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura de acción</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm           
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bomber.jpg" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura Bombero</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>';


        }else{

            if($_SESSION['user_group']==1){



                echo'   <!--Banner Hero -->
                <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="img/bichito.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left align-self-center">
                                        <h1 class="h1 text-success"><b>DiverJugue</b></h1>
                                        <h3 class="h2">Disfruta de las diversas ofertas y la mayor diversión en tus juguetes</h3>
                                        <p>
                                            Diverbichito te da la bienvenida
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid" src="img/anima.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">DiverJ Dibujos</h1>
                                        <p>
                                            Encuentra ls mejores figuras de tus dibujos favoritos en DiverJ
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid"  src="img/trans.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">DiverJugue</h1>
                                        <p>
                                        Las mejores figuras de películas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
                </div>';


            echo'<section class="container py-5">
                        <div class="row text-center pt-3">
                            <div class="col-lg-6 m-auto">
                                <h1 class="h1">Colección con mas impresiones</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/potato.png" class="rounded-circle img-fluid border"></a>
                                <h5 class="text-center mt-3 mb-3">Figura potato</h5>
                                <p class="text-center"><a class="btn btn-success" href="#">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/trans.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura de películas</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/mago.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura mago</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                        </div>
                        </section>
                        <!-- Cierre seccion -->


                        <!-- Productos Destacados -->
                        <section class="bg-light">
                        <div class="container py-5">
                            <div class="row text-center py-3">
                                <div class="col-lg-6 m-auto">
                                    <h1 class="h1">Productos Destacados</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bichito.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura de dibujos</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/pajar.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">figura de acción</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm           
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bomber.jpg" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figuta de películas</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>';
                        
            }else{



                echo'   <!--Banner Hero -->
                <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="img/bichito.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left align-self-center">
                                        <h1 class="h1 text-success"><b>DiverJugue</b></h1>
                                        <h3 class="h2">Disfruta de las diversas ofertas y la mayor diversión en tus juguetes</h3>
                                        <p>
                                            Diverbichito te da la bienvenida        
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid" src="img/anima.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">DiverJ Dibujos</h1>
                                        <p>
                                            Encuentra los mejores juguetes de tus dibujos favoritos
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid"  src="img/trans.png" alt="">
                                </div>
                                <div class="col-lg-6 mb-0 d-flex align-items-center">
                                    <div class="text-align-left">
                                        <h1 class="h1">DiverJugue</h1>
                                        <p>
                                        Las mejores figuras de películas </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
                </div>';


            echo'<section class="container py-5">
                        <div class="row text-center pt-3">
                            <div class="col-lg-6 m-auto">
                                <h1 class="h1">Colección con más impresiones</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/potato.png" class="rounded-circle img-fluid border"></a>
                                <h5 class="text-center mt-3 mb-3">Figura potato</h5>
                                <p class="text-center"><a class="btn btn-success" href="#">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/trans.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura de películas</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                            <div class="col-12 col-md-4 p-5 mt-3">
                                <a href="#"><img src="img/mago.png" class="rounded-circle img-fluid border"></a>
                                <h2 class="h5 text-center mt-3 mb-3">Figura mago</h2>
                                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
                            </div>
                        </div>
                        </section>
                        <!-- Cierre seccion-->


                        <!-- Productos Destacados -->
                        <section class="bg-light">
                        <div class="container py-5">
                            <div class="row text-center py-3">
                                <div class="col-lg-6 m-auto">
                                    <h1 class="h1">Productos Destacados</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bichito.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura de dibujos</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/pajar.png" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                    <i class="text-muted fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura de Acción</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm           
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100">
                                        <a href="">
                                            <img src="img/bomber.jpg" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                    <i class="text-warning fa fa-star"></i>
                                                </li>
                                                <li class="text-muted text-right">30.00€</li>
                                            </ul>
                                            <a href="" class="h2 text-decoration-none text-dark">Figura bombero</a>
                                            <p class="card-text">
                                            Medidas de la Figura:
                                            Alto:30cm
                                            Ancho:10cm 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>';

    
            }


            echo '</div>';
        }
    ?>

<?php require_once MVCDIR.'app/view/footer.php'?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</html>
