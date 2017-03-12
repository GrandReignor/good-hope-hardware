<?php 
	session_start();
    require "connect.php";
?>
<?php
if(isset($_POST['name']) && isset($_POST['pass'])){
	$pass = $_POST['pass'];
	
	$user_pass = hash( "sha256", $_POST['pass']);
	echo $user_pass;
	$query = 
		"INSERT INTO account values(null, '{$_POST['name']}', '{$user_pass}', '{$_POST['em_id']}')";
	$result = mysqli_query($db, $query) or die("Error $query");
	$id = mysqli_insert_id($db);
	if($result){
		echo "<div class = 'success'>Successfully Added!</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .success{
            color: lawngreen;
            font-size: 40px;
            margin-left: 80px;
        }
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
		a {
			text-decoration: none;
			color: black;
		}
    </style>
</head>
 
<body>
<!-- Content -->
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Add a product</h3>
		</div>
		<form class="form-horizontal" action="create_account.php" method="post">
			<div class="control-group">
			<label class="control-label">UserName</label>
			<div class="controls">
				<input name="name" type="text"  placeholder="Product Name" required>
			</div>
		  </div>
		  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
			<label class="control-label">Pass</label>
			<div class="controls">
				<input name="pass" type="text" placeholder="Product Price" required>
			</div>
		  </div>
		  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
			<label class="control-label">Employee #</label>
			<div class="controls">
				<input name="em_id" type="text" placeholder="Product Price" required>
			</div>
		  </div>
		  <div class="control-group">
			  <button type="submit" class="btn btn-success">Create</button>
		  </div>
		</form>
	</div> 
</div> <!-- /container -->
</body>
</html>
