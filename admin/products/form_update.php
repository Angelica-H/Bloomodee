<?php  
 require'../check_admin_login.php'
 ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    require '../menu.php';
    include '../connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql = "select * from manufacturers";
    $manufacturers = mysqli_query($connect, $sql);
    ?>
    <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Đổi ảnh mới
        <input type="file" name="photo_new">
        <br>
        Hoặc giữ ảnh cũ <img src="photos/<?php echo $each['image'] ?>" alt="">
        <input type="hidden" name="photo_old" value="<?php echo $each['image'] ?>">
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $each['price'] ?>">
        <br>
        mô tả
        <textarea name="description" ><?php echo $each['description'] ?></textarea>
        <br>
        nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach ($manufacturers as $manufacturers) : ?>
                <option value="<?php echo $manufacturers['manufacturer_id'] ?>" <?php if ($each['manufacturer_id'] == $manufacturers['manufacturer_id']) { ?> selected <?php } ?>>

                    <?php echo $manufacturers['manufacturer_name'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <BUTton>Update</BUTton>
    </form>
</body>

</html>