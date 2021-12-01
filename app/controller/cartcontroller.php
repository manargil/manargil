<?php

require_once MVCDIR.'app/model/cartmodel.php';
require_once MVCDIR.'app/view/shop/viewcart.php';

class cartController extends coreController{

   

    function __construct(){

    }

    
    public function index(){
       
        $view = new cartView();
        $view -> index();

	}
	

}

?>
