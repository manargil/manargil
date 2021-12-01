<?php

require_once MVCDIR.'app/core/coreView.php';
require_once MVCDIR.'app/core/coreModel.php';


class listarproductosView extends coreView{

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
    <link rel="stylesheet" href="public/css/core-style.css"> 
    <title>DiverJugue</title>
</head>
<body>
    <?php require_once MVCDIR.'app/view/admin/headeradmin.php'?>

        <h2 class="mb-5 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-success">Aquí puedes ver,agregar y borrar los productos</h2>
            <div class="mt-5 table-responsive">
                    <table class="table table-dark">
                            <thead>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                                <tr scope="col"></tr>
                            </thead>

                            <tbody>
                                <?php 
                                foreach($productos as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['precio']?></td>
                                    <td><?php echo $row['stock']?></td>
                                    <td><?php echo $row['imagen']?></td>
                                <span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="../admincontroller/agregarproductos?id=<?php echo $row['id'];?>">
                               <i class="fas fa-plus"></i></a></td>
                                <td><a href="../usuariocontroller/borrarproducto?id=<?php echo $row['id'];?>">
                                <i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                    </table>

            </div>
</body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo URL?>app/javascript/administracion/borrarusu.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
</html>
<?php

}
}
?>
