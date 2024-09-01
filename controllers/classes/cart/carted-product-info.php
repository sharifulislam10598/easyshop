<?php
    session_start();
  require '../../../define.php';
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');
  $carted_product = [];
  $carted_product_info = (new Cart())->get_carted_item();
  foreach($carted_product_info as $value){
    $carted_product[] = $value;
  }
  echo json_encode($carted_product);
  


?>