<?php
	include('connection.php');
	
	$mrks = $_POST['mrks'];
	$sub = $_POST['sub_c'];
	$enroll = $_POST['enroll'];
	
	$sql = "UPDATE results set marks ='".$mrks."' where sub_code ='".$sub."'  AND enroll_no ='".$enroll."'";
	$res_out = mysqli_query($db_con, $sql) or die(mysqli_error($db_con));
	
	
	header( 'Location: ../logout.php');
?>