<?php
	include('conn/connection.php');
	
	checkuserTeacher();
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
padding : 40px,0;
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


a:link.asd {
    color: white;
    background-color: transparent;
    text-decoration: none;
line-height : 50% ;
}
a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}


.dropbtn {
    background-color: #503048;
   
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
    position: absolute;
    right: 10px;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
    position: absolute;
    right: 10px;
}


</style>
<TITLE>TEACHER</TITLE>
</head>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">HELLO TEACHER</font></li>

 <li style="float:right"><div class="dropdown"><button class="dropbtn"><i class="fa fa-cogs" style="font-size:45px;color:white;">
</i><img class="logoutsymbol" src="images/logout.png " width="60" height="60">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
    <span class="card__text"><br><br><br><br><br><br><font size="7" face="verdana" color="DarkSlateGray">QUESTIONS</font></span>
  </div>
  <div class="card__back">
    <span class="card__text"><br><br><font face="verdana" color="white" size = "6"> <br>
<a href="teacher-add.php" target="_top">&nbsp;&#9755; CREATE QUESTIONS</a>
<a href="question_list.php" target="_top">&nbsp;&#9755; UPDATE QUESTIONS</a>
<!--<a href="C:\Anushree\project\GUI\teacher-update.html" target="_top">&#9755; UPDATE</a><br>
<a href="C:\Anushree\project\GUI\sp-question.html" target="_top">&#9755; VIEW LIST</a><br> -->
</font></span>
  </div>
</div>



<div class="card effect__hover">
  <div class="card__front">
    <span class="card__text"><br><br><BR><BR><br><br><font face="verdana" color="DarkSlateGray" size = "7">RESULTS</font></span>
  </div>
  <div class="card__back">

    <span class="card__text"><br><font face="verdana" color="white" size = "6"><br><br>

<a href="result_subject.php">&#9755; VIEW RESULT LIST </a>&nbsp;&nbsp;

</font></span>
  </div>
</div>




</body>
</html>
