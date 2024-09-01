<?php
  session_start();
  print_r($_POST);
  require '../../../define.php';
  print_r($_POST);
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');
  $delivery_details = new DeliveryDetails();
  $delivery_details->save();

?>