<?php
require '../check_super_admin_login.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/bg-galaxy.css">
</head>

<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/jquery.table2excel.min.js"></script>
    <?php include '../menu.php' ?>
    <br>
    <h1>Quản lý người dùng</h1>
    <br>
    <div class="btn"><a href="form_insert.php">Thêm người dùng </a> <br>
        <button class="btn-success" style="padding:10px; border-radius:10px; margin-top:20px">
            Xuất File Excel
        </button>
    </div>

    <h1 style="font-size: 20px;"><?php include '../notification.php' ?>
    </h1>
    <!-- hien thi d lieu -->
    <?php
    include '../connect.php';
    $sql = 'select * from customers';
    $result = mysqli_query($connect, $sql)
    ?>
    <!-- end hien thi  -->
    <!-- hien ket qua -->

    <table border="1" width="100%" id="table2excel">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>email</th>
            <th>SDT</th>
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
<script>
    $("button").click(function() {
        $("#table2excel").table2excel({
            name: "Worksheet Name",
            filename: "ThongKenguoiDung",
            fileext: ".xls"
        })
    });
</script>
<script src="//use.edgefonts.net/changa-one.js"></script>

</html>