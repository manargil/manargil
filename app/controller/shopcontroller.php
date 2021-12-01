<?php

require_once MVCDIR.'app/model/shopmodel.php';
require_once MVCDIR.'app/model/cartmodel.php';
require_once MVCDIR.'app/view/shop/viewshop.php';

class shopController extends coreController{

    private $productoscart=[];

    function __construct(){
    }

    public function addtocart(){
     session_start();
     

     if(!isset($_SESSION['productoscart'])){
        $_SESSION['productoscart']=array();
        $productoscart=array();
     }else{
         $productoscart=$_SESSION['productoscart'];
     }
      //var_dump($productoscart);
      $productoid=$_GET['productoid'];
      $userid=$_SESSION['userid'];
      $productos=array_filter($productoscart,  function($producto) use($productoid){
          return $producto->productoid ==$productoid;
      });
      
      $cantidad = 0;
      $total=0;
      $producto = shopmodel::getproducto($productoid);

      if(count($productos)>0){
        $cantidad=$productos[0]->cantidad+1;
        $total=$productos[0]->cantidad * $producto->precio;
      }else{
          $cantidad=$cantidad+1;
      }

      
      $productkey=array_search($productoid,array_column($productoscart,'productoid'));
   
      if($productkey===false){
        $cartmodel= new cartmodel(0,$productoid,$userid,$cantidad,$producto->precio);
        array_push($productoscart,$cartmodel);
        
      }else{
          $productoscart[$productkey]->cantidad= $cantidad;
          $productoscart[$productkey]->total= $producto->precio*$cantidad;
      }
      
      $_SESSION['productoscart']=$productoscart;

    }


    public function index(){
        $productos = shopmodel::getproductos();
        $view = new shopView();
        $view -> index($productos);

	}
	

}

?>
