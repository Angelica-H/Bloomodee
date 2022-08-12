<?php require'../check_super_admin_login.php';

if(empty($_POST['name'])){
    header('location:form_insert.php?error= chưa có thông tin tên');
    
}
else{
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];

require '../connect.php';
$sql ="insert into manufacturers (manufacturer_name,address,phone,manufacturer_image) value ('$name','$address','$phone','$image')";

mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success= thêm thành công');}