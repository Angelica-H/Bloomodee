<?php
require'../check_super_admin_login.php';

if (empty($_POST['id'])) {
    header('location:form_update.php?error= chưa có thông tin tên');
};

$id = $_POST['manufacturer_id'];
$name = $_POST['manufacturer_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['manufacturer_image'];

require '../connect.php';
$sql = " update manufacturers set
    manufacturer_name = '$name',
    address = '$address',
    phone = '$phone',
    manufacturer_image = '$image'
    
    where manufacturer_id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success= Cập nhật thành công');
