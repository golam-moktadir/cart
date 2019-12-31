<!DOCTYPE html>
<html>
<head>
	<title>Shopping Site</title>
	<link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
<div class="container">
	<h1>Shopping Site</h1>
	<center>
		<a class="btn btn-warning col-lg-2" href="index.php">Home</a>
		<a class="btn btn-warning col-lg-2" href="viewCart.php">Cart</a>
	</center>
	<br><br>
	<h2 align="center">Your Cart Products</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$total = 0;
				$i = 1;
				foreach($value as $data){	
					$total = $total + $data['price'] * $data['qty'];
			?>
			<tr>
				<form action="editCart.php" method="post">
				<td><?php echo $i++ ?></td>
				<td><input type="hidden" name="name" value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></td>
				<td><input type="hidden" name="price" value="<?php echo $data['price'] ?>"><?php echo $data['price'] ?></td>
				<td><input type="text" name="qty" value="<?php echo $data['qty'] ?>" class="form-control col-lg-6"></td>
				<td><?php echo $data['price'] * $data['qty'] ?></td>
				<td>
					<input type="submit" name="event" value="update" class="btn btn-warning">
					<input type="submit" name="event" value="delete" class="btn btn-danger">
				</td>
				</form>
			</tr>
		<?php } ?>
			<tr>
				<td colspan="4">Total</td>
				<td colspan="2"><?php echo $total ?></td>
			</tr>
		</tbody>
	</table>
	<a href="index.php" class="btn btn-primary">Continue Shopping</a>