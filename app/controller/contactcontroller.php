<?php

require_once MVCDIR.'app/model/contactmodel.php';
require_once MVCDIR.'app/view/contact/viewcontact.php';

class contactController Extends coreController{

    function __construct(){

    }


    
    public function index(){
        $view = new contactView();
      
        $view -> index();

    }
}

?>
