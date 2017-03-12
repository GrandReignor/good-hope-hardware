<?php
require "connect.php";

if( isset($_SESSION["user"]) ){
	$user = ucfirst( $_SESSION["user"] ); // Uppercase first letter
	$user_type = $_SESSION["user_type"];
		
	echo "
		<nav class='navbar navbar-default'>
		<div class='container-fluid'>
		<div class='navbar-header'>
		<a class='navbar-brand'>Goodhope Hardware</a>
		</div>
		<div>
	";
	
	// Tabs
    echo "<ul class='nav navbar-nav'>";
    if( $user_type == "Manager" ){
		echo "
			<li class='{$currPage['dashboard']}'><a href='index.php'>Dashboard</a></li>
            <li class='{$currPage['inventory']}'><a href='product.php'>Inventory</a></li>
		";
	}
	echo "
		
		<li class='{$currPage['product']}'><a href='product.php'>Product</a></li>
		<li class='{$currPage['order']}'><a href='order.php'>Order</a></li>
	";
	if( $user_type == "Manager" ){
		echo "
            <li class='{$currPage['suppliers']}'><a href='suppliers.php'>Suppliers</a></li>
			<li class='{$currPage['record']}'><a href='record.php'>Employee Records</a></li>
            <li class='{$currPage['reports']}'><a href='reports.php'>Reports</a></li>
		";
	}
	echo "
		</ul>
		<ul class='nav navbar-nav navbar-right'>
		<li><a href='logout.php'>Logout</a></li>
		</ul>
	";
	
	echo "
		<div class='pull-right' id='navbar-right-text'>
		<span id='navbar-right-text'>Signed in as {$user}</span>
		</div> <!-- pull-right -->
		</div> <!-- navbar-header -->
		</div> <!-- container-fluid -->
		</nav>
	";
}
?>