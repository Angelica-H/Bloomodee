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
        <h1>Thêm nhà sản xuất</h1>
        <h2><?php include '../notification.php' ?></h2>
        <h3>Tên nhà sản xuất</h3>
        <input type="text" name="name">
        <br>
        <h3>Địa chỉ</h3>
        <input type="text" name="address">
        <br>
        <h3>Số điện thoại</h3>
        <input type="text" name="phone">
        <br>
        <h3>Link ảnh</h3>
        <input type="text" name="image" placeholder="Link ảnh">
        <br>
        <button>thêm</button>

    </form>
</body>

</html>