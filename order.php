<?php
	session_start();
	require "connect.php";
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
		<div class='row'>
			<div class='col-md-4'>
				<div class='panel panel-info'>
					 <div class='panel-body'>
					 	<form>
					 		<div class='form-group'>
					 			<label for='prodName'>Product Name</label>
					 			<input type='text' class='form-control' id='prodName' placeholder='Product Name' required>
					 		</div>
					 		<div class='form-group'>
					 			<label for='prodQty'>Quantity</label>
					 			<input type='number' class='form-control' id='prodQty' placeholder='Quantity' required>
					 		</div>
					 		<button class='btn btn-success pull-right'>
								<span class='glyphicon glyphicon-plus'></span> Add
							</button>
					 	</form>
					</div>
				</div>
			</div><!-- col-md-4 -->
			<div class='col-md-8'>
				<div class='panel panel-info'>
					<div class='panel-heading'>Cart</div>
					 <div class='panel-body'>
					 	<table class='table table-striped table-bordered table-hover'>
			<th>Product Name</th>
			<th>Qty</th>
			<th>Price</th>
			<tr>
			  <td>0001</td>
			  <td>0232</td>
			  <td>02</td>
			</tr>
			<tr>
			  <td>0002</td>
			  <td>0156</td>
			  <td>01</td>
			</tr>
			<tr>
			  <td>0003</td>
			  <td>1456</td>
			  <td>01</td>
			</tr>
			<tr>
			  <td>0004</td>
			  <td>0002</td>
			  <td>02</td>
			</tr>
			<tr>
			  <td>0005</td>
			  <td>0123</td>
			  <td>03</td>
			</tr>
			<tr>
			  <td>0006</td>
			  <td>0909</td>
			  <td>03</td>
			</tr>
			<tr>
			  <td>0007</td>
			  <td>0899</td>
			  <td>02</td>
			</tr>
			<tr>
			  <td>0008</td>
			  <td>0013</td>
			  <td>2</td>
			</tr>
		</table>
					</div>
				</div>
			</div><!-- col-md-8 -->
		</div>
		</div>
	</div>
</div>
<!-- <span class='glyphicon glyphicon-menu-right'></span> -->
</body>
</html>
<script>

</script>