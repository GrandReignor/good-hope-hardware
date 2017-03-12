<?php 
	session_start();
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link   href="css/bootstrap.min.css" rel="stylesheet">
<link rel='stylesheet' href='css/general_style.css'>
<style>
.success{
    color: lawngreen;
    font-size: 40px;
    margin-left: 80px;
}
</style>
</head>
<body>
<!-- Top Navigation Bar -->
<?php
	require "navbar.php";
?>
<!-- Content -->
<div class="container">
	<div class="row">
        <h3>Add a product</h3>
    </div>
    <form class="form-horizontal" action="create.php" method="post">
        <div class="control-group">
            <label class="control-label">Name</label>
            <div class="controls">
                <input name="name" type="text"  placeholder="Product Name" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Price</label>
            <div class="controls">
                <input name="price" type="text" placeholder="Product Price" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Brand (Optional)</label>
            <div class="controls">
                <input name="brand" type="text"  placeholder="Product Brand">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Warranty (Optional)</label>
            <div class="controls">
                <input name="warranty" type="text"  placeholder="Product Warranty">
            </div>
        </div>
        <div class="control-group">
            <button type="submit" class="btn btn-success">Create</button>
            <a href = "product.php"><button type="button" class="btn">Back</button></a>
        </div>
    </form>
</div> 
</div> <!-- Container -->
<?php
if(isset($_POST['name']) && isset($_POST['price'])){
	$query = 
		"INSERT INTO product values(null, '{$_POST['warranty']}', {$_POST['price']}, '{$_POST['name']}', '{$_POST['brand']}')";
	$result = mysqli_query($db, $query) or die("Error $query");
	$id = mysqli_insert_id($db);
	if($result){
		echo "<div class = 'success'>Successfully Added!</div>";
	}
}
?>
</body>
</html>
