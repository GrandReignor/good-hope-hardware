<?php
session_start();
require "connect.php";

if( isset( $_POST['id']) ){
    $id = $_POST['id'];
    $query = "DELETE FROM product WHERE product_Id = {$id}";
    mysqli_query($db, $query);
    header("location:{$_POST['prev']}");
}

if( isset($_POST['prev']) ){
    $prev = $_POST['prev'];
}else{
    $prev = $_SERVER['HTTP_REFERER'];
}

if( !isset( $_GET['id'] ) ){
    header("location:{$prev}");
}

$rowid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<title>Goodhope | Database System</title>
<link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel='stylesheet' href='css/general_style.css'>
</head>
<body>
<!-- Top Navigation Bar -->
<?php 
    require "navbar.php";
?>
<!-- Content -->
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-5 col-md-offset-1'>
		<?php			
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
				 WHERE product.product_Id = {$rowid}";
			$result = mysqli_query($db, $query) or die("Bad Query: $query");

			echo "<h2>Delete</h2>";
			echo "<table class='table table-striped'>";

			foreach($result as $head => $value){
				foreach ($value as $key => $val) {
					echo "
						<tr>
							<td>{$key}</td>
							<td>{$val}</td>
						</tr>
					";
				}
			}
			echo "</table>";
			echo "
				<form method='POST' action='delete.php'>
					<input type='hidden' name='id' value='{$rowid}'>
					<input type='hidden' name='prev' value='{$prev}'>
					<button type='submit' class='btn btn-danger'>Yes</button>
					<a href = '{$prev}'><button type = 'button' class = 'btn'>No</button></a>
				</form>
			";
		?>

		</div>
	</div>
</div>
<!-- <span class='glyphicon glyphicon-menu-right'></span> -->
</body>
</html>