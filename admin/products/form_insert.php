<?php  
 require'../check_admin_login.php'
 ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
<?php 
      require '../menu.php';
      include '../connect.php';
      $sql ="select * from manufacturers";
      $result = mysqli_query($connect,$sql);
    ?>
    <form action="process_insert.php" method="POST" enctype="multipart/form-data">
        Tên
        <input type="text" name="name">
        <br>
        ảnh
        <input type="file" name="image">
        <br>
        Giá
        <input type="number" name="price">
        <br>
        mô tả
        <textarea name="description"></textarea>
        <br>
        nhà sản xuất
            <select name="manufacturer_id">
            <?php foreach($result as $each): ?>
                <option value="<?php echo $each['manufacturer_id']?>">
                    <?php echo $each['manufacturer_name']?>
                </option>
                <?php endforeach?>
            </select>
        <BUTton>THÊM</BUTton>
    </form>
</body>
</html>