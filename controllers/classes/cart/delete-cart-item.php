<?php
  require '../../../define.php';
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');
  session_start();
    print_r($_GET);
    $cart = new Cart();
    $cart->remove();



?>