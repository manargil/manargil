<?php

class coreView{
  function __construct(){
  }

  function render($nombre){
    require $nombre.'.php';
  }
}

 ?>
