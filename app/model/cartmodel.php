<?php

require_once MVCDIR.'app/core/coreModel.php';

class cartmodel extends coreModel{

    public $id;
    public $productoid;
    public $usuarioid;
    public $cantidad;
    public $total;


    public function __construct($id,$productoid,$usuarioid,$cantidad,$total){
        parent::__construct();
        $this->id=$id;
        $this->productoid=$productoid;
        $this->usuarioid=$usuarioid;
        $this->cantidad=$cantidad;
        $this->total=$total;
        
    }
    


    
    
  
}

?>