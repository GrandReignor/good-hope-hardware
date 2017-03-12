<?php
session_start();
require "connect.php";

$redirect_index = "location:index.php";
$redirect_back = "location:login.php";

$user = $_POST["user"];
$pass = $_POST["password"];

$query = 
	"SELECT account.account_password, account.employee_Id
	 FROM account
	 WHERE account.account_Username = '{$user}'";

$result = mysqli_query($db, $query) or die("Bad Query: $query");
$checker = mysqli_num_rows($result);

// If username in databse
if($checker == 0){
	header($redirect_back);
	exit();
}

// If pass is correct
$user_details_assoc = mysqli_fetch_assoc($result);
$user_pass = $user_details_assoc["account_password"];
$input_pass = hash( "sha256", $pass);
if( $user_pass == $input_pass ){
	
	// Take employee type
	$query = 
		"SELECT employee.employee_Type
		 FROM employee
		 WHERE employee.employee_id = '{$user_details_assoc['employee_Id']}'";
	$result = mysqli_query($db, $query) or die("Bad Query: $query");
	$user_details_assoc = mysqli_fetch_assoc($result);
	
	// Take important login details
	$_SESSION["user"] = $user;
	$_SESSION["user_type"] = $user_details_assoc["employee_Type"];
	$_SESSION["logged_in"] = true;	
		
	header($redirect_index);
	exit();
}

header($redirect_back);
?>