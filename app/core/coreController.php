<?php

class coreController{

  function __construct(){
    $this->view = new coreView();
  }

  function loadModel($model){
    $url = "models/".$model.'model.php';

    if(file_exists($url)){
      require $url;

      $modelName = $model.'Model.php';
      $this->model = new $modelName();
    }
  }

}

 ?>
