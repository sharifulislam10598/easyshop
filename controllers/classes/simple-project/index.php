<?php 
require 'C:\xampp\htdocs\easyshop\controllers\vendor\autoload.php'; 
    if(isset($_POST['submit'])){
       $response = (new view())->add();
       if(!$response->status){
        echo $response->get_string_errors();
       }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <title>My First Page</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="name" value=""> <br><br>
        <input type="text" name="fname" placeholder="father name" value=""> <br><br>
        <input type="text" name="village" placeholder="village" value=""> <br><br>
        <input type="file" name="image1" value=""> <br><br>
        <input type="file" name="image2" value=""> <br><br>
        <button type="submit" name="submit">save</button>
        <a href="view.php">
            <button type="button">view list</button>
        </a>
    </form>



</body>
</html>