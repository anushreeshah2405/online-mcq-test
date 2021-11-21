<?php
	include('conn/connection.php');
	
	
	
	if(isset($_SESSION['otp_validation']))
	{
		$otp_validation	= $_SESSION['otp_validation'];		
	}
	else
	{
		$otp_validation ="";
	}
	
	
	
	checkuserStudent();
	if(isset($_SESSION['sub_code']))
	{
		$sql_chk_student	= " SELECT * FROM `student_answers` WHERE `student_id`='".$_SESSION['panel_user']['username']."' AND `subject_id`='".$_SESSION['sub_code']."' ";
		$res_chk_student	= mysqli_query($db_con, $sql_chk_student) or die(mysqli_error($db_con));
		$num_chk_student	= mysqli_num_rows($res_chk_student);
		
		if($num_chk_student == 0)
		{
			// Query For getting All the Info of the Student
			$sql_get_stu_info	= " SELECT * FROM `student` WHERE `enroll_no`='".$_SESSION['panel_user']['username']."' ";
			$res_get_stu_info	= mysqli_query($db_con, $sql_get_stu_info) or die(mysqli_error($db_con));
			$num_get_stu_info	= mysqli_num_rows($res_get_stu_info);
			
			$sql_get_sub_info	= " SELECT * FROM `sub_registration` WHERE `sub_code`='".$_SESSION['sub_code']."' ";
			$res_get_sub_info	= mysqli_query($db_con, $sql_get_sub_info) or die(mysqli_error($db_con));
			$num_get_sub_info	= mysqli_num_rows($res_get_sub_info);
			
			if($num_get_stu_info != 0 && $num_get_sub_info != 0)
			{
				$row_get_stu_info	= mysqli_fetch_array($res_get_stu_info);
				$row_get_sub_info	= mysqli_fetch_array($res_get_sub_info);
				
				$Student_name		= $row_get_stu_info['name'];
				$Student_enr		= $row_get_stu_info['enroll_no'];
				$Subject_code	    = $row_get_sub_info['sub_code'];
				$Subject_name	    = $row_get_sub_info['sub_name'];
			}
			else
			{
				echo 'No Data Found For the Respective Student';
				exit();		
			}	
		}
		else
		{
			echo 'Sorry, You have already done with this Exam.';
			exit();		
		}
	}
	else
	{
		echo 'Ooops, Something went wrong';
		exit();	
	}
?>
<!-- saved from url=(0045)file:///C:/Users/Student/Desktop/reg-emp.html -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>MCQ EXAMINATION</title>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript" src="js/nobackpress.js"></script>
<script type="text/javascript" src="js/jquery.countdown.js"></script>
<script>
var c=600;
        var t;
        //timedCount();

       /*function timedCount()
        {

            var hours = parseInt( c / 3600 ) % 24;
            var minutes = parseInt( c / 60 ) % 60;
            var seconds = c % 60;

            var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
            
            $('#timer').html(result);
            if(c == 0 )
            {
                //setConfirmUnload(false);
                document.forms["form1"].submit();
            }
            c = c - 1;
            t = setTimeout(function()
            {
             timedCount()
            },
            1000);
        }*/
</script>
<style>
body {
	background : url("images/wood1.jpg");
	background-size : 100% 100%;
	padding-left : 0px;
}
.div1 {
	width : 1050px;
	margin-top : 20px;
	margin-bottom : 160px;
	margin-left : 200px;
	background-color: #f2f2f2;
	padding: 40px;
}
.timer {
	font-size : 150%;
	margin-left: 900px;
	background-color: #503048;
	padding-right: 5px;
	padding-left: 5px;
	position : fixed;
	left : 410px;
	top : 60px;
}
header {
	padding-left: 1em;
	padding-right: 1em;
	padding-top: 1px;
	padding-bottom: 1px;
	color: white;
	background-color: #503048;
	clear: left;
	text-align: center;
}
footer {
	padding: 1em;
	color: white;
	background-color: #503048;
	text-align: center;
}
input[type=submit] {
	background-color: #4CAF50;
	width: 30%;
	border: none;
	color: white;
	padding-top: 15px;
	padding-bottom: 15px;
	padding-left: 25px;
	padding-right: 25px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 18px;
	margin-right: 5px;
	margin-left: 305px;
	cursor: pointer;
	float: right;
}
.button1 {
	background-color: #4CAF50;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	display: inline-block;
	font-size: 18px;
	margin-right: 4px;
	margin-left: 5px;
	cursor: pointer;
}
.button2 {
	background-color: #4CAF50;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 18px;
	margin-right: 4px;
	margin-left: 5px;
	cursor: pointer;
}
.button3 {
	background-color: #4CAF50;
	border: none;
	color: white;
	padding-top: 15px;
	padding-bottom: 15px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 18px;
	margin-right: 5px;
	margin-left: 305px;
	cursor: pointer;
}
h3 {
	font-family: verdana;
	text-align: left;
}
.review {
	margin-bottom: 10PX;
	font-family: verdana;
	text-align: left;
	margin-bottom: 1px;
	margin-top: -50px;
}
.dropbtn {
	background-color: #4CAF50;
	color: white;
	padding: 5px;
	font-size: 20px;
	border: none;
	cursor: pointer;
	margin-left: 990px;
}
.dropdown {
	position: relative;
	display: left;
}
.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}
.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}
.dropdown-content a:hover {
	background-color: #f1f1f1
}
.dropdown:hover .dropdown-content {
	display: block;
	margin-left: 641px;
}
.dropdown:hover .dropbtn {
	background-color: #3e8e41;
}
table, th, td {
	font-size: 20px;
}
</style>
</head>
<body>
<form id="form1" action="result.php" method="post">
    <div class="div1">
    	<div>
    		<header>
            	<img src="images/ss.png" style="width:180px; height:200px;  " align="left">
                <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997;  Student ID : <?php echo $Student_enr; ?></h3>
                <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Student Name :&nbsp
                <label><?php echo $Student_name; ?></label>
                </h3>
                <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Subject Id :&nbsp
                <label><?php echo $Subject_code; ?></label>
                </h3>
                <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Subject :&nbsp
                <label><?php echo $Subject_name; ?></label>
                </h3>
    		</header>
    		<div class="timer">
    			<h3 style="color:#FF0000 " align="left"> <span id='timer'></span> </h3>
    		</div>
            <br>
            <br>
    		<br>
  		</div>
  		<?php
  	
		$qts_num 	= 0;
		$qts_data	= '';
		// Query For Getting the Questions From the Table
		$sql_get_qts	= " SELECT * FROM `qb` WHERE subject_id='".$Subject_code."' ";
		$res_get_qts	= mysqli_query($db_con, $sql_get_qts) or die(mysqli_error($db_con));
		$num_get_qts	= mysqli_num_rows($res_get_qts);
		
		$no = 1;
		
		if($num_get_qts != 0)
		{
			while($row_get_qts = mysqli_fetch_array($res_get_qts))
			{
				
				//++$qts_num;
				$qts_data	.= '<div class=dropdown>';
					//$qts_data	.= '<button class=dropbtn>&#9776;</button>';	
					$qts_data	.= '<div class=dropdown-content>';
						$qts_data	.= '<textarea rows=10 cols=50 placeholder=Rough Work></textarea>';		
					$qts_data	.= '</div>';
				//$qts_data	.= '</div>';
					$qts_data	.= '<font size="3.5" face="verdana">';
						$qts_data	.= '<b> Q.'.$no.str_repeat('&nbsp;', 5).$row_get_qts['question'].'<br /><hr><b>';
						$qts_data   .='<input type="hidden" name ="qts_number" value="'.$row_get_qts['id'].'">';
					$qts_data	.= '</font>';
					$qts_data	.= '<h4><input type="radio" name="a'.$qts_num.'" value="a" />'.str_repeat('&nbsp;', 3).$row_get_qts['a'].'<br /></h4>';
					$qts_data	.= '<h4><input type="radio" name="a'.$qts_num.'" value="b" />'.str_repeat('&nbsp;', 3).$row_get_qts['b'].'<br /></h4>';
					$qts_data	.= '<h4><input type="radio" name="a'.$qts_num.'" value="c" />'.str_repeat('&nbsp;', 3).$row_get_qts['c'].'<br /></h4>';
					$qts_data	.= '<h4><input type="radio" name="a'.$qts_num.'" value="d" />'.str_repeat('&nbsp;', 3).$row_get_qts['d'].'<br /><br /><br /></h4>';
				$qts_data	.= '</div>';
				$qts_num++;
				$no++;
			}
			$qts_data	.= '<br>';
			$qts_data	.= str_repeat('&nbsp;', 40);
			$qts_data	.= '<input type=submit name=Submit value=Submit>';
			$qts_data	.= '<br><br>';
			echo $qts_data;
		}
		else
		{
			echo 'No Questions are Found';
			exit();
		}
?>
	</div>
</form>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			
	
		var fiveSeconds = "<?php echo $otp_validation; ?>"; 
		//alert(fiveSeconds);
		$('#timer').countdown(fiveSeconds, {elapse: true})
							.on('update.countdown', function(event) {
							  var $this = $(this); // if elapsed =
							  
							  if (event.elapsed) { //true
								$('#timer').css('display', 'none'); // hide the clock 
								document.forms["form1"].submit();
								//$('#getting-started1').css('display', 'block');// show the Resend link
								
								
								
							  } else { //false
								$(this).text(event.strftime('%H:%M:%S'));// initate the clock	
								//$('#getting-started1').css('display', 'none'); // hide the Resend link
								$('#timer').css('display', 'block'); // show the clock
							  }
							});
							});
	</script>
</body>
</html>
