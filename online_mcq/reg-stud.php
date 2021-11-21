<?php
	include('conn/connection.php');
	checkuserAdmin();
?>
<html>
<head>
<title>STUDENT REGISTRATION</title>
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
</head>
<body>
<ul>
  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">STUDENT REGISTRATION</font></li>
</ul>
<div class = "div1">
<div>
<form id="myForm" action="conn/Insertreg.php" method="post">
<font face="verdana" color="black" size = "4.5"><b>Enrollment No:</font></b><input type="text" name="enroll" required /><br />

<font face="verdana" color="black" size = "4.5" required ><b>Semester No:</font> </b><select name="sem">
<option value="1">FIRST</option>
<option value="2">SECOND</option>
<option value="3">THIRD</option>
<option value="4">FORTH</option>
<option value="5">FIFTH</option>
<option value="6">SIXTH</option>
</select><br />
<font face="verdana" color="black" size = "4.5"><b>Password</b> </font> <br>
    <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required onchange='check_pass();' placeholder="&#9919;" required ><br>

 <font face="verdana" color="black" size = "4.5"><b>Re-enter Password</b> </font> <br>
    <input type="password" name="repass" id="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="&#9919;" pattern=".{10,}" title="10 or more characters" onchange='check_pass();' required><br>
  
<font face="verdana" color="black" size = "4.5"><b>Name:</font></b>
 <input type="text" name="name" required /><br />

<font face="verdana" color="black" size = "4.5" required><b>Date of Birth: </font></b>
<input type="date" name="date" required /><br />
<font face="verdana" color="black" size = "4.5" ><b>Gender: <select name="gender" required>
<!--<option>&#9893;</option>-->
<option value="M">MALE</option>
<option value="F">FEMALE</option>
</select><br />
<font face="verdana" color="black" size = "4.5"><b>Contact No:</font></b> <input type="text" name="contact" pattern="[0-9]{1}[0-9]{9}" title="Please enter a valid Contact Number" placeholder="&#9742"; required /><br />
<font face="verdana" color="black" size = "4.5"><b>Email Address:</font></b> <input type="email" name="email" placeholder="&#9993;" /><br />
<input type = "submit" id="sub" name="sub" value= "SUBMIT"></input>
<!--<button class="button button2" id="reset" name="reset" onclick="myFunction()">RESET</button>-->
</form>

<span id="result"></span>
 
<script src="script/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="script/my_script.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>