<?php
	include('conn/connection.php');
	
	checkuserAdmin();
	
?>
<html>
<head>


<title>MANAGE SUBJECT</title>

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
margin-top : 250px ;
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


input[type=submit] , input[type=reset]{ 
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


input[type=radio] {
/*float : left ;*/
        background-color: #4CAF50;
    color: black;
       /*margin-left:  10px; */
font-size : 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    height: 20px;
    margin-right: 10;
    margin-left: 30;
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
  <li><font size="7">SUBJECT MANAGEMENT</font></li>
</ul>
<div class = "div1">
<div>
  <form id="manage_sub" action="conn/api8.php" method="post">
  <font face="verdana" color="black" size = "4.5"> <b> Subject :</b> </font> <br>
    <select id="sem" name="sem">
		<?php
                	// Query For getting the Subject List which are active
					$sql_get_sub_list	= " SELECT * FROM `sub_registration` ";
					$res_get_sub_list	= mysqli_query($db_con, $sql_get_sub_list) or die(mysqli_error($db_con));
					$num_get_sub_list	= mysqli_num_rows($res_get_sub_list);
					
					if($num_get_sub_list != 0)
					{
						?>
						<option value=" ">Select The Subject</option>
                        <?php
						while($row_get_sub_list = mysqli_fetch_array($res_get_sub_list))
						{
							?>
							<option value="<?php echo $row_get_sub_list['sub_code']; ?>">
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
     
    </select>
     <br><br>
  <font face="verdana" color="black" size = "4.5"><b> Status :</b></font>
    <input type="radio" name="status" value="1" checked><font face="verdana" color="black" size = "4.5">ACTIVE</font></input>&nbsp;&nbsp;&nbsp;&nbsp;
   
    <input type="radio" name="status" value="0"><font face="verdana" color="black" size = "4.5">INACTIVE</font><br><br>
	
 <br><br>


<!--<input type="reset" value="RESET">-->
<input type = "submit" id="sub" name="sub" value= "SUBMIT"></input>
<br>
<br>
  </form>
</div>
</div>
</body>
</html>