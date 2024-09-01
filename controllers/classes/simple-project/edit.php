<?php 
require 'C:\xampp\htdocs\easyshop\controllers\vendor\autoload.php'; 
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $response = (new view())->list_update();
        if(!$response->status){
            echo $response->get_string_errors();
        }
    }

    $info = (new view())->get_one($id);

?>

<!DOCTYPE html>
<html>
<head>
  <title>My First Page</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="http://localhost/easyshop/controllers/classes/simple-project/edit.php?id=<?php echo $id ?>  ">
        <input type="text" name="name" placeholder="name" value="<?php echo $info['name'] ?>"> <br><br>
        <input type="text" name="fname" placeholder="father name" value="<?php echo $info['fname'] ?>"> <br><br>
        <input type="text" name="village" placeholder="village" value="<?php echo $info['village'] ?>"> <br><br>
        <input type="file" name="image1"  value=""> <br><br>
        <input type="file" name="image2" value=""> <br><br>
        <button type="submit" name="submit">Save Changes</button>
        <a href="view.php">
            <button type="button">view list</button>
        </a>
    </form>



</body>
</html>