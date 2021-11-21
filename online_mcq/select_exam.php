    <?php
	include('conn/connection.php');
	checkuserStudent();
?>
<html>
    <head>
	<title>SELECT EXAM</title>
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
    background-color: #f9f9f9;
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
    </head>
    <body>
        <ul>
        	<li><img src="images/mcq.png" width="80" height="80"></li>
          	<li><font size="7">SELECT EXAM</font></li>
			 <li style="float:right"><div class="dropdown"><button class="dropbtn"><i class="fa fa-cogs" style="font-size:45px;color:white;">
</i><img class="logoutsymbol" src="images/logout.png " width="60" height="60">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
<div class="dropdown-content">
 
    <a href="logout.php">LOG OUT</a>
        </ul>
        <div class = "div1">
			
        <div>
        <form id="myForm" name="myForm" method="post">
        	<font face="verdana" color="black" size = "4.5"><b>SUBJECT NAME</b></font><br>
            <select id="ddl_sub_name" name="ddl_sub_name" >
            	<?php
                	// Query For getting the Subject List which are active
					$sql_get_sub_list	= " SELECT * FROM `sub_registration` WHERE `status`='1' ";
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
            <button type="submit" name="reg_submit_add" class="button button1">Start Test</button>
        </div>
        <script type="text/javascript">
        	$('#myForm').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#myForm').valid())
				{
					var ddl_sub_name	= $('#ddl_sub_name').val();
					var redirect_to_instruction	= '1';
					$('input[name="reg_submit_add"]').attr('disabled', 'true');
					sendInfo		= {"ddl_sub_name":ddl_sub_name, "redirect_to_instruction":redirect_to_instruction};
					load_inst_page	= JSON.stringify(sendInfo);
					
					$.ajax({
						url: "conn/connection.php?",
						type: "POST",
						data: load_inst_page,
						contentType: "application/json; charset=utf-8",						
						success: function(response) 
						{
							data = JSON.parse(response);
							if(data.Success == "Success") 
							{
								window.location.assign("student-window.php?");
							} 
							else 
							{
								alert(data.resp);
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
			});
        </script>
    </body>
</html>

