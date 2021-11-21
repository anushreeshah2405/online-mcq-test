<?php
	include('connection.php');

	$name = ucwords($_POST['name']);
$enroll= strtoupper($_POST['enroll']);
$password= $_POST['password'];
$dob= $_POST['dob'];
$gender= $_POST['gender'];
$contact= $_POST['contact'];
$email= $_POST['email'];
$sem = $_POST['sem'];
	
	
	$sql1 = "update student set enroll_no = '".$enroll."',semester_id='".$sem."',name='".$name."',password='".$password."',dob='".$dob."',gender='".$gender."',contact='".$contact."',email='".$email."' where enroll_no='".$enroll."'";
	if(mysqli_query($db_con,$sql1))
	{
		echo "Successfully Inserted";
	}
			else
			{
		 		 echo "Insertion Failed";	
 			 }

	
?>