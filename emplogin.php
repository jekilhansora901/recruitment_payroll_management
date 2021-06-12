<?php
session_start();
require("connect.php");
if(@$_POST['can'])
{
 header("location:index.php");
}
if(@$_POST['btn'])
{
$username=trim(mysql_real_escape_string($_POST["username"]));
$password=trim(mysql_real_escape_string($_POST["password"]));
$error=array();
for($i=1;$i<10;$i++)
{
$error[$i]="";
}
if(empty($username)) {
$error[1]= "Enter your username";
$code="1" ;
}
/*if(isset($username) && !preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $username)) 
		{
		if(!(@$code=="1"))
		{
		$error[2]= 'You did not enter a valid email.';
		$code= "2";
		}
		}*/
if(empty($password)) 
	{
		$error[3]= "Enter a password.";
		$code= "3";
	}
if(preg_match('/[^0-9a-zA-Z-]+/i',$password) || (strlen($password) < 5 || strlen($password) >10))
	{
		if(!(@$code=="3"))
		{
		$error[4]= "5-10 characters only.";
		$code= "4";
		}
	}
if(!(isset($code)))
{
$password=base64_encode($password);
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM login_master WHERE login_name='$username' AND login_pass='$password'"));
if($row['login_name'])
{
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM login_master WHERE login_name='$username' AND login_pass='$password' AND active_flag=1"));
if($row['login_name'])
{
$empcode=$row['emp_code'];
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM emp_personal_detail WHERE emp_code='$empcode'"));
if($row['first_name'])
{
$_SESSION['usr']=$row['first_name'];
$_SESSION['empcode']=$row['emp_code'];
header("location:index.php");
}
}
else
{
	$error[6]="Your Account is Temporary Deactive by Admin";
	$code= "6";
}
}
else
{
		$error[5]="Wrong username and/or password!";
		$code= "5";
}
}
}
?>

<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<form name="adminlogin" method="POST" action="">
	<div id="main">    
		<div style="padding: 100px 0 0 250px;">
		<div id="login-box">
		<H2>Employee Login</H2>
		<br />
		<div id="login-box-name" style="margin-top:20px;">User Name:</div><div id="login-box-field" style="margin-top:20px;">
		<input name="username" class="form-login" size="30" value="<?php if(isset($username)){echo $username;} ?>"/><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} ?></span></div>
		<div id="login-box-name">Password:</div><div id="login-box-field">
		<input name="password" type="password" class="form-login"  size="30" value="" /><?php if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];} if(isset($error[4])){?><span class="jekil"><?php echo $error[4];} ?></span></div>
		<br />
		<span class="login-box-options"><a href="forgotpass.php" style="margin-left:30px;">Forgot password ?</a><a href="signup.php" style="margin-left:30px;">Sign Up</a></span>
		<br />
		<br />
		<span class="login-box-options"><a href="index.php" style="margin-left:30px;">Back To Home</a></span>
		<br />
		<br />
		<?php if(isset($error[5])){?><span class="jekil"><?php echo $error[5]."<br>";}?></span>
		<?php if(isset($error[6])){?><span class="jekil"><?php echo $error[6]."<br>";}?></span>
		<input type="submit" style="margin-left:88px; padding:3px;" name="btn"  value="  LOG IN  " />
		<input type="submit" name="can" style="padding:3px;" value="  Cancel  "  />
		<!--<a href="adminlogin.php?q="><img src="../images/login-btn.png" width="103" height="42" style="margin-left:90px;" /></a>-->
		</div>
		</div>
	</div>
</form>
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
