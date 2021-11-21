<?php
	include('conn/connection.php');
	checkuserTeacher();
?>
<html>
    <head>
	<TITLE>SELECT SUBJECT</TITLE>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script> 
    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
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
       float:right;
       margin-left:280px;
       margin-top: 20px;
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
    
    
    </style>
    </head>
    <body>
        <ul>
        	<li><img src="images/mcq.png" width="80" height="80"></li>
          	<li><font size="7">SELECT SUBJECT</font></li>
			
				</div>
			</div>

			</li>
        </ul>
        <div class = "div1">
			
        <div>
        <form id="myForm" name="myForm" method="post" action="result_list.php">
        	<font face="verdana" color="black" size = "4.5"><b>SUBJECT NAME</b></font><br>
            <select id="sub" name="sub" >
            	<?php
                	// Query For getting the Subject List which are active
					$sql_get_sub_list	= " SELECT * FROM `sub_registration`";
					$res_get_sub_list	= mysqli_query($db_con, $sql_get_sub_list) or die(mysqli_error($db_con));
					$num_get_sub_list	= mysqli_num_rows($res_get_sub_list);
					
					if($num_get_sub_list != 0)
					{
						?>
						<option value="">Select The Subject</option>
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
            <button type="submit" name="reg_submit_add" class="button button1">Show Result</button>
        </div>

    </body>
</html>

