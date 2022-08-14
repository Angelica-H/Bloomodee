<?php require '../check_admin_login.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="../css/bg-galaxy.css">
</head>

<body>
	
	<?php
	include'../menu.php';
	$order_id = $_GET['id'];
	require '../connect.php';
	$sql = "select 
* 
from order_product
join products on products.id = order_product.product_id
where order_id = '$order_id'";
	$result = mysqli_query($connect, $sql);
	$sum = 0;
	?>
	<h1>chi tiết đơn hàng</h1>
	<table border="1" width="100%">
		<tr>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>size</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
		</tr>
		<?php foreach ($result as $each) : ?>
			<tr>
				<td><img height='100' src="../products/photos/<?php echo $each['image'] ?>"></td>
				<td><?php echo $each['name'] ?></td>
				<td><?php echo number_format($each['price'], 0, ',', '.') ?></td>
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
					<?php echo $each['quantity'] ?>
				</td>

				<td>
					<?php
					$result = $each['price'] * $each['quantity'];
					echo number_format($result, 0, ',', '.');
					$sum += $result;
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<h1>
		Tổng tiền đơn này là <?php echo  number_format($sum, 0, ',', '.') ?>
	</h1>
</body>

</html>