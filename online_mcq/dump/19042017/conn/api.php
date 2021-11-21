<?php
 		include('connection.php');

		$emptype = $_POST['role_id'];
		$empid = strtoupper($_POST['emp_id']);
		$password = $_POST['password'];
		$repass = $_POST['repass'];
		$name = ucwords($_POST['name']);
		$date = $_POST['dob'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		if($password=== $repass)
			 {
				 
				 if($emptype == '1')
				{
					$tbl_name	= 'tbl_login_admin';	
				}
				elseif($emptype == '2')
				{
					$tbl_name	= 'tbl_login_teacher';
				}
     			$sql = "INSERT INTO employee (role_id,emp_id,password,name,dob,gender,contact,email)VALUES('".$emptype."', '".$empid."','".$password."','".$name."','".$date."','".$gender."','".$contact."','".$email."')";
				$sql1= "INSERT INTO ".$tbl_name." (role_id,username,password)VALUES('".$emptype."','".$empid."', '".$password."')";
					if(mysqli_query($db_con,$sql)&& mysqli_query($db_con,$sql1))
					{
					echo "Successfully Inserted";
					}
					else
					{
		 		 echo "Insertion Failed";	
				}
			 }

		else
		{
			 echo "<script type='text/javascript'>alert('Oops! Password did not match! Try again.')</script>";
		} 
?>