<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');

	$date 				= new DateTime(null, new DateTimeZone('Asia/Kolkata'));
	$datetime 			= $date->format('Y-m-d H:i:s');

	if($_SERVER['HTTP_HOST'] == "192.168.1.1") 
	{
		$dbname = "anssy";
		$dbuser = "root";
 		$dbpass = "root";
		//$dbpass = "";
		$BaseFolder	= 'localhost/online_mcq/';
	}
	
	$dbname = "anssy";
		$dbuser = "root";
 		$dbpass = "root";
		//$dbpass = "";
		$BaseFolder	= 'localhost/online_mcq/';
	
	$db_con = mysqli_connect("localhost",$dbuser, $dbpass) or die("Can not connect to Database");
	if($db_con)
	{
		mysqli_select_db($db_con,$dbname) or die(mysqli_error($db_con));
	}
	
	$date 				= new DateTime(null, new DateTimeZone('Asia/Kolkata'));
	$datetime 			= $date->format('Y-m-d H:i:s');	
	
	$json	= file_get_contents('php://input');
	$obj 	= json_decode($json);
	
	function checkuserAdmin()
	{
		if(!isset($_SESSION['panel_user']['username']))
		{
			header('Location: index.php');  
			exit();
		}
		else
		{
			$role_id	= '';
			if(isset($_SESSION['panel_user']['role_id']))
			{
				$role_id	= $_SESSION['panel_user']['role_id'];
			}
			
			if($role_id == '2' || $role_id == '4')
			{
				echo 'You Dont have any access of this Page...';
				exit();
			}
		}
	}
	
	function checkuserTeacher()
	{
		if(!isset($_SESSION['panel_user']['username']))
		{
			header('Location: index.php');  
			exit();
		}
		else
		{
			$role_id	= '';
			if(isset($_SESSION['panel_user']['role_id']))
			{
				$role_id	= $_SESSION['panel_user']['role_id'];
			}
			
			if($role_id == '1' || $role_id == '4')
			{
				echo 'You Dont have any access of this Page...';
				exit();
			}
		}
	}
	
	function checkuserStudent()
	{
		if(!isset($_SESSION['panel_user']['username']))
		{
			header('Location: index.php');  
			exit();
		}
		else
		{
			$role_id	= '';
			if(isset($_SESSION['panel_user']['role_id']))
			{
				$role_id	= $_SESSION['panel_user']['role_id'];
			}
			
			if($role_id == '1' || $role_id == '2')
			{
				echo 'You Dont have any access of this Page...';
				exit();
			}
		}
	}
	

	function generateRandomString($length) 
	{
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	if (isset($_POST['jsubmit']) && isset($_POST['emailid']) && isset($_POST['password']) && $_POST['jsubmit'] == "SiteLogin") 
	{
		$email 		= $_POST['emailid'];
		$password 	= $_POST['password'];
		$ddl_roll_id	= $_POST['ddl_roll_id'];
		
		if($ddl_roll_id == '1')
		{
			$tbl_name	= 'tbl_login_admin';	
		}
		elseif($ddl_roll_id == '2')
		{
			$tbl_name	= 'tbl_login_teacher';
		}
		elseif($ddl_roll_id == '3')
		{
			$tbl_name	= 'tbl_login_sv';
		}	
		elseif($ddl_roll_id == '4')
		{
			$tbl_name	= 'tbl_login_student';
		}
		
		$sql_login 		= "select * from ".$tbl_name." where `username` = '".addslashes($email)."' ";
		$result_login 	= mysqli_query($db_con,$sql_login) or die(mysqli_error($db_con));
		$num_rows_login = mysqli_num_rows($result_login);
		if ($num_rows_login != 0) 
		{
			$row_login = mysqli_fetch_array($result_login);
			$db_password = $row_login['password'];
			/*$salt_value = $row_login['salt_value'];
			$user_pass = md5($password.$salt_value);*/	
			if(strcmp($db_password,$password) == 0)
			{
				$_SESSION['panel_user'] = array();		
				$_SESSION['panel_user'] = $row_login;			
			}
			else
			{
				echo 'Password you entered does not match.If problem persist contact admin to resolve your query.';			
			}
		} 
		elseif ($num_rows_login == 0) 
		{
			echo 'Email you entered does not exist.If problem persist contact admin to resolve your query.';
		}
		exit(0);
	}
	else
	{
		$email = "";
		$password = "";	
	}
	
	if((isset($obj->redirect_to_instruction)) == '1' && (isset($obj->redirect_to_instruction)))
	{
		$response_array	= array();
		$ddl_sub_name	= $obj->ddl_sub_name;
		
		if($ddl_sub_name != '')
		{
			$_SESSION['sub_code']	= $ddl_sub_name;
			
			// Query For Checking the Student
			$sql_chk_student	= " SELECT * FROM `student_answers` WHERE `student_id`='".$_SESSION['panel_user']['username']."' AND `subject_id`='".$_SESSION['sub_code']."' ";
			$res_chk_student	= mysqli_query($db_con, $sql_chk_student) or die(mysqli_error($db_con));
			$num_chk_student	= mysqli_num_rows($res_chk_student);
			
			if($num_chk_student == 0)
			{
				$response_array	= array("Success"=>"Success", "resp"=>"Success");		
			}
			else
			{
				unset($_SESSION['sub_code']);
				$_SESSION['sub_code']='';
				$response_array	= array("Success"=>"fail", "resp"=>"Sorry, You have already done with this Exam.", "abc"=>$_SESSION['sub_code']);	
			}
		}
		else
		{
			unset($_SESSION['sub_code']);
			$_SESSION['sub_code']='';
			$response_array	= array("Success"=>"fail", "resp"=>"Ooops, Something went wrong", "abc"=>$_SESSION['sub_code']);
		}
		echo json_encode($response_array);
	}
	
	function otp_futureDate()
	{
		global $datetime;	
		
		$otp_date = $datetime;
		$otp_currentDate = strtotime($otp_date);
		$otp_futureDate = $otp_currentDate+(60*10);
		$_SESSION['otp_validation']	= date("Y/m/d H:i:s", $otp_futureDate);		
	}
	
	if((isset($obj->set_session_timer))== '1' && (isset($obj->set_session_timer)))
	{
		$response_array	= array();
		
		otp_futureDate();
		
		$response_array	= array("Success"=>"Success", "resp"=>"Success");
		
		echo json_encode($response_array);
	}
?>