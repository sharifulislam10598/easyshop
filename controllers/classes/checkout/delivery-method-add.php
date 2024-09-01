<?php
  session_start();
  require '../../../define.php';
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');

  $shipping_method_list = (new DeliveryMethodList())->get_delivery_method_list();
  $shipping_method = $_POST['method'];
  $shipping_cost = '';
  foreach($shipping_method_list as $value){
    if($value['method'] == $shipping_method){
        $shipping_cost = $value['shipping_cost'];
    } 
  }

  $delivery_method = new DeliveryMethod();
  $delivery_method->shipping_cost = $shipping_cost;
  $delivery_method->save();

?>