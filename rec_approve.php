<?php
session_start();
require 'connect.php';
if(isset($_POST['send']))
{
$sub=trim(mysql_real_escape_string($_POST["sub"]));
$body=trim(mysql_real_escape_string($_POST["body"]));
for($i=1;$i<5;$i++)
{
$error[$i]="";
}
if(empty($sub)) {
$error[1]= "Enter a Mail Subject";
$code= "1" ;
}

if(empty($body)) {
$error[2]= "Enter a Mail Body";
$code= "2" ;
}

if(isset($code))
{
}
else
{
$update="UPDATE mail set subject='$sub',body='$body'";
$result=mysql_query($update,$link);
if(mysql_affected_rows()>0)
{
	header("location:admin_rec_req_page.php");
}
else
{	
	header("location:admin_rec_req_page.php");
}
}
}
if(isset($_POST['btn']))
{
	if(!empty($_POST['check_app'])) {

    foreach($_POST['check_app'] as $app_id)
	{
		$query1="UPDATE personal_detail SET approve_flag = 1 WHERE id_no ='$app_id';";
		$result1 = mysql_query($query1,$link);
		$query1="select * from personal_detail,mail WHERE personal_detail.id_no ='$app_id';";
		$result1 = mysql_query($query1,$link);
		$row = mysql_fetch_array($result1);
		if($result1)
		{
			$email=$row['email_id'];
			$subjec=$row['subject'];
			$body=$row['body'];
			$name=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			
			error_reporting(E_STRICT);
				date_default_timezone_set('America/Toronto');
				require_once('mail/class.phpmailer.php');
				//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

				$mail             = new PHPMailer();
				$body			  = $body;
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
				$mail->Subject    = $subjec;
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
					header("location:admin_rec_req_page.php");
				}
			}
}
}
	else
	{
		header("location:admin_rec_req_page.php");
	}

}
if(isset($_POST['cbtn']))
{
	if(!empty($_POST['check_app'])) {
    foreach($_POST['check_app'] as $id_no)
	{
		$query="select * from personal_detail where id_no ='$id_no';";
		$result=mysql_query($query,$link);
		$row=mysql_fetch_array($result);
		$photo=$row['photo'];
		$del="DELETE FROM personal_detail where id_no='$id_no'";
		$re=mysql_query($del,$link) or die(mysql_error);
		$del1="DELETE FROM education_detail where id_no='$id_no'";
		$re=mysql_query($del1,$link) or die(mysql_error);
		$del2="DELETE FROM experience_detail where id_no='$id_no'";
		$re=mysql_query($del2,$link) or die(mysql_error);
		if($re)
		{
			unlink("images/".$photo);
			header("location:admin_rec_req_page.php");
		}
	}
	}
	else
	{
		header("location:admin_rec_req_page.php");
	}
}
if(isset($_POST['cancel']))
{
	header("location:admin_rec_req_page.php");
}
?>
<<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="images/abc.gif"/>
<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>
<body>
<body>
<div id="main" >
		<header>
			<div id="logo" >
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("loginpanel.php");
			include("adminmenu.php");
			?>
		</header>
    
		<div id="site_content">
      		
      
			<div id="content">

				<div id="content_item">
				<form method="POST">
<center>
<h1>Email Settings</h1>
<table>
<?php
$sel="select * from mail where id=1";
$res=mysql_query($sel,$link);
$rowss=mysql_fetch_array($res);
if(isset($_POST['mail']))
{
?>
<tr>
<td>Mail Subject</td>;
<td><input type=text name=sub size=100 placeholder="Enter Email Subject" value="<?php echo $rowss['subject']; ?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} ?> </span> </td>
</tr>;
<tr>
<td>Mail Body</td>;
<td><textarea name=body rows=5 cols=77 placeholder="Enter Email Body"><?php echo $rowss['body']; ?> </textarea> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} ?> </span> </td>
</tr>
<tr>
<td colspan=2 align=center>
<input type="Submit" Value="Update" name="send" ><input type="Submit" Value="Cancel" name="cancel" >
</td>
</tr>
<?php
}
?>
</table>
</center>
</form>
</div>
      		</div>
		</div>
		<footer>
      			<?php
				include("footer.php");
				?>
      	</footer>
	</div>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
	  $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>

</body>

</html>
