<?php
	
	include('connection.php');
	
	$id=$_POST['id'];
$question= ucfirst($_POST['question']);
$a= $_POST['a'];
$b= $_POST['b'];
$c= $_POST['c'];
$d= $_POST['d'];
$correctans= $_POST['correctans'];
	
	
	$sql1 = "update qb set question='$question',a='$a',b='$b',c='$c',d='$d',correctans='$correctans' where id='$id'";
	if(mysqli_query($db_con,$sql1))
	{
		echo "Successfully Inserted";
	}
			else
			{
		 		 echo "Insertion Failed";	
 			 }

	
?>