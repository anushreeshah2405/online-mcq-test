<?php
  include('conn/connection.php');
  checkuserTeacher();
  
	$id = $_POST['update_id'];
	
	if($id != '')
	{
	
		$sql = "select * from qb where id = '".$id."'";
		$resul = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
		$result = mysqli_fetch_array($resul);
		$rv = $result['id'];
		$qw = $result['subject_id'];
		 if(strcmp($rv,$id) == 0)
		 {
			 $sql2 = "select * from qb where id = '".$id."'";
			$resul2 = mysqli_query($db_con,$sql2) or die(mysqli_error($db_con));
			$rowval = mysqli_fetch_array($resul2);
			
				$id = $rowval['id'];
				$emp_id= $rowval['teacher_id'];
				$subject_code= $rowval['subject_id'];
				$question= $rowval['question'];
				$a= $rowval['a'];
				$b= $rowval['b'];
				$c= $rowval['c'];
				$d= $rowval['d'];
				$correctans= $rowval['correctans'];
			
		 }
		 else
		 {
			 echo("Invalid ID");
				exit(0);
		 }
		
	}
	else
	{
		echo("Oops somethimg went wrong");
		exit(0);
	}
	
?>
<html>
<head>
<title>QUESTION UPDATE</title>
<style>
ul {
    
    position: fixed;
    left : 0;
    top: 0;
    width: 100%;
    list-style-type: none;
    margin: 0;
    padding-left: 10px;
padding-right : 10px;
padding-top : 10px;

   
   background: #503048;
opacity : 0.9;
 
}

li {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


body {
background : url("images/wood1.jpg") ;
background-size : 100% 100%;

padding-left : 0px;

}


.div1 {


width : 750px ;
margin-top : 200px ;
margin-bottom : 60px ;
margin-left : 350px;

    background-color: #f2f2f2;
    padding: 40px;


}

.br1 {
clear = left ;
}


input[type=text],select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
}


input[type=text].ans {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 10px;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
float : left ;
}



input[type=submit] , input[type=reset] {
float : right ;
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-left:  10px;
font-size : 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}





</style>
</head>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">EDIT QUESTION</font></li>

</ul>
<div class = "div1">

<div>
<form id="myForm" action="conn/api5.php" method="post">

<font face="verdana" color="black" size = "4.5"><b> Question ID </b></font><br>
    <input type="text" value="<?php echo $id;?>" name="id" readonly>
	
<font face="verdana" color="black" size = "4.5"> <b> Select Subject</b> </font> <br>

	
    <select id="subject" name="subject" value="<?php echo $subject_code;?> "  required>
      <?php
                	// Query For getting the Subject List which are active
					$sql_get_sub_list	= " SELECT * FROM `sub_registration` ";
					$res_get_sub_list	= mysqli_query($db_con, $sql_get_sub_list) or die(mysqli_error($db_con));
					$num_get_sub_list	= mysqli_num_rows($res_get_sub_list);
					
					if($num_get_sub_list != 0)
					{
						?>
						<option value="">Select The Subject</option>
                        <?php
						while($row_get_sub_list = mysqli_fetch_array($res_get_sub_list))
						{
							?>
							<option value="<?php echo $row_get_sub_list['sub_code']; ?>" >
                            	<?php echo ucwords($row_get_sub_list['sub_name']); ?>
                            </option>
							<?php	
						}
					}
					else
					{
						?>
						<option value="">No Data Found</option>
						<?php
					}
				?>
      <!--<option value="sc1102">CHEMISTRY</option>
      <option value="sc1103">PHYSICS</option>-->
    </select><br><br>
  <font face="verdana" color="black" size = "4.5"><b> Question </b></font><br>
    <input type="text" id="question" value="<?php echo $question;?>" name="question" required><br><br>

  <font face="verdana" color="black" size = "4.5"><b> Options </b></font><br>
    <input type="text" class="ans" name="a" value="<?php echo $a;?>" placeholder="Option A" required>
  <input type="text" class="ans" name="b" value="<?php echo $b;?>" placeholder="Option B" required>
    <br class="br1"><br class="br1">

    <input type="text" class="ans" name="c" value="<?php echo $c;?>" placeholder="Option C" required>
  <input type="text" class="ans" name="d" value="<?php echo $d;?>" placeholder="Option D" required><br class="br1"><br class="br1"><br class="br1"><br class="br1"><br class="br1"><br class="br1">
 <font face="verdana" color="black" size = "4.5"><b>Correct Option </b></font> <br>
    <select id="correctans" name="correctans" value="<?php echo $correctans;?>" required>
      <option value="a" <?php if($correctans == 'a' ){?>selected<?php }?> >Option A</option>
      <option value="b" <?php if($correctans == 'b' ){?>selected<?php }?>>Option B</option>
      <option value="c" <?php if($correctans == 'c' ){?>selected<?php }?>>Option C</option>
      <option value="d" <?php if($correctans == 'd' ){?>selected<?php }?>>Option D</option>
    </select><br><br>

 
  
<!--<input type="reset" value="NEXT">-->
 <input type="submit" name="sub" id="sub" value="SAVE">

<br>
  </form>
</div>
</div>


</body>
</html>