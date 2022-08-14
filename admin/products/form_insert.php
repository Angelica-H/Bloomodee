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
    require '../menu.php';
    include '../connect.php';
    $sql = "select * from manufacturers";
    $result = mysqli_query($connect, $sql);
    ?>
    <form action="process_insert.php" method="POST" enctype="multipart/form-data">
         <h3>Tên sản phẩm</h3>
        <input type="text" name="name">
        <br>
        <h3>Thêm ảnh sản phẩm</h3>
        <input type="file" name="image">
        <br>
        <h3>Giá sản phẩm</h3>
        <input type="number" name="price">
        <br>
        <h3> Mô tả chi tiết</h3>
        <textarea name="description" style="width: 80%;"></textarea>
        <br>
        <h3> Nhà sản xuất</h3>
        <select name="manufacturer_id" style="width: 50%; padding:5px">
            <?php foreach ($result as $each) : ?>
                <option value="<?php echo $each['manufacturer_id'] ?>">
                    <?php echo $each['manufacturer_name'] ?>
                </option>
            <?php endforeach ?>
        </select><br>
        <button>THÊM</button>
    </form>
</body>

</html>