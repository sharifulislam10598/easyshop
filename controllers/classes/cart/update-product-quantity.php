<?php
  session_start();
 
  require '../../../define.php';
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');
  print_r($_POST);

  $cart = new Cart();
  $cart->quantity = $_POST['quantity'];
  $cart->update_product_quantity();

?>