<?php

require_once MVCDIR.'app/model/adminmodel.php';
require_once MVCDIR.'app/view/admin/agregarusu.php';
require_once MVCDIR.'app/view/admin/adminview.php';
require_once MVCDIR.'app/view/admin/listarusuarios.php';
require_once MVCDIR.'app/view/admin/modificarview.php';
require_once MVCDIR.'app/view/admin/listarproductos.php';
require_once MVCDIR.'app/view/admin/agregarproducto.php';

class adminController extends coreController{
    function __construct(){

    }

 static function agregarusuario(){
        $view = new viewUSU();
        $view -> index();
    }

    static function listarusuarios(){
        $usuarios = adminModel::getusuarios();
        $view = new listarusuarioView();
        $view -> index($usuarios);
    }


    static function modificarusuarios(){
        $id = $_GET['id'];
        $usuario= adminModel::getusuario($id);
        $view = new modificarusuarioView();
        $view->index($usuario);

    }


    static function listarproductos(){
        $productos = adminModel::getproductos();
        $view = new listarproductosView();
        $view -> index($productos);
    }

    static function agregarproductos(){
        $view = new agregarproductoView();
        $view -> index();

    }


    public function index(){
        $view = new adminView();
        $view->index();
    }
    }
