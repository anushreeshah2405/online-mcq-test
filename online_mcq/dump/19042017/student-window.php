<?php
	//session_start();  
	include('conn/connection.php');
	
	checkuserStudent();
	
?>
<html>
<head>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script> 
    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
	 <script type="text/javascript" src="js/refresh.js"></script>
<title>STUDENT</TITLE>
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
	background : url("images/wood1.jpg");
	background-size : 100% 100%;
	padding-left : 0px;
}
input[type=submit] {
	width: 30%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
input[type=submit]:hover {
	background-color: #45a049;
}
.div1 {
	width : 950px;
	height: 500px;
	margin-top : 150px;
	margin-bottom : 60px;
	margin-left : 250px;
	background-color: #f2f2f2;
	padding: 30px;
	text-align: left;
}
header {
	padding: 1em;
	color: white;
	background-color: #503048;
	clear: left;
	text-align: center;
}
footer {
	padding: 1em;
	color: white;
	background-color: #503048;
	clear: left;
	text-align: center;
}
.button {
	background-color: #4caf50;
	color: white;
	padding-top: 10px;
	padding-right: 30px;
	padding-left: 30px;
	padding-bottom: 10px;
	text-align: center;
	font-size: 16px;
}
h1 {
	text-align: left;
	font-size: 16px;
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
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>
<body>
<ul>
  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">EXAM PANEL</font></li>
  <li style="float:right"><div class="dropdown"><button class="dropbtn"><i class="fa fa-cogs" style="font-size:45px;color:white;">
</i><i class="material-icons" style="font-size:45px;color:white;">arrow_drop_down</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
<div class="dropdown-content">
    
    <a href="logout.php">LOG OUT</a>
</ul>
<div class = "div1">
  <form  action="examination.php" method="post">	<!-- action="examination.php"  -->
    <font face="verdana" color="black" size = "4.5"><b>
    <header>INSTRUCTIONS</header >
    <br>
    <br>
    <h1>&#9758; The test being conducted is of <b>MCQ </b> type</h1>
    <h1>&#9758; Each question carries <b>1 mark</b>.</h1>
    <h1>&#9758; There is no negative marking for wrong answers.</h1>
    <h1>&#9758; The timer of <b>10 minutes</b> starts as soon as you click on the 'Start Test' button . </h1>
    <h1>&#9758; If timer ends, the test will be automatically submitted with the no. of questions attempted till then.</h1>
    <h1>&#9758;  DO NOT refresh the page.</h1>
    <h1>&#9758; The result will be displayed as soon as test ends. </h1>
    <h1>&#9758; All the best &#x1f44d;</h1>
    <br>
    <footer> <?php echo str_repeat('&nbsp;', 90); ?>
      <input type='submit' name='submit' onclick="setTimerSession();" value='START TEST'  />
    </footer>
    <?php
	//$_SESSION['sub']='submit';
	?>
  </form>
</div>
	<script type="text/javascript">
		function setTimerSession()
		{
			//alert('Hi');
			var sendInfo		= {"set_session_timer":1};
			var update_mob_num	= JSON.stringify(sendInfo);
			
			$.ajax({
				url: "conn/connection.php",
				type: "POST",
				data: update_mob_num,
				async:false,						
				contentType: "application/json; charset=utf-8",						
				success: function(response) 
				{
					data = JSON.parse(response);
					//ert(data.Success);
					if(data.Success == "Success") 
					{
						
						//ndow.location="http://localhost/online_mcq/examination.php";
						//ndow.location.assign("examination.php");
					} 
					else 
					{	
						
					}
				},
				error: function (request, status, error) 
				{
														
				},
				complete: function()
				{
				}
			});
		}
	</script>
</body>
</html>