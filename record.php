<?php
    session_start();
    require "connect.php";
    require "navbar.php";
    if( !isset($_SESSION["logged_in"]) ){
		header("location:login.php");
	}
    $orderby = 'employee_Firstname';
    if( isset($_GET['orderby']) ){
        $orderby = $_GET['orderby'];
    }
    
?>
<!DOCTYPE html>
<html>
<head>
<link rel = 'stylesheet' href = 'css/bootstrap.min.css'>
<style>
#navbar-right-text {
    padding-top: 15px;
    padding-right: 5px;
}
a, a:hover {
    text-decoration: none;
    color: black;
}
</style>
</head>
<body>
    <div class='container-fluid'>
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
					EMPLOYEE 
				</strong>
			</div>
            <?php
                $query = "SELECT * FROM employee ORDER BY {$orderby} ASC";
                $result = mysqli_query($db, $query) or die("Oops! Something went wrong with the servers.");
                if($result){
                    echo "<table class = 'table table-bordered table-striped'>
                            <tr>
                                <td><a href = 'record.php?orderby=employee_Firstname' class = 'selected'>First Name
                                <span class = 'glyphicon glyphicon-triangle-bottom'></span>
                                </a></td>
                                <td><a href = 'record.php?orderby=employee_MI' class = 'selected'>Middle Initial
                                <span class = 'glyphicon glyphicon-triangle-bottom'></span>
                                </a></td>
                                <td><a href = 'record.php?orderby=employee_Lastname' class = 'selected'>Last Name
                                <span class = 'glyphicon glyphicon-triangle-bottom'></span>
                                </a></td>
                                <td><a href='record.php?orderby=employee_Type' class = 'selected'>Type
                                <span class='glyphicon glyphicon-triangle-bottom'></span>
                                </a></td>
                            </tr>
                            ";
                    while($arr = mysqli_fetch_assoc($result)){
                        echo 
                            "<tr>
                                <td>{$arr['employee_Firstname']}</td>
                                <td>{$arr['employee_MI']}</td>
                                <td>{$arr['employee_Lastname']}</td>
                                <td>{$arr['employee_Type']}</td>
                            </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div> <!-- panel -->
        </div> <!-- col-md-10 -->
    </div> <!-- row -->
    </div> <!-- container-fluid -->
</body>
</html>
<script src = 'js/jquery.min.js.txt'></script>
<script>
</script>