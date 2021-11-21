<?php
	include('conn/connection.php');
	
	checkuserStudent();
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
	
?>
<!-- saved from url=(0045)file:///C:/Users/Student/Desktop/reg-emp.html -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>RESULT</title>
<style>
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
	float: right;
}

input[type=text].a1 {
	width: 50%;
	background-color: #503048;
	color: white;
	/*padding: 14px 20px;
	margin: 8px 0;*/
	border: none;
	font-size : 100%;
	font-weight: 700;
	letter-spacing: 2px;
	
}

input[type=text].a2 {
	width: 50%;
	background-color: white;
	color: red;
	/*padding: 14px 20px;
	margin: 8px 0;*/
	border: none;
	font-size : 100%;
	font-weight: 900;
	letter-spacing: 2px;
	
}


input[type=submit]:hover {
	background-color: #45a049;
}
.div1 {
	width : 1050px;
	margin-top : 70px;
	margin-bottom : 60px;
	margin-left : 190px;
	background-color: #f2f2f2;
	padding: 40px;
}
.div2 {
	margin-bottom : 30px;
	margin-top: -30px;
	margin-left : 80px;
	background-color: #f2f2f2;
	text-align: left;
	font-size: 140%;
}
header {
	padding-left: 1em;
	padding-right: 1em;
	padding-top: 1em;
	padding-bottom: 1em;
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
.button3 {
	background-color: #4CAF50;
	border: none;
	color: white;
	padding-left: 30px;
	padding-right: 30px;
	padding-top: 18px;
	padding-bottom: 18px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 18px;
	margin-left: 805px;
	cursor: pointer;
}
h3 {
	font-family: verdana;
	text-align: left;
}
h4 {
	font-family: verdana;
	text-align: right;
}
table, th, td {
	font-size: 20px;
}
#question {
	font-family: "Trebuchet MS", Aria, Halvetica, sans-serif;
	border-collapse: collapse;
}
#question td {
	border: 1px solid #e6e6e6;
	padding: 5px 5px 5px 5px;
	line-height : 25px;
}
#question tr:nth-child(even) {
	background-color: #f2f2f2;
}
#question tr:nth-child(odd) {
	background-color: white
}

#question th {
	padding: 12px 12px 12px 12px;
	border-bottom: 2px solid #e6e6e6;
	text-align: left;
	background-color: #503048;
	color: white;
}
table {
	table-layout : fixed;
	width : 1450px;
}
 	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>  
 	<h1 align="center" style="color:green">A countdown timer in jquery</h1>  
	<h3 style="color:#FF0000" align="center">  
		You will be logged out in : <span id='timer'></span>  
	</h3>
</style>
</head>
<body>
<form id="myform2" method="post" action="conn/api7.php">
    <div class="div1">
        <div>
            <header> <img src="images/ss.png" style="width:180px; height:200px;  " align="left">
            <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997;  Student ID :&nbsp
              <input type = "text" class="a1" value="<?php echo $Student_enr; ?>" name ="enroll" readonly></input>
            </h3>
            <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Student Name :&nbsp
              <input type = "text" class="a1" value="<?php echo $Student_name; ?>" name="s_name" readonly></input>
            </h3>
            <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Subject Id :&nbsp
              <input type = "text" class="a1" value="<?php echo $Subject_code; ?>" name="sub_c" readonly></input>
            </h3>
            <h3>&nbsp; &nbsp;&nbsp; &nbsp;&#9997; Subject :&nbsp
               <input type = "text" class="a1" value="<?php echo $Subject_name; ?>" name ="sub_n" readonly></input>
            </h3>
            </header>
            <br>
            <br>
            <div class="div2">
                <?php
                // Query For getting the Qts
                $sql_get_qts	= " SELECT * FROM `qb` WHERE subject_id='".$Subject_code."' ";
                $res_get_qts	= mysqli_query($db_con, $sql_get_qts) or die(mysqli_error($db_con));
				$num_get_qts	= mysqli_num_rows($res_get_qts);
                $qts_num = 0;
                $a = 0;
				$sql_chk_user	= " SELECT * FROM `student_answers` ";
				$sql_chk_user	.= " WHERE `student_id`='".$Student_enr."' ";
				$sql_chk_user	.= " 	AND `subject_id`='".$Subject_code."' ";
				$res_chk_user	= mysqli_query($db_con, $sql_chk_user) or die(mysqli_error($db_con));
				$num_chk_user	= mysqli_num_rows($res_chk_user);
				if($num_chk_user == 0)
				{
					while ($row = mysqli_fetch_array($res_get_qts))
					{  
						
						if(isset($_POST['a'.$qts_num.'']))
						{
							$a++;
							$answer = $_POST['a'.$qts_num.''];
							$qu 	= $row['id'];
							$sql 	= " INSERT INTO student_answers(student_id, subject_id, question_id, student_answers) ";
							$sql 	.= " VALUES('".$Student_enr."','".$Subject_code."','".$qu."','".$answer."') ";
							mysqli_query($db_con, $sql);
						}	
						
						$sql1  = " SELECT count(*) AS score ";
						$sql1 .= " FROM student_answers AS a INNER JOIN qb AS b ";
						$sql1 .= " ON a.question_id=b.id AND a.student_answers=b.correctans ";
						$sql1 .= " WHERE a.subject_id='".$Subject_code."' AND a.student_id='".$Student_enr."' ";
						
						$qwwe = mysqli_query($db_con, $sql1) or die(mysqli_error($db_con));
						$qts_num++;
						
						
					}
					$res_in = "INSERT into results (sub_code,enroll_no) VALUES('".$Subject_code."','".$Student_enr."')";
					$res_out = mysqli_query($db_con, $res_in) or die(mysqli_error($db_con));
				}
				else
				{
					$a			= $num_chk_user;
					$qts_num	= $num_get_qts;
					$sql1  		= " SELECT count(*) AS score ";
					$sql1 		.= " FROM student_answers AS a INNER JOIN qb AS b ";
					$sql1 		.= " ON a.question_id=b.id AND a.student_answers=b.correctans ";
					$sql1 		.= " WHERE a.subject_id='".$Subject_code."' AND a.student_id='".$Student_enr."' ";
					
					$qwwe = mysqli_query($db_con, $sql1) or die(mysqli_error($db_con));
				}
                echo "<br><br>" , str_repeat('&nbsp;', 50) ,"<font size= 5><b>  CONGRATULATIONS !</b></font>" ;
                
                echo '<br><br><br><table id = question style = width:100%>
                   <tr>
                    <td>TOTAL NO. OF QUESTIONS : </td>
                    <td align=LEFT>' .$qts_num. '</td>
                  </tr>  
                  <tr>
                    <td>NO. OF QUESTIONS ATTEMPTED : </td>
                    <td align=LEFT>'.$a. '</td>
                  </tr>
                  <tr>
                    <td>MARKS OBTAINED : </td>
                    <td align=LEFT><b><input type=text  name = mrks class= a2 font value= ' .$qwwe->fetch_object()->score. ' readonly></font></b></td>
                  </tr>
                </table>
                <br>
                <input type ="submit" name="sub" value="LOGOUT"></input>';
				
                ?>
            </div>
        </div>
	</div>
</form>
</body>
</html>
