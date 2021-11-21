<?php
	
	include('connection.php');

	
	$stat = $_POST['status'];
	$sub  = $_POST['sem'];
	
	if($sub != " ")
	{
		$sql1			 = "SELECT * from `sub_registration` WHERE `sub_code`='".$sub."'";
		$res_update_stat = mysqli_query($db_con,$sql1) or die(mysqli_error($db_con));
		$db_row_code = mysqli_fetch_array($res_update_stat);
		$row_code = $db_row_code['sub_code'];

		if(strcmp($row_code,$sub) == 0)
		{
			$sql_update_status  = "UPDATE `sub_registration` SET `status`='".$stat."' WHERE `sub_code`='".$sub."'";
			$res_update_status 	= mysqli_query($db_con,$sql_update_status) or die(mysqli_error($db_con));
			echo('Status Updated');
			exit(0);
		}
		else
		{
			echo('Oops Something went wrong');
			exit(0);
		}
	}
	else
	{
		echo('Oops Something went wrong');
		exit(0);
	}
?>