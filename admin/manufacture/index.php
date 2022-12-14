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
    <div class="wrapper">
        <?php include '../menu.php' ?>
        <br>
        <h1>khu vực quản lý nhà sản xuất </h1>
        <div class="btn">
            <a href="form_insert.php">Thêm nha san xuất</a> <br>
            <button class="btn-success" style="padding:10px; border-radius:10px; margin-top:20px">
                Xuất File Excel
            </button>
        </div>
        <h1 style="font-size: 20px;"><?php include '../notification.php' ?></h1>
        <!-- hien thi d lieu -->
        <?php
        include '../connect.php';
        $sql = 'select * from manufacturers';
        $result = mysqli_query($connect, $sql)
        ?>

        <table id="table2excel">
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th>Ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>

            </tr>
            <!-- đổ dữ liệu -->
            <?php foreach ($result as $each) : ?>
                <!--  -->
                <tr>
                    <td> <?php echo $each['manufacturer_id'] ?></td>
                    <td> <?php echo $each['manufacturer_name'] ?></td>
                    <td> <?php echo $each['address'] ?></td>
                    <td> <?php echo $each['phone'] ?></td>
                    <td><img src="<?php echo $each['manufacturer_image'] ?>" height="100px"></td>
                    <td>
                        <a href="form_update.php?id=<?php echo $each['manufacturer_id'] ?> ">
                            Sửa
                        </a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $each['manufacturer_id'] ?>">
                            Xóa
                        </a>
                    </td>

                </tr>
                <!-- end foreach -->
            <?php endforeach ?>
        </table>
    </div>
</body>
<script>
    $("button").click(function() {
        $("#table2excel").table2excel({
            name: "Worksheet Name",
            filename: "Thống kê nhà sản xuất",
            fileext: ".xls"
        })
    });
</script>
<script src="../js/table.js"></script>

</html>