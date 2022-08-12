<?php
require'../check_super_admin_login.php';

if (empty($_POST['id'])) {
    header('location:form_update.php?error= chưa có thông tin tên');
};

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

require '../connect.php';
$sql = " update customers set
    name = '$name',
    email = '$email',
    phone_number = '$phone',
    password = '$password'
    
    where id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success= Cập nhật thành công');
