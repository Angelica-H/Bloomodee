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
</head>

<body>
  <?php
  require '../menu.php';
  include '../connect.php';
  $sql = "select * from products";
  $result = mysqli_query($connect, $sql);


  ?>
  
  <h1>quản lý sản phẩm </h1>
  <a href="form_insert.php">Thêm sản phẩm</a>
  <table border="1" width="100%">
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
        <td><?php echo $each['description'] ?></td>
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
  <script src="../js/js_table_ds.js"></script>
</body>

</html>