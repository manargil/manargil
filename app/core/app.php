<?php
  require_once constant('MVCDIR').'app/controller/error.php';
  require_once MVCDIR.'app/controller/admincontroller.php';
  require_once 'coreView.php';
  class App{

    public function __construct(){

      $url = isset($_GET['url']) ? $_GET['url']:null;

      $url = rtrim($url,'/');

      $url = explode('/',$url);

      if(empty($url[0])){
        $archivoController = constant('MVCDIR').'app/controller/main.php';
        require_once $archivoController;
        $controller = new Main();
        $controller->loadModel('main');
        return false;
      }
      $archivoController = constant('MVCDIR').'app/controller/' .$url[0].'.php';

      if(file_exists($archivoController)){
        require_once $archivoController;

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if(isset($url[1])){
        $controller -> {$url[1]}();
        }

      }else{
        $controller = new Errores();
      }

    }

  }

?>
