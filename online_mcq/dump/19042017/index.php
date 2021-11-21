<?php
   	include('conn/connection.php');
	
	if(isset($_SESSION['panel_user']['username']))
	{
		$role_id	= '';
		if(isset($_SESSION['panel_user']['role_id']))
		{
			$role_id	= $_SESSION['panel_user']['role_id'];
		}
		
		if($role_id == '1')
		{
			header('Location: admin-window.php'); 
		}
		elseif($role_id == '2')
		{
			header('Location: teacher-window.php');
		}
		elseif($role_id == '4')
		{
			header('Location: student-window.php');
		}
	}
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery-1.8.3.js"></script> 
    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
	 <script type="text/javascript" src="js/refresh.js"></script>
	<title>LOGIN</title>
	<style>
		body {
		background-image : url("images/wood1.jpg");
		height:450px;
		background-size : cover;
		//background-color : #e6f3ff ;
		padding-right : 100px ;
		padding-left : 100px ;
		padding-top : 75px ;
		padding-bottom : 75px ;
		
		}
		
		.div1 {
			
		padding-top : 30px;
		//border:1px solid black;
		float : left ;
		width : 600px ;
		height : 500px;
		background-color : opaque ;
		}
		
		.div2 {
		padding-top : 30px ;
		margin-top : 30px;
		float : right ;
		width : 600px ;
		height : 500px ;
		border : none ;
		background-color : opaque;
		}
		
		input {
		background-color : white  ;
		padding : 12px 50px ;
		width : 85% ;
		outline : none ;
		margin : 18px 0 ;
		border : none ; 
		}
		input:focus {
		background-color : white ;
		color : black ;
		}
		.input1{
		background-color : white  ;
		padding : 12px 50px ;
		width : 85% ;
		outline : none ;
		margin : 18px 0 ;
		border : none ; 
		}
		.input1:focus {
		background-color : white ;
		color : black ;
		}
		
		.button {
		color : white ;
		background-color : #1e90ff ;
		border : none ;
		outline : none ;
		border-radius : 5px ;
		
		height : 45px ;
		width : 200px;
		}
		fieldset {
		width : 450px;
		height : 300px;
		
		padding : 60px 20px;
		background-color : #333333 ;
		border : hidden ;
		}
		img {
			float: left;
		}
		p
		{
		clear : left ;
		}
		
		.img{
		 position : absolute;
		 left: 145px;
		 top: 152px;
		 z-index: -1;
		} 
		.img2{
		 position : absolute;
		 left:187px;
		 top: 175px;
		 z-index: 1;
		}
    </style>
</head>
<body>
    <div class = "div1">
<img src="images/17-55-14-screen-1315650_960_720.png" width="535" height="550"class="img" />
<img src="images/abhishek.gif" width="451" height="355" class="img2" />
</div>
        <div class = "div2" style="width:50%;">
            <div>
                <div style="width:100%; float:left;">
                    <img src="images/mcq.png" style="width: 13.5%;" >
                    <span style="font-size:60px;color:#FFF;font-family:Verdana;">Welcome!</span>
                </div>
                <div style="clear:both;"></div>
                <div style="width:100%;">
                    <fieldset>
                        <center>
                            <form method='post' class='form-validate' id="frm_login">
                                <select class="input1" id="ddl_roll_id" name="ddl_roll_id">
                                    <option value="">Select User Type</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Teacher</option>
                                    <!--  <option value="3">Superviser</option> -->
                                    <option value="4">Student</option>
                                </select>
                                <input type = "text" name="username" placeholder = "User ID" >
                                <input type = "password" name="password" placeholder = "Password" >
                                <br>
                                <input type="submit" value="LOGIN" class = 'btn btn-primary' onClick="clientside_validate();" style="color : white;background-color : #1e90ff ;border : none ;outline : none ;border-radius : 5px ;height : 45px ;width : 200px;">
                            </form>
                        </center>
                    </fieldset>    	
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
	<script type="text/javascript">
    	function clientside_validate()
		{
			$('#frm_login').on('submit', function(e) 
			{
				e.preventDefault();
				if ($('#frm_login').valid())
				{
					var emailid		= $.trim($('input[name="username"]').val());
					var password 	= $.trim($('input[name="password"]').val());
					//alert(username+'###'+password);
					//return false;
					var ddl_roll_id	= $('#ddl_roll_id').val();	
					
					if(ddl_roll_id == '')
					{
						alert('Plz select user type');
						return false;
					}
					else
					{
						$.post(location.href,{emailid:emailid,password:password,ddl_roll_id:ddl_roll_id,jsubmit:'SiteLogin'},function(data){
						//alert(location.href);
						if (data.length > 0) 
						{
							alert(data);
						} 
						else 
						{
							//location.replace(location.href);
							if(ddl_roll_id == '1')
							{
								location.href = 'admin-window.php';
							}
							else if(ddl_roll_id == '2')
							{
								location.href = 'teacher-window.php';
							}
							else if(ddl_roll_id == '3')
							{
								location.href = '';	
							}
							else if(ddl_roll_id == '4')
							{
								location.href = 'select_exam.php';	
							}
						}
						return false;
					});
					}
				}				
			});
		}
    </script>
</body>
</html>