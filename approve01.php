\<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	if(!empty($_POST['check_emp'])) 
	{
    foreach($_POST['check_emp'] as $emp_id)
	{
		$query="select * from emp_personal_detail;";
		$result=mysql_query($query,$link);
		if($result)
		{
			$query1="UPDATE `emp_personal_detail` SET `active_flag` = 1 WHERE `emp_personal_detail`.`emp_id` ='$emp_id';";
			$result1 = mysql_query($query1,$link);
			
			$query1="select * from `emp_personal_detail` WHERE `emp_personal_detail`.`emp_id` ='$emp_id';";
			$result1 = mysql_query($query1,$link);
			$row = mysql_fetch_array($result1);
			if($result1)
			{
				//$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
				$email=$row['email'];
				$emp_code1=$row['emp_code'];
				$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
				//echo "<h2>Welcome, $empname</h2>";
				//echo "<h3>Your Email Id : $email</h3>";
				//echo "<h2>Your Emp_code : $emp_code</h2>";
				$emp_code=base64_encode($emp_code1);
				//echo "<input type=hidden name=empcode value=$emp_code>";
				//echo "<a href='http://localhost/recruitment_payroll_management/empverification.php?empcode=$emp_code'>Click Here for verification and conform your account</a>";
			
				//$query2="INSERT INTO `rpm`.`login_master` (`login_id`, `emp_code`, `login_name`, `login_pass`, `security_que`, `answer`, `delete_flag`) VALUES (NULL, '$emp_code', '$email', '$pass', '', '', '0');";
				//$result2=mysql_query($query2,$link);
				//if($result2)
					
					error_reporting(E_STRICT);
					date_default_timezone_set('America/Toronto');
					require_once('mail/class.phpmailer.php');
					//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
					$mail             = new PHPMailer();
					$body			  = "<h2>Welcome, $empname</h2>
										 <h3>Your Email Id : $email</h3>
										 <h2>Your Emp_code : $emp_code1</h2>
										 <input type=hidden name=empcode value=$emp_code>
										 <a href='http://localhost/recruitment_payroll_management/empverification.php?empcode=$emp_code'>Click Here for verification and conform your account</a>
										 ";
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
					$mail->Password   = "886624862052";            // GMAIL password
					$mail->SetFrom('youremail901@gmail.com', 'Jekil Hansora');
					$mail->AddReplyTo("youremail901@gmail.com","Jekil Hansora");
					$mail->Subject    = "Employee Verification Mail";
					$mail->AltBody    = "Ashapura Volclay Pvt. Ltd."; // optional, comment out and test
					$mail->MsgHTML($body);
					$address = "$email";
					$mail->AddAddress($address, "$empname");
						if(!$mail->Send()) 
						{
							echo "Sorry Mail was not send for some resones. :";
							echo "Mailer Error: " . $mail->ErrorInfo;
							$query1="UPDATE `emp_personal_detail` SET `active_flag` = 1 WHERE `emp_personal_detail`.`emp_id` ='$emp_id';";
							$result1 = mysql_query($query1,$link);
							if($result1)
							{
								header("location:admin_emp_req_page.php");
							}
							
						} 
						else 
						{
							echo "Mail sent Successfully.!";
							echo "<br>Thank You !";
							//header("location:admin_emp_req_page.php");
						}
						
						
				
				/*else
				{
					echo "Problem to Create Log In ID and Log In Password.";
				}*/
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
}
?>
</form>
</body>
</html>