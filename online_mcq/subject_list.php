<?php
	include('conn/connection.php');
	checkuserAdmin();
?>
<html>
<head>
<title>SUBJECT LIST</TITLE>
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
padding-right : 0px;
}


.div1 {


width : 750px ;
margin-top : 170px ;
margin-bottom : 60px ;
margin-left : 70px;
margin-left : 125px ;
 
    padding: 10px 10px ;


}


.div2 {

width : 350px ;


margin-left : 20px;
margin-right : 20px;
    background-color: #f2f2f2;
    padding : 20px 12px 22px 12px;
float : left;
border : 1px solid black ;
}





.div3 {
margin-left : 20px ;
margin-right : 20px ;
width : 350px ;
border : 1px solid black;
padding : 20px 0px 15px 20px;
float : left ;
}


.div6 {
position : fixed;
left : 70px ;
top : 100px ;

margin : 50px 70px 20px 70px ;
 background-color: #f2f2f2;
    padding : 20px 0px 20px 0px;


}



input[type=text],select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
float : left;
}


input[type=text].ans {
    width: 30%;
    padding: 12px 10px;
    margin: 8px 10px;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-size : 20px;
float : left ;
}



input[type=button] {

    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 12px 10px;
    margin-left:  10px;
margin-top : 8px;
font-size : 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
margin-right : 0px;
}

input[type=button]:hover {
    background-color: #45a049;
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



#question {
    font-family: "Trebuchet MS", Aria, Halvetica, sans-serif;
    border-collapse: collapse;
    }

#question td {
    border: 1px solid  #e6e6e6;
padding: 5px 5px 5px 5px;
line-height : 25px;
}

#question tr:nth-child(even){background-color: #f2f2f2;}
#question tr:nth-child(odd){background-color: white}
#question tr:hover {background-color: #ddd;}

#question th {
padding: 12px 12px 12px 12px;
   
border-bottom: 2px solid  #e6e6e6;
    text-align: left;
    background-color: #503048;
	
    color: white;

}


table {
table-layout : fixed;
width : 1200px;
}

</style>
</head>
<body>

<ul>

  <li><img src="images/mcq.png" width="80" height="80"></li>
  <li><font size="7">SUBJECT LIST</font></li>


</ul>


<!--

<div class="div6">
<div class = "div2">

 <font face="verdana" color="black" size = "4.5"><b>Select Subject</b></font> <br>
    <select id="-------" name="-----">
      <option value="1">MATHS</option>
      <option value="2">PHYSICS</option>
      <option value="3">BIOLOGY</option>
<option value="4">ENGLISH</option>
    </select>
</div>




<div class="div3">
    <font face="verdana" color="black" size = "4.5"><b>&nbsp;&nbsp;Enter Subject Code</b> </font><br><a href="C:\Anushree\project\GUI\.html" target="_top"><input type="text" class="ans"><input type="button" value="UPDATE"></a><br><br>
</div>

</div>


-->


<div class = "div1">

<div>
  <form id="My Form "action="update_sub.php" method="post">
  
  <input type="text" name="sub_c" placeholder="SUBJECT ID" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" value="UPDATE">
<br><br><br>

<?php 

$sql="SELECT id,sub_code,sub_name,semester,active FROM sub_registration";
$result=mysqli_query($db_con,$sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
         echo '<table id = "question">
<tr>
<th col width="50">Sr No</th>
<th>Subject Code</th>
<th col width="200">Subject Name</th>
<th>Semester</th>
<th>Enabled (1) / Disabled (0)</th>


</tr>';
$id_sub = 1;
while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
echo "<td>" . $id_sub . "</td>";
echo "<td>" . $row['sub_code'] . "</td>";
echo "<td>" . $row['sub_name'] . "</td>";
echo "<td>" . $row['semester'] . "</td>";
echo "<td>" . $row['active'] . "</td>";

echo "</tr>";
$id_sub++;
}
echo "</table>";
     }
else {
     echo "0 results";
}
?> 
 
  


  </form>
</div>
</div>


</body>
</html>