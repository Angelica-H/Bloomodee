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
    <?php
    if (empty($_GET['id'])) {
        header('location:index.php?error:phải có mã để sửa');
    }
    $id = $_GET['id'];

    require '../connect.php';
    $sql = "select * from manufacturers where manufacturer_id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each =  mysqli_fetch_array($result);
    include '../menu.php'
    ?>


    <form action="process_update.php" method="POST">
        <input type="hidden" name="manufacturer_id" value="<?php echo $each['manufacturer_id'] ?>">
        <h1>Cập nhật thông tin<br> nhà sản xuất</h1>
        <h2><?php include '../notification.php' ?></h2>
         <h3>Tên nhà sản xuẩt</h3>
        <input type="text" name="manufacturer_name" value="<?php echo $each['manufacturer_name'] ?>">
        <br>
        <h3>Địa chỉ</h3>
        <input type="text" name="address" value="<?php echo $each['address'] ?>">
        <br>
        <h3>Số điện thoại</h3>
        <input type="text" name="phone" value="<?php echo $each['phone'] ?>">
        <br>
       <h3>Link Ảnh</h3>
        <input type="text" name="manufacturer_image" value="<?php echo $each['manufacturer_image'] ?>">
        <br>
        <button>Sửa</button>

    </form>
</body>

</html>