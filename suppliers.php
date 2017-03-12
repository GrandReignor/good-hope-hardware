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
$order_by = "supplier_name";
if( isset($_GET["orderby"]) ){
    $order_by = $_GET["orderby"];
}
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
					<button type='submit' class='btn btn-default'><span class='glyphicon glyphicon-search'></span> Search</button>
				</form>
			</div>
		</div>
	</div>
	<div class='row'>
    	<div class='col-md-10 col-md-offset-1'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<strong>
					SUPPLIER
				</strong>
			</div>
			<?php			

			$query = 
				"SELECT 
                 supplier.supplier_Id AS 'id',  
                 supplier.supplier_Name AS 'Supplier Name',
                 supplier.supplier_Number AS 'Phone Number'
				 FROM supplier
				 WHERE supplier.supplier_Name
				 LIKE '{$search_filter}' 
				 ORDER BY {$order_by} ASC
				 ";
			$result = mysqli_query($db, $query) or die("Bad Query: $query");
			echo "<table class='table table-bordered table-striped'>";
			echo "
				<th><a href='product.php?orderby=supplier_name'>Supplier Name </a></th>
				<th><a href='product.php?orderby=supplier_number'>Contact No. </a></th>
			";
			
			if( $user_type == "Manager" ){
				echo "<th>Action</th>";
			}
			
			while( $row = mysqli_fetch_assoc($result) ) {
				echo 
				"<tr>
					<td> {$row['Supplier Name']} </td>
					<td> {$row['Phone Number']} </td>
                ";
				
				if( $user_type == "Manager" ) {
				echo
				"  	<td>
						<a class='btn btn-info' href='delivery_history.php?id={$row['id']}'>
							<span class='glyphicon glyphicon-search'></span>
							Delivery History
						</a>
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