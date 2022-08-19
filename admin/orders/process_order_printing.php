<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/hoadon.css">
</head>

<body onload="window.print();">
  <div id="page" class="page">
    <div class="header">
      <div class="logo">
        <h1>
          Bloomode </h1>
      </div>
      <div class="company">
      </div>
    </div>
    <br />
    <div class="title">
      HÓA ĐƠN THANH TOÁN
      <br />
      -------oOo-------
    </div>
    <br />
    <?php
    require '../connect.php';
    $id = $_GET['id'];
    $sql = "select 
      orders.*,
      customers.name,
      customers.phone_number,
      customers.address
      from orders
      join customers
      on customers.id = orders.customer_id where orders.id= '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result)
    ?>
    <h2>Khách Hàng : <?php echo $each['name_receiver'] ?> </h2>
    <h3>Địa chỉ : <?php echo $each['address_receiver'] ?></h3>
    <h3>Số điện thoại : <?php echo $each['phone_receiver'] ?></h3>
    <br />
    <table class="TableData">
      <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Đơn giá</th>
        <th>size</th>
        <th>color</th>
        <th>Số Lượng</th>
        <th>Thành tiền</th>
      </tr>
      <?php
      $sql = "select 
    * 
    from order_product
    join products on products.id = order_product.product_id
    where order_id = '$id' ";
      $result = mysqli_query($connect, $sql);
      $rw = mysqli_fetch_array($result);
      $sum = 0;
      $stt = 1;
      ?>
      <?php foreach ($result as $each) : ?>
        <tr>
          <td><?php echo $stt;
              $stt++ ?></td>
          <td><?php echo $each['name'] ?></td>
          <td><?php echo number_format($each['price'], 0, ',', '.') ?>đ</td>
          <!-- size -->
          <td>
            <?php

            $sisi = $each['size_product_id'];
            $sql1 = "select * from product_size where size_id=$sisi";
            $result1 = mysqli_query($connect, $sql1);
            $each1 = mysqli_fetch_array($result1)
            ?>
            <?php echo $each1['size_name'] ?>
          </td>
          <td>
          <?php
                    if (empty($each['color_product_id'])) {
                        $sisi = 1;
                    } else {
                        $sisi = $each['color_product_id'];
                    }


                    $sql = "select * from product_color where color_id='$sisi'";
                    $result = mysqli_query($connect, $sql);
                    $each1 = mysqli_fetch_array($result)
                    ?>
                    <?php echo $each1['color_name'] ?>
          </td>
          <td>
            <?php echo $each['quantity'] ?>
          </td>

          <td>
            <?php
            $result = $each['price'] * $each['quantity'];
            echo number_format($result, 0, ',', '.');
            $sum += $result;
            ?>đ
          </td>
        </tr>
      <?php endforeach ?>
      <tr>
        <td colspan="6" class="tong">Tổng cộng</td>
        <td class="cotSo"><?php echo  number_format($sum, 0, ',', '.') ?>đ</td>
      </tr>
    </table>
    <div class="footer-left"> Hà Nội, ngày
      <?php
      $today = date("d/m/Y");
      echo $today;
      ?>
      <br />
      Khách hàng
    </div>
    <div class="footer-right"> Hà Nội, ngày
      <?php
      $today = date("d/m/Y");
      echo $today;
      ?> <br /><br />
      Nhân viên </div>
  </div>
</body>

</html>