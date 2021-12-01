<?php
require_once constant('MVCDIR').'app/core/coreController.php';

class Errores extends coreController{

  public function __construct(){
    parent::__construct();
    $this->view->render(MVCDIR.'app/view/error/index');

  }

}


 ?>
