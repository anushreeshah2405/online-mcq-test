<?php
	include('connection.php');

	$code	= strtoupper($_POST['code']);
	$name 	= ucwords($_POST['name']);
	$sem 	= $_POST['sem'];
	$active = $_POST['status'];
	
	$sql = " UPDATE sub_registration SET sub_code='".$code."' , sub_name = '".$name."', semester = '".$sem."', active = '".$active."', created_by = '".$_SESSION['panel_user']['username']."',modified_date = '".$datetime."' ";
	$sql .= "WHERE sub_code = '".$code."'";
	$res	= mysqli_query($db_con, $sql) or die(mysqli_error($db_con));
	
	echo("Successfully Inserted");
	
?>