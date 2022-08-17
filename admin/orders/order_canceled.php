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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../js/jquery.table2excel.min.js"></script>
	<div class="wrapper">
		<?php include '../menu.php' ?>
		<br>
		<h1>Đơn đã Hủy </h1>
		<div class="btn">

		</div>
		<h1 style="font-size: 20px;"><?php include '../notification.php' ?></h1>
		<!-- hien thi d lieu -->


		<table id="table2excel">
			<tr>
				<th>Ngày đặt</th>
				<th>Thông tin người nhận </th>
				<th>Thông tin người dùng</th>

				<th>Tổng tiền</th>


			</tr>
			<!-- đổ dữ liệu -->
			<?php
			require '../connect.php';
			$sum = 0;
			$sql = "select 
				orders.*,
				customers.name,
				customers.phone_number,
				customers.address
				from orders
				join customers
				on customers.id = orders.customer_id
				where status =2
				";
			$result = mysqli_query($connect, $sql);
			?>
			<!--  -->
			<?php foreach ($result as $each) : ?>
				<tr>

					<td><?php echo $each['created_at'] ?></td>

					<td>
						<?php echo $each['name_receiver'] ?><br>
						<?php echo $each['phone_receiver'] ?><br>
						<?php echo $each['address_receiver'] ?><br>
					</td>
					<td>
						<?php echo $each['name'] ?><br>
						<?php echo $each['phone_number'] ?><br>
						<?php echo $each['address'] ?><br>
					</td>

					<td><?php echo number_format($each['total_price'], 0, ',', '.');
						$sum += $each['total_price'];
						?></td>

				</tr>
			<?php endforeach ?>
			

		</table>
		<button class="btn btn-success">Xuất File Excel<button>
	</div>
</body>
<script>
	$("button").click(function() {
		$("#table2excel").table2excel({
			name: "Worksheet Name",
			filename: "ThongKeDonHangDaHuy",
			fileext: ".xls"
		})
	});
</script>
<script src="../js/table.js"></script>

</html>