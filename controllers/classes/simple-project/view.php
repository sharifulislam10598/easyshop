<?php
require 'C:\xampp\htdocs\easyshop\controllers\vendor\autoload.php';
 

if(isset($_GET['id'])){
  (new view())->remove();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>My First Page</title>
</head>
<body>
    <table border="on">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>fname</th>
            <th>village</th>
            <th>options</th>
        </tr>
        <?php 
        $data = new view();
        foreach($data->show_data() as $value){?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['fname'] ?></td>
            <td><?php echo $value['village'] ?></td>
            <td><img width="30px" src="<?php echo $value['image1'] ?>"></td>
            <td><img width="30px" src="<?php echo $value['image2'] ?>"></td>
            <td>
              <a href="http://localhost/easyshop/controllers/classes/simple-project/view.php?id=<?php echo $value['id'] ?>">
                <button type="button" onclick="confirm('Sure?')">delete</button>
              </a>
              <a href="http://localhost/easyshop/controllers/classes/simple-project/edit.php?id=<?php echo $value['id'] ?>">
                <button type="button">edit</button>
              </a>
            </td>
        </tr>
      <?php  }?>

    </table>
</body>
</html>