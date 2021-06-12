
<?php
session_start();
if(!($_SESSION['admin']))
{
	header("location:adminlogin.php");
}
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>User Approving</title>
<?php
require 'connect.php';

?>
</head>

<body>
<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			include("adminmenu.php");
			?>
		</header>
    
		<div id="site_content" style="background: #eae5e5;">
<center>
<?php
$sql="select * from leave_master,emp_personal_detail,department_detail,desg_detail where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.emp_code=leave_master.emp_code AND emp_personal_detail.desg_code=desg_detail.desg_code and leave_master.approve_flag=0";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$i=0;
	echo "<table align=center>";
	echo "<th>Emp<br>Code</th>";
	echo "<th width=200>Name</th>";
	echo "<th>Department</th>";
	echo "<th>Designation</th>";
	echo "<th>Type<br>Leave</th>";
	echo "<th>Date</th>";
	echo "<th>No.<br>Days</th>";
	echo "<th>Reason for Leave</th>";
	echo "<th colspan=2>Approve/<br>Cancel</th>";

while($row=mysql_fetch_array($query))
{
	echo "<tr>";
		echo "<td>";
			$empcode=$row['emp_code'];
			echo $empcode;
		echo "</td>";
		echo "<td width=110>";
			$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo $empname;
		echo "</td>";
		echo "<td>";
			$dept=$row['dept_name'];
			echo $dept;
		echo "</td>";
		echo "<td>";
			$desg=$row['desg_name'];
			echo $desg;
		echo "</td>";
		echo "<td>";
			$tleave=$row['type_leave'];
			echo $tleave;
		echo "</td>";
		echo "<td>";
			$date=date('d/m/Y',strtotime($row['date_leave']));
			echo $date;
		echo "</td>";
		echo "<td>";
			$noday=$row['days'];
			echo $noday;
		echo "</td>";
		echo "<td>";
			$rleave=$row['leave_reason'];
			echo $rleave;
		echo "</td>";
		echo "<td>";
		
		$id=$row['sr_no'];
			echo "<a href='?approve=$empcode&id=$id'>Approve</a>/<br><a href=?canc=$empcode&id=$id>Cancel</a></td>";
	echo "</tr>";
	
	if(isset($_GET['approve']))
	{
		$empcode=$_REQUEST['approve'];
		$id=$_REQUEST['id'];
		$app_flag=0;
		if($tleave=='pl')
		{
			$noday=$row['days'];
			$u="UPDATE leave_master,leave_availed SET leave_master.approve_flag=1,leave_availed.pl_availed=leave_availed.pl_availed-'$noday' WHERE  leave_master.emp_code='$empcode' and leave_availed.emp_code='$empcode' AND leave_master.sr_no='$id' AND leave_master.emp_code = leave_availed.emp_code;";
			$r=mysql_query($u,$link);
			if($r)
				{
				$app_flag=1;
				}
			else
				{
					die(mysql_error());
				}
		}
	
	if($tleave=='cl')
		{
			$noday=$row['days'];
			$u="UPDATE leave_master,leave_availed set leave_master.approve_flag=1,leave_availed.cl_availed=0 WHERE leave_master.emp_code='$empcode' and leave_availed.emp_code='$empcode' AND leave_master.sr_no='$id' AND leave_master.emp_code=leave_availed.emp_code";
			$r=mysql_query($u,$link);
			if($r)
				{
				$app_flag=1;
				}
			else
				{
					die(mysql_error());
				}
		}
	if($tleave=='medical')
		{
			$noday=$row['days'];
			$u="UPDATE leave_master,leave_availed set leave_master.approve_flag=1,leave_availed.medical_availed=leave_availed.medical_availed-'$noday' WHERE leave_master.emp_code='$empcode' and leave_availed.emp_code='$empcode' AND leave_master.sr_no='$id' leave_master.emp_code = leave_availed.emp_code";
			$r=mysql_query($u,$link);
			if($r)
				{
				$app_flag=1;
				}
			else
				{
					die(mysql_error());
				}
		}
	
	if($tleave=='half_day')
		{
	
			$noday=$row['days'];
				
			$u="UPDATE leave_master,leave_availed set leave_master.approve_flag=1,leave_availed.half_day=leave_availed.half_day+$noday WHERE leave_master.emp_code='$empcode' and leave_availed.emp_code='$empcode' AND leave_master.sr_no='$id' AND leave_master.emp_code=leave_availed.emp_code";
			$r=mysql_query($u,$link);
			if($r)
				{
				$app_flag=1;
				}
			else
				{
					die(mysql_error());
				}
		}
		if($app_flag==1)
		{
			$app_flag=0;
				$email=$row['email'];
				error_reporting(E_STRICT);
				date_default_timezone_set('America/Toronto');
				require_once('mail/class.phpmailer.php');
				//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

				$mail             = new PHPMailer();
				$body	       = "Your Leave Application is Approved By Admin.<br>Thank You";
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
				$mail->Subject    = "Leave Application";
				$mail->AltBody    = "Hello"; // optional, comment out and test
				$mail->MsgHTML($body);
				$address = "$email";
				$mail->AddAddress($address, "$email");
				
				if(!$mail->Send()) 
				{
					$msg = $msg."Sorry Mail was not send for some resones. :";
					$msg = $msg."<br>Mailer Error: "."$mail->ErrorInfo";
					$msg = $msg."<br><span id='deaemp'>But Leave is Approved So Please Inform the employee for his Leave</span>";
				} 
				else 
				{
					header("location:admin_leave_app.php");
				}
		}
		else
		{
			echo "<span id='deaemp'>Leave not Approved</span>";
		}
}
	if(isset($_GET['canc']))
	{
	$empcode=$_REQUEST['canc'];
	$id=$_REQUEST['id'];
	$del="DELETE FROM leave_master where emp_code='$empcode' and sr_no='$id'";
	$result=mysql_query($del,$link);
	if($result)
	{
				$email=$row['email'];
				error_reporting(E_STRICT);
				date_default_timezone_set('America/Toronto');
				require_once('mail/class.phpmailer.php');
				//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

				$mail             = new PHPMailer();
				//$body			  = "Your Leave Application is Canceled By Admin.<br> For some Technical Reason <br> Please Try Again Later <br>Now Enjoy your Work";
				$body =	"	<html>
							<body>

							<table align='center' border='2' cellspacing='6' cellpadding='9' width='640' >
							<tr>
							<td bgcolor='cornsilk'>


							<table bgcolor='gold' width='90%' align='center'><tr><td align='center'>
							<b>
							<font size='5' color='brown'>Title Of Newsletter</font>
							<br>
							<font size='2' color='black'>January 01, 2000 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Issue #123 </font>
							</b>
							</td></tr></table>

							<br>
							Welcome! Here is your subscription!<br> 
							Unsubscribe instructions for 'Newsletter Title Here' are at the end. 


							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'><tr><td><font size='4' color='brown'>In This Issue</font></td></tr></table>
							<br>
							Feature Article &nbsp; &nbsp; &nbsp; Related Articles <br>
							What's New<br>
							Guest Article<br>
							Classifieds<br>
							Feedback

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>Feature Article</font>
							</td></tr></table>
							<br>
							blah blah goes here - usually more than one ?


							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>What's New</font>
							</td></tr></table>
							<br>
							blank if no new news - but it could also contain a link to the current meeting minutes - depends on the type of web site. 

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>Guest Article</font>
							</td></tr></table>
							<br>
							blank if no article for this period 

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>Classified (or Sponsors)</font> </td></tr></table>
							<br>
							Forum Link (to the onsite forum)<br>
							Forum would contain Classified Section (and Sponsors Information for some types of web sites). <br> i.e. this section could be a link to an online Forum - or the info could be included in this section of the newsletter. 

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>Feedback Form</font>
							</td></tr></table>
							<br>
							A link to the Feedback Forum Section.
							<br> i.e. this section could be a link to an online Forum - or a form could be embedded in the online page - or it could just be an email link (mailto). 

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>Subscription and Archive</font>
							</td></tr></table>
							<br>
							How to Subscribe (could be link to 'tell-a-friend' form)<br>
							How to Unsubscribe<br>
							Link to Newsletter Archives 

							<br><br><br>
							<table bgcolor='gold' cellpadding='0' cellspacing='0'>
							<tr><td>
							<font size='4' color='brown'>About:</font> 'Newsletter Site Name Here' </td></tr></table>
							<br>
							Your Signature File or Name<br>
							Your Email Address<br>
							Your City, State Zip<br>
							Your Phone <br>
							Your Newsletter URL<br> 
							</td></tr>
							</table> 
							</body>
							</html>
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
				$mail->Password   = "youremail";            // GMAIL password
				$mail->SetFrom('youremail901@gmail.com', 'Jekil Hansora');
				$mail->AddReplyTo("youremail901@gmail.com","Jekil Hansora");
				$mail->Subject    = "Leave Application";
				$mail->AltBody    = "Hello"; // optional, comment out and test
				$mail->MsgHTML($body);
				$address = "$email";
				$mail->AddAddress($address, "$email");
				
				if(!$mail->Send()) 
				{
					$msg = $msg."Sorry Mail was not send for some resones. :";
					$msg = $msg."<br>Mailer Error: "."$mail->ErrorInfo";
				} 
				else 
				{
					echo "<span id='actemp'>Mail was Sent Successfully.</span>";
					//header("location:admin_leave_app.php");
					//header("location:empregsuc.php");				
				}
				
			}
		}
	}
	if(isset($msg))
		echo $msg;
?>
</table>

<?php
}
else
{
	echo "Sorry ! There is Leave Application";
	echo "<br>Thank You !";
}
?>
</center>
</div>
</div>
<div id="footer">
      			<?php
				include("footer.php");
				?>
      	</div>
	</div>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>

</body>

</html>
