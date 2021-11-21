<?php
include('connection.php');

	$name = ucwords($_POST['name']);
$role_id= $_POST['role_id'];
$emp_id= strtoupper($_POST['emp_id']);
$password= $_POST['password'];
$dob= $_POST['dob'];
$gender= $_POST['gender'];
$contact= $_POST['contact'];
$email= $_POST['email'];
$status= $_POST['status'];
	
	
	$sql1 = "update employee set role_id = '".$role_id."',emp_id = '".$emp_id."',name='".$name."',password='".$password."',dob='".$dob."',gender='".$gender."',contact='".$contact."',email='".$email."',status='".$status."' where emp_id='".$emp_id."'";
	if(mysqli_query($db_con,$sql1))
	{
		echo "Successfully Inserted";
	}
			else
			{
		 		 echo "Insertion Failed";	
 			 }

	
?>