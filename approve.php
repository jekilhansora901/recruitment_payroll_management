<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form method="GET">
<?php
session_start();
require 'connect.php';
if(isset($_POST['btn']))
{
	if(!empty($_POST['check_emp'])) {
    foreach($_POST['check_emp'] as $emp_id)
	{
		$query="select * from emp_personal_detail;";
		$result=mysql_query($query,$link);
		if($result)
		{
			$query1="UPDATE emp_personal_detail SET active_flag = 1 WHERE emp_personal_detail.emp_id ='$emp_id';";
			$result1 = mysql_query($query1,$link);
			
			$query1="select * from emp_personal_detail WHERE emp_personal_detail.emp_id ='$emp_id';";
			$result1 = mysql_query($query1,$link);
			$row = mysql_fetch_array($result1);
			if($result1)
			{
				//$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
				$email=$row['email'];
				$emp_code=$row['emp_code'];
				$ins="INSERT INTO leave_availed (sr_no, emp_code, cl_availed, pl_availed, medical_availed, half_day) VALUES (NULL, '$emp_code', '1', '30', '20', '0')";
				$result=mysql_query($ins,$link) or die(mysql_error());
				$ins_basic="INSERT INTO basic_sal_master (sr_no, emp_code, basic, set_flag) VALUES (NULL, '$emp_code', '0', '0');";
				$result=mysql_query($ins_basic,$link) or die(mysql_error());
				$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
				/*echo "<h2>Welcome, $empname</h2>";
				echo "<h3>Your Email Id : $email</h3>";
				echo "<h2>Your Emp_code : $emp_code</h2>";
				$emp_code=base64_encode($emp_code);
				echo "<input type=hidden name=empcode value=$emp_code>";
				echo "<a href='http://localhost/recruitment_payroll_management/empverification.php?empcode=$emp_code'>Click Here for verification and conform your account</a>";
				*/
				error_reporting(E_STRICT);
				date_default_timezone_set('America/Toronto');
				require_once('mail/class.phpmailer.php');
				//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

				$mail             = new PHPMailer();
				$body			  = "<h2>Welcome, $empname</h2>
										
										<h3>Your Email Id : $email</h3>
										<h2>Your Emp_code : $emp_code</h2>
										<input type=hidden name=empcode value=$emp_code>
										<a href='http://localhost/recruitment_payroll_management/empverification.php?empcode=$emp_code'>Click Here for verification and conform your account</a>";
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host       = "smtp.gmail.com"; // SMTP server
				$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
														   // 1 = errors and messages
														   // 2 = messages only
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
				$mail->Username   = "youremail901@gmail.com";  // GMAIL username
				$mail->Password   = "youremail";            // GMAIL password
				$mail->SetFrom('youremail901@gmail.com', 'Jekil Hansora');
				$mail->AddReplyTo("youremail901@gmail.com","Jekil Hansora");
				$mail->Subject    = "Conformination and Varification Employee Account";
				$mail->AltBody    = "Hello"; // optional, comment out and test
				$mail->MsgHTML($body);
				$address = "$email";
				$mail->AddAddress($address, "$email");
				
				if(!$mail->Send()) 
				{
					$msg = $msg."Sorry Mail was not send for some resones. :";
					$msg = $msg."<br>Mailer Error: "."$mail->ErrorInfo";
					$msg = $msg."<br><span id='deaemp'>But Employee is Approved So Please Inform the employee for his Verification</span>";
				} 
				else 
				{
					header("location:admin_emp_req_page.php");
				}
			}
			else
			{
				echo "Some Problem to Approving Employee";
			}
		}
		else
		{
		echo "Error to Retreive Employee Data.";
		}
	}
	}
	else
	{
		header("location:admin_emp_req_page.php");
	}
}
if(isset($_POST['cbtn']))
{
	if(!empty($_POST['check_emp'])) {
    foreach($_POST['check_emp'] as $emp_id)
	{
		$query="select * from emp_personal_detail where emp_id ='$emp_id';";
		$result=mysql_query($query,$link);
		$row=mysql_fetch_array($result);
		$photo=$row['emp_photo'];
		$del="Delete FROM emp_personal_detail where emp_id='$emp_id'";
		$resdel=mysql_query($del,$link);
		if($resdel)
		{
			unlink("images/".$photo);
			header("location:admin_emp_req_page.php");
		}
		
	}
	}
	else
	{
		header("location:admin_emp_req_page.php");
	}
}
?>
</form>
</body>
</html>