<?php
require '../check_super_admin_login.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/bg-galaxy.css">
    
</head>

<body>
    <!-- thong bao loi -->
    <?php
    include '../menu.php'
    ?>


    <!-- end thong bao -->

    <form action="process_insert.php" method="POST">
        <h1>Thêm Người dùng</h1>
        <h2><?php include'../notification.php'?></h2>
        <h3>Họ Tên</h3>
        <input type="text" name="name">
        <br>
        <h3>Email</h3>
        <input type="text" name="email">
        <br>
        <h3>Password</h3>
        <input type="text" name="password">
        <br>
        <h3>Số điện thoại</h3>
        <input type="text" name="phone">
        <br>
        <button>thêm</button>

    </form>
</body>

</html>