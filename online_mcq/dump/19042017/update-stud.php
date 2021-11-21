<?php
   	include('conn/connection.php');
	checkuserAdmin();
	
	$enroll = strtoupper($_POST['update_id']);
	if($enroll != '')
	{
		$sql = "select enroll_no from student where enroll_no = '".$enroll."'";
		$sql1 = "select * from student";
		$res = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
		$res1 = mysqli_query($db_con,$sql1) or die(mysqli_error($db_con));
		$row_val = mysqli_fetch_array($res);
		$rv = $row_val['enroll_no'];
		
		if(strcmp($rv,$enroll) == 0)
		{
			$sql2 = "select * from student where enroll_no = '".$enroll."'";
			$res2 = mysqli_query($db_con,$sql2) or die(mysqli_error($db_con));
			while($rowval = mysqli_fetch_array($res2))
			{
				$semester_id= $rowval['semester_id'];
				$enroll= $rowval['enroll_no'];
				$name= $rowval['name'];
				$password= $rowval['password'];
				$dob= $rowval['dob'];
				$gender= $rowval['gender'];
				$contact= $rowval['contact'];
				$email= $rowval['email'];
			}
		}
		else
		{
			echo('Enter valid Employee ID');
			exit(0);
			
		}
	
	}
	else
		{
			echo('Oops Something went wrong');
			exit(0);
			
		
	}
		
?>
<html>
<head>
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
 padding-bottom: 80px;

}
input[type=text],input[type=date],input[type=number],input[type=email],input[type=password],select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
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

input[type=sub]:hover {
    background-color: #45a049;
}

.button {
    background-color: #4CAF50;
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-style: "verdana";
    font-size: 14px;
    cursor: pointer;
}
.button1
{
   float:left;
   margin-left:500px;
}
.button2
{
   float:right;
   margin: 0px;
}
</style>
<title>EDIT STUDENT</title>
</head>
<body>

<ul>
  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">EDIT STUDENT</font></li>
</ul>
<div class = "div1">
<div>
<form id="myForm" action="conn/api4.php" method="post">
<font face="verdana" color="black" size = "4.5"><b>Enrollment No:</font></b><input type="text" name="enroll" value="<?php echo $enroll;?>" required><br />

<font face="verdana" color="black" size = "4.5"><b>Semester No:</font> </b>
<select name="sem" value="<?php echo $semester_id;?>" required>
<option value="1" <?php if($semester_id=='1' ){?>selected<?php }?>>FIRST</option>
<option value="2" <?php if($semester_id=='2' ){?>selected<?php }?>>SECOND</option>
<option value="3" <?php if($semester_id=='3' ){?>selected<?php }?>>THIRD</option>
<option value="4" <?php if($semester_id=='4' ){?>selected<?php }?>>FORTH</option>
<option value="5" <?php if($semester_id=='5' ){?>selected<?php }?>>FIFTH</option>
<option value="6" <?php if($semester_id=='6' ){?>selected<?php }?>>SIXTH</option>
</select><br />
<font face="verdana" color="black" size = "4.5"><b>Password</b> </font> <br>
    <input type="password" value="<?php echo $password;?>" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required onchange='check_pass();' placeholder="&#9919;"><br>

 <font face="verdana" color="black" size = "4.5"><b>Re-enter Password</b> </font> <br>
    <input type="password" name="repass" value="<?php echo $password;?>" id="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="&#9919;" pattern=".{10,}" title="10 or more characters" onchange='check_pass();' required><br>
  
<font face="verdana" color="black" size = "4.5"><b>Name:</font></b>
 <input type="text" name="name" value="<?php echo $name;?>" required><br />

<font face="verdana" color="black" size = "4.5"><b>Date of Birth: </font></b>
<input type="date" name="dob" value="<?php echo $dob;?>" required><br />
<font face="verdana" color="black" size = "4.5" ><b>Gender: <select name="gender">
<!--<option>&#9893;</option>-->
<?php echo $gender; ?>
<option value="M" <?php if($gender=='M' ){?>selected<?php }?>>MALE</option>
<option value="F" <?php if($gender=='F' ){?>selected<?php }?>>FEMALE</option>
</select><br />
<font face="verdana" color="black" size = "4.5"><b>Contact No:</font></b> <input type="text" value="<?php echo $contact;?>" name="contact" pattern="[0-9]{1}[0-9]{9}" title="Please enter a valid Contact Number" placeholder="&#9742"; required><br />
<font face="verdana" color="black" size = "4.5"><b>Email Address:</font></b> <input type="email" name="email" value="<?php echo $email;?>" placeholder="&#9993;" required><br />
<input type = "submit" id="sub" name="sub" value= "UPDATE"></input>
<!--<button class="button button2" id="reset" name="reset" onclick="myFunction()">RESET</button>-->
</form>

<span id="result"></span>
 
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="js/my_script.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>