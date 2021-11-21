<?php
	include('conn/connection.php');
	checkuserAdmin();
	
	$sub_code = strtoupper($_POST['sub_c']);
	
	if($sub_code != '')
	{
		$sql = "SELECT * FROM sub_registration WHERE sub_code ='".$sub_code."'";
		$res = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
		$row_val = mysqli_fetch_array($res);
		$rv = $row_val['sub_code'];
		if(strcmp($rv,$sub_code) == 0)
		{
			$sql1 = "SELECT * FROM sub_registration WHERE sub_code ='".$sub_code."'";
			$res1 = mysqli_query($db_con,$sql) or die(mysqli_error($db_con));
			
			while($rowval = mysqli_fetch_array($res1))
			{
				
				$semester= $rowval['semester'];
				$sub_c= $rowval['sub_code'];
				$name= $rowval['sub_name'];
	
			}
		}
		else
		{
			echo('Enter valid Subject Code');
			exit(0);
			
		}
	}
	else
	{
		echo("Oops something went wrong");
		exit(0);
	}
?>
<html>
<head>


<title>SUBJECT EDIT</title>

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

input[type=checkbox] {

transform: scale(2);
    margin-right : 8px;
margin-left : 30px;
    display: inline-block;
    border: 1px solid black;
    box-sizing: border-box;
    font-size : 50px;
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
.button2
{
   float:right;
   margin: 0px;
   margin-top: 20px;
}



</style>
</head>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">SUBJECT EDIT</font></li>
</ul>
<div class = "div1">
<div>
  <form id="myform2" action="conn/api9.php" method="post">
  <font face="verdana" color="black" size = "4.5" required><b> Subject Code </b></font><br>
    <input type="text" maxlength="9" name="code" value="<?php echo $sub_c; ?>" required><br><br>
  <font face="verdana" color="black" size = "4.5" required><b> Subject Name</b> </font> <br>
    <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>
 <font face="verdana" color="black" size = "4.5"> <b> Semester </b> </font> <br>
    <select id="sem" name="sem" value="<?php echo $semester; ?>" required>
      <option value="1" <?php if($semester=='1' ){?>selected<?php }?>>FIRST</option>
      <option value="2" <?php if($semester=='2' ){?>selected<?php }?>>SECOND</option>
      <option value="3" <?php if($semester=='3' ){?>selected<?php }?>>THIRD</option>
      <option value="4" <?php if($semester=='4' ){?>selected<?php }?>>FOURTH</option>
      <option value="5" <?php if($semester=='5' ){?>selected<?php }?>>FIFTH</option>
      <option value="6" <?php if($semester=='6' ){?>selected<?php }?>>SIXTH</option>
    </select><br><br>
	
	  <font face="verdana" color="black" size = "4.5"><b> ADD/REMOVE :</b></font>
    <input type="radio" name="status" value="1" checked><font face="verdana" color="black" size = "4.5">ENABLE</font></input>&nbsp;&nbsp;&nbsp;&nbsp;
   
    <input type="radio" name="status" value="0"><font face="verdana" color="black" size = "4.5">DISABLE</font><br><br>


<!--<input type="reset" value="RESET">-->
<input type = "submit" id="sub" name="sub" value= "SUBMIT"></input>
<br>
<br>
  </form>
</div>
</div>

</body>
</html>