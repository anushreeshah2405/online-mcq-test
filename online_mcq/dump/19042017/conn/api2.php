<?php
	include('connection.php');

	$code	= strtoupper($_POST['code']);
	$name 	= ucwords($_POST['name']);
	$sem 	= $_POST['sem'];
	
	$sql = " INSERT INTO sub_registration (sub_code, sub_name, semester, status, created_by, created_date,modified_date) ";
	$sql .= " VALUES('".$code."', '".$name."','".$sem."', '0', '".$_SESSION['panel_user']['username']."', '".$datetime."', '".$datetime."')";
	$res	= mysqli_query($db_con, $sql) or die(mysqli_error($db_con));
	
	echo("Successfully Inserted");
	
?>