<?php

require_once MVCDIR.'app/core/coreView.php';
require_once MVCDIR.'app/core/coreModel.php';


class listarusuarioView extends coreView{

function index($usuarios){
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

    <h2 class="mb-5 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-success">Aquí puedes ver,editar y borrar los usuarios</h2>
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
                                foreach($usuarios as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['user'];?></td>
                                    <td><?php echo $row['password']?></td>
                                    <td><?php echo $row['direccion']?></td>
                                    <td><?php echo $row['fech_nac']?></td>
                                    <td><a href="modificarcontroller/index?id=<?php echo $row['id'];?>">
                                <span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="../admincontroller/modificarusuarios?id=<?php echo $row['id'];?>">
                                <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="../usuariocontroller/borrar?id=<?php echo $row['id'];?>">
                                <i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                    </table>

            </div>
            <!--modal-->
            <div class="modal fade" id="confirm-dekete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                        </div>
                        <div class="modal-body">
                            ¿Desea eliminar este registro?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Eliminar</a>
                    </div>
                    </div>
                </div>
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
