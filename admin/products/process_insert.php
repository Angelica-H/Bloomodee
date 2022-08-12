<?php
require'../check_admin_login.php';
$name = $_POST['name'];
$image = $_FILES['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];
$folder = 'photos/';

$file_extention = explode('.', $image['name'])[1];
$file_name = time() . '.' . $file_extention;
$path_file = $folder . time() . '.' . $file_extention;
move_uploaded_file($image["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name,image,price,description,manufacturer_id) value('$name','$file_name','$price','$description','$manufacturer_id')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success= Thêm thành công');
