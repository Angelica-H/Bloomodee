<?php  
 require'../check_super_admin_login.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

    <?php include '../menu.php' ?>
    <br>
    khu vuc quan ly nha san xuat
    <br>
    <a href="form_insert.php">Thêm </a>
    <!-- hien thi d lieu -->
    <?php
    include '../connect.php';
    $sql = 'select * from customers';
    $result = mysqli_query($connect, $sql)
    ?>
    <!-- end hien thi  -->
    <!-- hien ket qua -->

    <table border="1" width="100%">"
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>email</th><th>SDT</th>
            <th>Password</th>
            <th>Sửa</th>
            <th>Xóa</th>

        </tr>
        <!-- đổ dữ liệu -->
        <?php foreach ($result as $each) : ?>
            <!--  -->
            <tr>
                <td> <?php echo $each['id'] ?></td>
                <td> <?php echo $each['name'] ?></td>
                <td> <?php echo $each['email'] ?></td>
                <td> <?php echo $each['phone_number'] ?></td>
                <td> <?php echo $each['password'] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?> ">
                        Sửa
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">
                        Xóa
                    </a>
                </td>

            </tr>
            <!-- end foreach -->
        <?php endforeach ?>
    </table>
</body>

</html>