<?php
	include('conn/connection.php');
	checkuserAdmin();
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
<title>EMPLOYEE REGISTRATION</title>
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
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
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
  <li><font size="7">EMPLOYEE REGISTRATION</font></li>

</ul>
<div class = "div1">
<div>
  <form id="myForm" action="conn/api.php" method="post">

 <font face="verdana" color="black" size = "4.5"> <b> Select Employee Type </b> </font> <br>
    <select name="role_id">
      <option value="1">ADMIN</option>
      <option value="2">TEACHER</option>
    <!--  <option value="3">SUPERVISOR</option> -->
    </select><br>

<font face="verdana" color="black" size = "4.5"><b> Employee ID </b></font><br>
    <input type="text" name="emp_id" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Password</b> </font> <br>
    <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required onchange='check_pass();' placeholder="&#9919;"><br>

 <font face="verdana" color="black" size = "4.5"><b>Re-enter Password</b> </font> <br>
    <input type="password" name="repass" id="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="&#9919;" pattern=".{10,}" title="10 or more characters" onchange='check_pass();' required><br>
  

  <font face="verdana" color="black" size = "4.5" ><b>  Name</b> </font> <br>
    <input type="text" name="name" pattern="[A-Za-z].{2,}" title="Name must be Alphanumeric" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Date Of Birth </b></font> <br>
    <input type="date" name="dob" required><br>

 <font face="verdana" color="black" size = "4.5"><b>Gender </b></font> <br>
     <select name="gender" required >
<!--<option>&#9893;</option>-->
      <option value="M">MALE</option>
      <option value="F">FEMALE</option>
    
    </select><br><br>


 <font face="verdana" color="black" size = "4.5"><b> Contact No.</b> </font> <br>
    <input type="text" name="contact" pattern="[0-9]{1}[0-9]{9}" title="Please enter a valid Contact Number" required placeholder="&#9742;"><br>

 <font face="verdana" color="black" size = "4.5"><b>Email Address</b> </font> <br>
    <input type="email" name="email" required placeholder="&#9993;"><br>

<input type = "submit" id="sub" name="sub" value= "SUBMIT"></input>
<!--<button class="button button2" id="res" name="res">RESET</button>-->

  </form>

<span id="result"></span>
 
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="js/my_script.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>