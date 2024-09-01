<?php
  session_start();
  require '../../../define.php';
  require (ROOT_DIRECTORY.'\controllers\vendor\autoload.php');
  if(!isset($_SESSION['session_id'])){
    echo json_encode(['status' => 'not_logged_in']);
    $_SESSION['redirect_url'] = $_POST['redirect_url'];
      exit();
    }else{
        echo json_encode(['status' => 'success']);
        $cart = new Cart();
        $cart->form_data_collection();
        $cart->create();
      }




?>