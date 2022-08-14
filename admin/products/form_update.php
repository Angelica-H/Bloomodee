<?php
require '../check_admin_login.php'
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
        <h3>Tên Sản phẩm</h3>
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <h3>Đổi ảnh mới</h3>
        <input type="file" name="photo_new">
        <br>
        <h4>Hoặc giữ ảnh cũ </h4><img src="photos/<?php echo $each['image'] ?>" alt="" width="50%">
        <input type="hidden" name="photo_old" value="<?php echo $each['image'] ?>">
        <br>
        <h3>Giá</h3>
        <input type="number" name="price" value="<?php echo $each['price'] ?>">
        <br>
        <h3>mô tả</h3>
        <textarea name="description" style="width: 80%;height: 100px;"><?php echo $each['description'] ?></textarea>
        <br>
        <h3>nhà sản xuất</h3>
        <select name="manufacturer_id" style="width: 50%; padding:5px">
            <?php foreach ($manufacturers as $manufacturers) : ?>
                <option value="<?php echo $manufacturers['manufacturer_id'] ?>" <?php if ($each['manufacturer_id'] == $manufacturers['manufacturer_id']) { ?> selected <?php } ?>>

                    <?php echo $manufacturers['manufacturer_name'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <BUTton>Update</BUTton>
    </form>
</body>

</html>