<?php
function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST']."/Bloomode/";

    return $url;
   
}; 

$email = $_POST['email'];
include 'admin/connect.php';
$sql = "select * from customers where email='$email'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) === 1) {
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "delete form forgot_password where customer_id= '$id' ";
    mysqli_query($connect, $sql);
    $token = uniqid();
    $sql = "insert into forgot_password (customer_id,token) values('$id','$token')";
    mysqli_query($connect, $sql);
    $link = current_url() . '/change_new_password.php?token=' . $token;
    require 'mail.php';
    
    $content="Change new password";
    $description="bấm vào để đổi mật khẩu <a href='$link'> Hiệu lựu trong 24s</a>";
    $name=$name;
    $mail_send="$email";

    $mail = new mailer();
    $mail->sendmail($content, $mail_send, $name, $description);
    header('location:signin.php?success=Gửi mail thành công vào mail để đổi mật khẩu');

  
} else{
    header('location:forgot_password.php?error=Sai email nhập lại');
}



