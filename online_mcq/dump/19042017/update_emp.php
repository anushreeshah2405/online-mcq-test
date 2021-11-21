<?php
   	include('conn/connection.php');
	checkuserAdmin(); 
	
	
	$emp_id = strtoupper($_POST['update_id']);
	$roleID	= '';
	if($emp_id != '')
	{
	$sql1 = "select * from employee where emp_id = '".$emp_id."' ";
	$res = mysqli_query($db_con,$sql1) or die(mysqli_error($db_con));

	$row_val = mysqli_fetch_array($res);
	
		$rv = $row_val['emp_id'];
		$roleID	= $row_val['role_id'];
		//exit(0);
	
	
		if(strcmp($rv,$emp_id) == 0)
		{
			$sql = "select * from employee where emp_id = '$emp_id'";
			$result = mysqli_query($db_con,$sql);
			while($rowval = mysqli_fetch_array($result))
			{
				$role_id= $rowval['role_id'];
				$emp_id= $rowval['emp_id'];
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
<title>Manage</title>
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

input[type=email],input[type=text],input[type=date],input[type=number],input[type=password],select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
}
.button {
	border-radius: 4px;
	width:30%;
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    text-align: center;
    display: inline-block;
    font-style: "verdana";
    font-size: 20px;
    cursor: pointer;
}
.button1
{
   float:left;
   margin-left:280px;
   margin-top: 20px;
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


</style>
</head>

    <script>
        function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('passowrd');
    var pass2 = document.getElementById('repass');
    //Store the Confimation Message Object ...
    var message = document.getElementById('check passwords');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the rowvalues in the password field 
    //and the confirmation field
    if(pass1.rowvalue == pass2.rowvalue){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
    </script>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">EDIT EMPLOYEE</font></li>

</ul>
<div class = "div1">
<div>
  <form id="myForm" method="post" action="conn/api3.php">
	
 <font face="verdana" color="black" size = "4.5"  > <b> Select Employee Type </b> </font> <br>
    <select name="role_id">
      <option value="1" <?php if($roleID=='1' ){?>selected<?php }?>>ADMIN</option>
      <option value="2" <?php if($roleID=='2' ){?>selected<?php }?>>TEACHER</option>
    <!--  <option rowvalue="3">SUPERVISOR</option> -->
    </select><br>

<font face="verdana" color="black" size = "4.5"><b> Employee ID </b></font><br>
    <input type="text" name="emp_id" value="<?php echo $emp_id;?>" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Password</b> </font> <br>
    <input type="password" value="<?php echo $password;?>" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required onchange='check_pass();' placeholder="&#9919;"><br>

 <font face="verdana" color="black" size = "4.5"><b>Re-enter Password</b> </font> <br>
    <input type="password" value="<?php echo $password;?>" name="repass" id="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="&#9919;" pattern=".{10,}" title="10 or more characters" onchange='check_pass();' required><br>
  

  <font face="verdana" color="black" size = "4.5" ><b>  Name</b> </font> <br>
    <input type="text" value="<?php echo $name;?>" name="name" pattern="[A-Za-z].{2,}" title="Name must be Alphanumeric" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Date Of Birth </b></font> <br>
    <input type="date" name="dob" value="<?php echo $dob;?>" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Gender </b></font> <br>
     <select name="gender" required>
      <option value="M" <?php if($gender=='M' ){?>selected<?php }?>>MALE</option>
      <option value="F" <?php if($gender=='F' ){?>selected<?php }?>>FEMALE</option>
    
    </select><br><br>


 <font face="verdana" color="black" size = "4.5"><b> Contact No.</b> </font> <br>
    <input type="text" name="contact" value="<?php echo $contact;?>" pattern="[0-9]{1}[0-9]{9}" title="Please enter a valid Contact Number" required placeholder="&#9742;"><br>

 <font face="verdana" color="black" size = "4.5"><b>Email Address</b> </font> <br>
    <input type="email" name="email" value="<?php echo $email;?>" required placeholder="&#9993;"><br>
	   <input type="radio" name="status" value="1" checked><font face="verdana" color="black" size = "4.5">ENABLE</font></input>&nbsp;&nbsp;&nbsp;&nbsp;
   
    <input type="radio" name="status" value="0"><font face="verdana" color="black" size = "4.5">DISABLE</font><br><br>

<input type = "submit" id="sub" name="sub" value= "UPDATE"></input>
<!--<button class="button button2" id="res" name="res">RESET</button>-->

  </form>

<span id="result"></span>
 
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="js/my_script.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>