<?php 
	require "connect.php";
    require "navbar.php";
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<title>Goodhope | Database System</title>
<link rel='stylesheet' href='css/bootstrap.min.css'>
<style>
body {
	height: 100%;
}
.row {
	margin-bottom: 10px;
}
.two {
	background-color: #337680;
}
#navbar-right-text {
	padding-top: 15px;
	float: right;
}
#extend-search-bar {
	width: 350px;
}
</style>
</head>
<body>
<!-- Top Navigation Bar -->
    <?php 
        echo $_SESSION['c'];
    ?>
<!-- Content -->
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='pull-right'>
				<form class='form-inline'>
					<input type='text' class='form-control' id='extend-search-bar'placeholder='Search'>
					<button class='btn btn-default'><span class='glyphicon glyphicon-search'></span> Filter By</button>
				</form>
			</div>
			<!-- <input class='pull-right' type='text' placeholder='Search Inventory ID'> -->
		</div>
	</div>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
		<div class='panel panel-primary'>
			<div class='panel-heading'><strong>INVENTORY</strong></div>
			<?php			
			mysql_select_db('product');

			$query = 
				"SELECT 
				 product.product_Name AS 'Product Name',
		 		 product.product_Brand AS 'Brand',
				 product.retail_Price AS 'Price',
				 inventory.quantity_Delivered AS 'Quantity',
				 Warehouse.location AS 'Location'
				 FROM product
				 LEFT JOIN inventory
				 ON product.product_Id = inventory.product_Id
				 LEFT JOIN warehouse
				 ON inventory.warehouse_Id = warehouse.warehouse_Id
				 ORDER BY product.product_Name ";
			$result = mysqli_query($db, $query) or die("Bad Query: $query");

			echo "<table class='table table-bordered table-striped' border='1'>";
			echo "
				<th>Product Name</th>
				<th>Brand</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Location</th>";
			while( $row = mysqli_fetch_assoc($result) ) {
				echo 
				"<tr>
					<td> {$row['Product Name']} </td>
					<td> {$row['Brand']} </td>
					<td> {$row['Price']} </td>
					<td> {$row['Quantity']} </td>
					<td> {$row['Location']} </td>
				</tr>";
			}

			echo "</table>"
			?>
		</div>
		</div>
	</div>
</div>
<!-- <span class='glyphicon glyphicon-menu-right'></span> -->
</body>
</html>
<script>

</script>