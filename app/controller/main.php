<?php
class main extends coreController{

  function __construct(){
    coreController::__construct();
    $this->view->render(MVCDIR.'app/view/main/index');
  }
}

 ?>
