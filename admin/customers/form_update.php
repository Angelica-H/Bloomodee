<?php  
require'../check_super_admin_login.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (empty($_GET['id'])) {
        header('location:index.php?error:phải có mã để sửa');
    }
    $id = $_GET['id'];

    require '../connect.php';
    $sql = "select * from customers where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each =  mysqli_fetch_array($result);
    include '../menu.php'
    ?>
  

    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        email
        <input type="text" name="email" value="<?php echo $each['email'] ?>">
        <br>
        SDT
        <input type="text" name="phone" value="<?php echo $each['phone_number'] ?>">
        <br>
        password
        <input type="text" name="password" value="<?php echo $each['password'] ?>">
        <br>
        <button>Sửa</button>

    </form>
</body>

</html>