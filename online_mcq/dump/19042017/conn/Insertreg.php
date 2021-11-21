<?php

 		include_once('connection.php');
		
		$enroll = strtoupper($_POST['enroll']);
		$sem = $_POST['sem'];
		$password = $_POST['password'];
		$repass = $_POST['repass'];
		$name = ucwords($_POST['name']);
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		
		
		
		if ($password=== $repass)
			 {
     			$sql = "INSERT INTO student (enroll_no,semester_id,password,name,dob,gender,contact,email)VALUES('".$enroll."', '".$sem."','".$password."','".$name."','".$date."','".$gender."','".$contact."','".$email."')";
				$sql1= "INSERT INTO tbl_login_student (username,password)VALUES('".$enroll."','".$password."')";
					if(mysqli_query($db_con,$sql)&& mysqli_query($db_con,$sql1))
					echo "Successfully Inserted";
					else
		 		 echo "Insertion Failed";	
 			 }

		else
		{
			 echo "<script type='text/javascript'>alert('Oops! Password did not match! Try again.')</script>";
		} 
?>