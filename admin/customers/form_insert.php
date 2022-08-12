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
    <!-- thong bao loi -->
    <?php 
        include'../menu.php'
    ?>
        

    <!-- end thong bao -->

    <form action="process_insert.php" method="POST">
        Tên
       <input type="text" name="name">
       <br>
       email
       <input type="text" name="email">
       <br>
       password
       <input type="text" name="password">
       <br>
       Số điện thoại
       <input type="text" name="phone">
       <br>
       <button>thêm</button>
       
    </form>
</body>
</html>