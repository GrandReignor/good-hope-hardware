<!DOCTYPE html>
<head>
<title>GoodHope | Database System</title>
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
.btn {
	width: 100%;
}
</style>

</head>
<body>
<!-- Top Navigation Bar -->
<nav class='navbar navbar-default'>
<div class='container-fluid'>
    <div class='navbar-header'>
     	<a class='navbar-brand'>Goodhope Hardware</a>
    </div>
	<div>
     	<ul class='nav navbar-nav'>
     		<!-- Place required  here -->
        	<li><a href='index.php'>Inventory</a></li>
      		<li><a href='#'>Employee Records</a></li>
      		<li><a href='#'>Transactions</a></li>
      		<li class='active'><a href='search.php'>Filtered Search</a></li>      		
        </ul>
      	<span id='navbar-right-text'>Signed in as Admin</span>
    </div>
</div>
</nav>
<!-- Content -->
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
		<div class='panel panel-info'>
			<div class='panel-heading'><strong>Filter By</strong></div>
			<div class='panel-body'>
				<form class='form'>
					<div class='row'>
						<div class='col-md-2'>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
							<button class='btn btn-default'>table_name</button>
						</div>
						<div class='col-md-9'>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- <span class='glyphicon glyphicon-menu-right'></span> -->
</body>
</html>
<script>

</script>