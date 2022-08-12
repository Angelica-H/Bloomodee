<?php

if (empty($_POST['id'])) {
    header('location:my-account.php?error= chưa có thông tin tên');
};

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$newpw = $_POST['newpw'];
$repw = $_POST['repw'];
require '../admin/connect.php';
if (empty($_POST['newpw'])) {
    $sql = " update customers set
    name = '$name',
    email = '$email',
    address = '$address',
    phone_number = '$phone_number'
    where id = '$id'";
} else {
    if ($newpw != $repw) {
        header('location:my-account.php?error=mật khẩu không khớp yêu cầu nhập lại');
    } else {
        $sql = " update customers set
    password = '$newpw'
    where id = '$id'";
    }
}

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:my-account.php?success= Cập nhật thành công');
