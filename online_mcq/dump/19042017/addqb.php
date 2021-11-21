<?php
 		include('conn/connection.php');
        
		$subject = strtoupper($_POST['subject']);
		$question = $_POST['question'];
		$A = $_POST['a'];
		$B = $_POST['b'];
		$C = $_POST['c'];
		$D = $_POST['d'];
		$correctans = $_POST['correctans'];
		
		if($subject !='' || $question !='' || $A !='' || $B !='' || $C !='' || $D !='' || $correctans !='')
		{
			$sql = "INSERT INTO qb (subject_id,question,a,b,c,d,correctans)VALUES('".$subject."', '".$question."','".$A."','".$B."','".$C."','".$D."','".$correctans."')";
			if(mysqli_query($db_con,$sql))
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
			echo("Insert all the fields");
			exit(0);
		}
		
?>