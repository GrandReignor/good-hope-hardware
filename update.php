<?php
session_start();
require "connect.php";

if( isset( $_POST['id']) ){
	$id = $_POST['id'];
    if(isset($_POST['Name']) && $_POST['Name'] != ''){
       $query = "UPDATE product SET product.product_Name = '{$_POST['Name']}' WHERE product_Id = {$id}"; 
       mysqli_query($db, $query);
    }
    if(isset($_POST['Price']) && $_POST['Price'] != 0){
       $query = "UPDATE product SET product.retail_Price = '{$_POST['Price']}' WHERE product_Id = {$id}";
       mysqli_query($db, $query);
    }
    if(isset($_POST['Brand'])){
       $query = "UPDATE product SET product.product_Brand = '{$_POST['Brand']}' WHERE product_Id = {$id}";
       mysqli_query($db, $query);
    }
//    if(isset($_POST['Quantity'])){
//       $query = "UPDATE inventory SET inventory.quantity_Delivered = {$_POST['Quantity']} WHERE product_Id = {$id}";
//       mysqli_query($db, $query);
//    }
//    if(isset($_POST['Location'])){
//        switch($_POST['Location']){
//            case 'Store':
//                $x = 1;
//                break;
//            case 'WH1':
//                $x = 2;
//                break;
//            case 'WH2':
//                $x = 3;
//                break;
//            case 'WH1 outside floor':
//                $x = 4;
//                break;
//            case 'WH2 outside floor';
//                $x = 5;
//                break;
//            default: 
//                $x = 0;
//        }
//       $query = "UPDATE inventory SET inventory.warehouse_Id = '{$x}' WHERE product_Id = {$id}";
//       mysqli_query($db, $query);
//    }
    if(isset($_POST['warranty']) && $_POST['warranty'] != ''){
       $query = "UPDATE product SET product.product_warranty = '{$_POST['warranty']}' WHERE product_Id = {$id}";
       mysqli_query($db, $query);
    }
//	$query = "UPDATE product SET WHERE product_Id = {$id}";
//	mysqli_query($db, $query);
	header("location:{$_POST['prev']}");
}
/*Product Name = '{$_POST['name']}',
                Product Brand = '{$_POST['brand']}', 
                Product Price = {$_POST['price']}, 
                Product Quantity = {$_POST['quantity']},
                Product Location = '{$_POST['location']}'*/
//(isset($_POST['name']) || isset($_POST['price']) || isset($_POST['brand']) || isset($_POST['quantity']) || isset($_POST['location']))){

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
			mysql_select_db('product');

			$query = 
				"SELECT
				 product.product_Name AS 'Name',
		 		 product.product_Brand AS 'Brand',
				 product.retail_Price AS 'Price'
				 FROM product
				 WHERE product.product_Id = {$rowid}";
			$result = mysqli_query($db, $query) or die("Bad Query: $query");

			echo "<h2>Update</h2>";
			echo "<table class='table table-striped'>";
            
			foreach($result as $head => $value){
                echo "<form method = 'POST' action = 'update.php'>
                    <input type='hidden' name='id' value='{$rowid}'>
					<input type='hidden' name='prev' value='{$prev}'>";
				foreach ($value as $key => $val) {
					echo "
						<tr>
							<td>{$key}</td>
                            <div class='control-group'>
                                <div class='controls'> 
                                    <td><input name='{$key}' type='text'  value='{$val}'></td>
                                </div>
                            </div>
						</tr>
					";
				}
			}
            echo "<tr>
            <div class='control-group'>
            <div class='controls'> 
                <td> 
                   <button type='submit' class='btn btn-success'>Update</button>
					<a href = '{$prev}'><button type = 'button' class = 'btn'>Back</button></a>
                </td>
            </div>
            </div>
                  </tr> 
                </form>
            </table>";
//			echo "
//				<form method='POST' action='update.php'>
//					<input type='hidden' name='id' value='{$rowid}'>
//					<input type='hidden' name='prev' value='{$prev}'>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Name : 
//                            <input name='name' type='text'  placeholder='Name'>
//                        </div>
//                    </div>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Price :&nbsp&nbsp  
//                            <input name='price' type='text'  placeholder='Price'>
//                        </div>
//                    </div>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Brand : 
//                            <input name='brand' type='text'  placeholder='Brand'>
//                        </div>
//                    </div>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Warranty : 
//                            <input name='warranty' type='text'  placeholder='Warranty'>
//                        </div>
//                    </div>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Quantity : 
//                            <input name='quantity' type='text'  placeholder='Quantity'>
//                        </div>
//                    </div>
//                    <div class='control-group'>
//                        <div class='controls'>
//                        Product Location : 
//                            <input name='location' type='text'  placeholder='Location'>
//                        </div>
//                    </div>
//                    
//					<button type='submit' class='btn btn-success'>Update</button>
//					<a href = '{$prev}'><button type = 'button' class = 'btn'>Back</button></a>
//				</form>
//			";
            
			?>

		</div>
	</div>
</div>
<!-- <span class='glyphicon glyphicon-menu-right'></span> -->
</body>
</html>