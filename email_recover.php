<?php
include("connect.php");
if(@$_POST['btn'])
{
$remail=trim(mysql_real_escape_string($_POST['remail']));

if(empty($remail)) {
$error[1]= "Enter a email.";
$code= "1";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $remail)) 
{
if(!(@$code=="1"))
		{
			$error[2]= 'You did not enter a valid email.';
			$code= "2";
		}
}
$query="SELECT * FROM emp_personal_detail WHERE email = '$remail';";
$result=mysql_query($query,$link);
$row = mysql_fetch_assoc($result);
if(!$row['email'])
{ 
if(!(@$code=="1"))
		{
		if(!(@$code=="2"))
		{
$error[3]="Please Enter Your Correct Email Address.";
$code="3";
}
}
}
if(!isset($code))
{
		$msg="";
		$query="Select * FROM emp_personal_detail WHERE email='$remail';";
		$result=mysql_query($query,$link);
		$row = mysql_fetch_assoc($result);
			$empcode=$row['emp_code'];
		$query="Select * FROM login_master WHERE emp_code='$empcode';";
		$result=mysql_query($query,$link);
		
		$row = mysql_fetch_assoc($result);
		$user=$row['login_name'];
		$passs=$row['login_pass'];
		error_reporting(E_STRICT);
		date_default_timezone_set('America/Toronto');
		require_once('mail/class.phpmailer.php');
		//include("mail/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

		$mail             = new PHPMailer();
		$body			  = "<br>Your User Name for Login : $user <br> Your Password is $passs <br>Please Log In to your account using this user id and password.";
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
		$mail->Subject    = "User Password Forgoting Process";
		$mail->AltBody    = "Hello"; // optional, comment out and test
		$mail->MsgHTML($body);
		$address = "$remail";
		$mail->AddAddress($address, "$remail");
		
		if(!$mail->Send()) 
		{
			$msg = $msg."Sorry Mail was not send for some resones. :";
			$msg = $msg."<br>Mailer Error: "."$mail->ErrorInfo";
		} 
		else 
		{
			$msg = $msg."Password is Mail Successfully.!";
			$msg = $msg."<br>Thank You !";
			//header("location:empregsuc.php");
		}
	}
}
?>		

<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="loginslider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
	<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("loginpanel.php");
			include("menu.php");
			?>
		</header>
    
		<div id="site_content">
      		<div id="sidebar_container">
        		<div class="sidebar">
          			<?php
    			      	include("latest_news.php");
       		   		?>
       	 		</div>
        	
				<div class="sidebar">
          			
          			<p>We'd love to hear from you. Call us, <a href="#">email us</a> or complete our <a href="contact.php">contact form</a>.</p>
       		</div>
      		</div>
      
			<div id="content">
				<div id="content_item">
				
          <div class="content-inner">
		  <form method="POST" action"">
			<table>
			<tr>
				<td>Enter Your Email Address</td>
				<td><input type="text" name="remail" size="35" value="<?php if(isset($remail)){echo $remail;}?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo $error[1];} if(isset($error[2])){?><span class="jekil"><?php echo $error[2];} if(isset($error[3])){?><span class="jekil"><?php echo $error[3];}?></span></td>
			</tr>
			<tr>
				<td />
				<td><input type="submit" value="Conform" name="btn"></td>
			</tr>
			<tr>
				<td colspan=2>
					<?php echo @$msg; ?>
				</td>
			</tr>		
			</table>
			</form>

</div>
          <!-- InstanceEndEditable -->

		  </div>
 
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
    });
  </script>

</body>

</html>
