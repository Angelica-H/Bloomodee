<?php require'../check_super_admin_login.php';

if(empty($_POST['name'])){
    header('location:form_insert.php?error= chưa có thông tin tên');
    
}
else{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$password = $_POST['password'];

require '../connect.php';
$sql ="insert into customers (name,email,phone_number,password) value ('$name','$email','$phone','$password')";

mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success= thêm thành công');}