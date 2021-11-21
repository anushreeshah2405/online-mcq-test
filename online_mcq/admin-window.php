<?php
	include('conn/connection.php');
	
	checkuserAdmin();
?>

<html>
<head>
<title>ADMIN </title>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
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
float : left;

   
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
background-image : url("images/wood1.jpg");
background-repeat : no-repeat;
background-size : cover;
padding-left : 0px;
}



.div1 {
padding-left : 47px;
margin : 150px;
width : 950px ;
height : 450px ;
border : hidden;

}


.card {
margin : 10px ;
  position: relative;
 float: left;
  padding-bottom: 25%;
  width: 45%;
  /* text-align: center; */
 

}

.card__front,
.card__back {
  position: absolute;
  top: 95;
  left: 0;
  width: 100%;
  height: 120%;
  padding : 40px , 0;
  border-radius : 20px;

}
br{
clear : left ;
}

.card__front,
.card__back {
  
          backface-visibility: hidden;
          transition: transform 0.3s;
}

.card__front {
  background: rgba(255,255,255,0.3);

 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 2px 20px 0 rgba(0, 0, 0, 0.19);

}

.card__back {
   background: rgba(255,255,255,0.3);
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 2px 20px 0 rgba(0, 0, 0, 0.19);
          transform: rotateY(-180deg);
}
.card.effect__hover:hover .card__front {
  
          transform: rotateY(-180deg);
}

.card.effect__hover:hover .card__back {
  
          transform: rotateY(0);
}
a:link {
    color: white;
    background-color: transparent;
    text-decoration: none;
line-height : 180% ;

}
a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}


.dropbtn {
    background-color: #503048;
   ;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;

    display: inline-block;
}

.dropdown-content {
 
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    background-color: #f9f9f9;
    padding: 12px 16px;
    text-decoration: none;
    position: relative;
   right:10px;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;

    position: absolute;
    right: 10px;
}
.logoutsymbol
{
  position: relative;
  right: 10px;
}

</style>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
</head>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">HELLO ADMIN</font></li>

 <li style="float:right"><div class="dropdown"><button class="dropbtn">

</i><img class="logoutsymbol" src="images/logout.png " width="60" height="60">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</button>
<div class="dropdown-content">
 
    <a href="logout.php">LOG OUT</a>
    
  </div>
</div>

  </li>
</ul>

<center>
<div class = "div1">
<div class="card effect__hover">
  <div class="card__front">
   <br><br> <span class="card__text"><br><br><br><br><font size="7" face="verdana" color="DarkSlateGray">REGISTRATION</font></span>
  </div>
  <div class="card__back">
    <span class="card__text"><br><br><font face="verdana" color="white" size = "6">
<a href="reg-emp.php" target="_top">&nbsp;&#9755; ADD EMPLOYEE</a><br>
<a href="reg-stud.php" target="_top">&#9755; ADD STUDENT</a><br>
<a href="reg-sub.php" target="_top">&#9755; ADD SUBJECT</a><br>
</font></span>
  </div>
</div>



<div class="card effect__hover">
  <div class="card__front">
   <br><br> <span class="card__text"><br><br><br><br><font face="verdana" color="DarkSlateGray" size = "7">MANAGE</font></span>
  </div>
  <div class="card__back">

    <span class="card__text"><br><font face="verdana" color="white" size = "6">
	<a href="subject_manage.php" target="_top">&nbsp;&#9755; SET EXAMINATION</a>
<br><a href="employee_list.php" target="_top">&nbsp;&#9755; EMPLOYEE LIST</a><br>
<a href="student_list.php" target="_top">&#9755; STUDENT LIST</a><br>
<a href="subject_list.php" target="_top">&#9755; SUBJECT LIST</a><br>
<!--
<a href="C:\Anushree\project\GUI\admin-update.html" target="_top">&#9755; USER UPDATE</a><br>
<font face="verdana" color="white" size = "6">
<a href="http://www.w3schools.com/html/">&#9755; SUBJECT UPDATE</a><br>
-->
<br>

</font></span>
  </div>
</div>
<!--
<div class="card effect__hover">
  <div class="card__front">
    <span class="card__text"><br><br><font face="verdana" color="DarkSlateGray" size = "7">SCHEDULE</font></span>
  </div>
  <div class="card__back">
    <span class="card__text"><br><br><font face="verdana" color="white" size = "7">VIEW RECORDS</font></span>
  </div>
</div>

<div class="card effect__hover">
  <div class="card__front">
    <span class="card__text"><br><br><font face="verdana" color="DarkSlateGray" size = "7">ACTIVITY LOG</font></span>
  </div>
  <div class="card__back">
    <span class="card__text"><br><br><font face="verdana" color="white" size = "7">VIEW RECORDS</font></span>
  </div>
</div>
</div>

-->
</body>
</html>
