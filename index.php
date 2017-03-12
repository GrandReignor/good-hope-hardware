<!-- Dashboard -->
<?php 
	session_start();
	require "connect.php";
	if( !isset($_SESSION["logged_in"]) ){
		header("location:login.php");
	}
	$search_filter = "%%";
	if( isset($_POST["search_filter"]) ){
		$search_filter = "%{$_POST['search_filter']}%";
	}
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
	margin-bottom: 8px;
}
.two {
	background-color: #337680;
}
#navbar-right-text {
	padding-top: 15px;
	padding-right: 5px;
}
#extend-search-bar {
	width: 350px;
}
</style>
</head>
<body>
<!-- Top Navigation Bar -->
<?php 
    require "navbar.php";
?>
<!-- Content -->
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
            <?php
			if( $user_type == "Manager" ){
				echo "
				<a href = 'create.php'>
				<button class='btn btn-success' id='addbtn'>   
					<span class='glyphicon glyphicon-plus'></span> Add
				</button>
				</a>				
				";
			}
			
			?>
			<div class='pull-right'>
				<form class='form-inline' method='POST' action='index.php'>
					<input type='text' class='form-control' id='extend-search-bar' placeholder='Search' name='search_filter'>
					<button type='submit' class='btn btn-default'><span class='glyphicon glyphicon-search'></span> Filter By</button>
				</form>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='panel panel-primary hidden' id = 'promptbox'>
				Stuff
			</div>
		</div>
	</div>
	<div class='row'>
    	<div class='col-md-10 col-md-offset-1'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<strong>
					PRODUCT 
				</strong>
			</div>
			<?php			

			$query = 
				"SELECT 
                 product.product_Id AS 'id', 
				 product.product_Name AS 'Product Name',
		 		 product.product_Brand AS 'Brand',
				 product.retail_Price AS 'Price',
				 warehouse.location AS 'Location',
                 inventory.quantity_delivered AS 'Quantity'
				 FROM product
				 LEFT JOIN inventory
				 ON product.product_Id = inventory.product_Id
				 LEFT JOIN warehouse
				 ON inventory.warehouse_Id = warehouse.warehouse_Id
				 WHERE product.product_Name
				 LIKE '{$search_filter}' 
				 ORDER BY product.retail_Price DESC
				 ";
			$result = mysqli_query($db, $query) or die("Bad Query: $query");
			echo "<table class='table table-bordered table-striped'>";
			echo "
				<th>Product Name</th>
				<th>Brand</th>
				<th>Price</th>
                <th>Quantity</th>
				<th>Location</th>
            ";
			
			if( $user_type == "Manager" ){
				echo "<th>Action</th>";
			}
			
			while( $row = mysqli_fetch_assoc($result) ) {
				echo 
				"<tr>
					<td> {$row['Product Name']} </td>
					<td> {$row['Brand']} </td>
					<td> {$row['Price']} </td>
                    <td> {$row['Quantity']}</td>
					<td> {$row['Location']} </td>
                ";
				
				if( $user_type == "Manager" ) {
				echo 
				"  	<td>
						<a class='btn btn-warning' href='update.php?id={$row['id']}'>
							<span class='glyphicon glyphicon-pencil'></span>
							Edit
						</a>
						<a class='btn btn-danger' href='delete.php?id={$row['id']}'>
							<span class='glyphicon glyphicon-trash'></span>
							Delete
						</a>
					</td>
				";
				}
				echo "</tr>";
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