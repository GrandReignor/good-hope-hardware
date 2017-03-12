<?php
session_start();
if( isset( $_SESSION["logged_in"] ) && $_SESSION["logged_in"] ) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<title>Goodhope | Database System</title>
<link rel='stylesheet' href='css/bootstrap.min.css'>
<style>
.header{
	height: 80px;
	margin-bottom: 10px;
}
.footer{
	height: 80px;
	margin-top: 85px;
}
.loginface{
	height: 300px;
	width: 300px;
	border: 1px solid #337AB7;
	border-radius: 100%;
	display: inline-block;
	margin: 10px;
}
.largo{
	color: #337AB7;
	font-size: 200px;
	margin-top: 35px;
}
.margintop{
	margin-top: 10px;
}
.btn{
	width: 100px;
}
</style>
</head>
<body>
<div class='container-fluid'>
	<div class='row header bg-primary'>
		<h1 class='text-center'><strong>Goodhope Login</strong></h1>
	</div>
	<div class='row'>
		<div class='col-md-12 text-center'>
			<div class='loginface'>	
				<span class='glyphicon glyphicon-user largo'></span>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='text-center'>
			<form method='POST' action='authenticate.php'>
				Username:<input type='text' name='user' placeholder='Username' required class='margintop'><br>
				Password:<input type='password' name='password' placeholder='Password' required class='margintop'><br>
				<button type='submit' class='btn btn-primary margintop'>Submit</button>
			</form>
		</div>
	</div>
	<div class='row'><div class='footer bg-primary'></div></div>
</div>
</body>
</html>