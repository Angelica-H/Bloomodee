<?php
require '../check_admin_login.php'
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
  <?php
  require '../menu.php';
  include '../connect.php';
  $sql = "select * from products";
  $result = mysqli_query($connect, $sql);


  ?>

  <h1>quản lý sản phẩm </h1>
  <div class="btn"><a href="form_insert.php">Thêm sản phẩm</a>
    <br>
    <button class="btn-success" style="padding:10px; border-radius:10px; margin-top:20px">
      Xuất File Excel
    </button>

  </div>
  <h1 style="font-size: 20px;"><?php include '../notification.php' ?></h1>

  <table border="1" width="100%" id="table2excel">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>Ảnh</th>
      <th>Giá</th>
      <th>mota</th>
      <th>sửa </th>
      <th>xóa</th>

    </tr>
    <?php foreach ($result as $each) : ?>
      <tr>
        <td><?php echo $each['id'] ?></td>
        <td><?php echo $each['name'] ?></td>
        <td><img src="photos/<?php echo $each['image'] ?>" height="100"></td>
        <td><?php echo $each['price'] ?></td>
        <td><?php echo substr("$each[description]", -100) ?></td>
        <td>
          <a href="form_update.php?id=<?php echo $each['id'] ?>">sửa</a>
        </td>
        <td>
          <a href="delete.php?id=<?php echo $each['id'] ?>">xóa</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

  <!-- hihi -->

  <!-- /.container -->

</body>
<script>
  $("button").click(function() {
    $("#table2excel").table2excel({
      name: "Worksheet Name",
      filename: "ThongKeSanPham",
      fileext: ".xls"
    })
  });
</script>
<script src="../js/table.js"></script>

</html>