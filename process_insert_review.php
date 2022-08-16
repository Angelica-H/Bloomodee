<?php 
include'admin/connect.php';
$product_id = $_GET['product_id'];
$user_review = $_GET['user_review'];
$user_email = $_GET['user_email'];
$review = $_GET['review'];
$sql="insert into product_review (product_id,user_review,user_email,review) value ('$product_id','$user_review','$user_email','$review')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:product-list.php?$id=11');
