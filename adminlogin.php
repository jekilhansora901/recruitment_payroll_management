<?php
session_start();
include("connect.php");
if((@$_SESSION['admin']))
{
	header("location:admin.php");
}
if(@$_POST['can'])
{
 header("location:index.php");
}
if(@$_POST['btn'])
{
$username=trim(($_POST["username"]));
$password=trim(($_POST["password"]));
$error=array();
for($i=1;$i<30;$i++)
{
$error[$i]="";
}
if(empty($username)) {
$error[1]= "Enter Log In name.";
$code="1" ;
}
if(empty($password)) {
$error[2]= "Enter Password.";
$code="2" ;
}
/*if(!($username=="admin")) {
if(!(@$code=="1"))
{
$error[3]= "Enter Correct Log In Name.";
$code="3";
}
}*/
/*if(!($password=="admin")) {
if(!(@$code=="2"))
{
$error[4]= "Enter Correct Password.";
$code="4";
}
}*/
if(!(isset($code)))
{
$password=base64_encode($password);
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM admin_master WHERE admin_id='$username' AND admin_pass='$password' "));
if($row['admin_id'])
{
$_SESSION['admin']=$username;
header("location:admin.php");
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
		<H2>Admin Login</H2>
		<br />
		<br />
		<div id="login-box-name" style="margin-top:20px;">User Name:</div><div id="login-box-field" style="margin-top:20px;">
		<input name="username" class="form-login" size="30" value="<?php if(isset($username)){echo $username;} ?>"/><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} if(isset($error[3])){?><span class="jekil"><?php echo $error[3];} ?></span></div>
		<div id="login-box-name">Password:</div><div id="login-box-field">
		<input name="password" type="password" class="form-login"  size="30" value="" /><?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} if(isset($error[4])){?><span class="jekil"><?php echo $error[4];} ?></span></div>
		<br />
		<!--<span class="login-box-options"><a href="forgotpass.php" style="margin-left:30px;">Forgot password?</a></span>-->
		<br />
		<br />
		<?php if(isset($error[5])){?><span class="jekil"><?php echo $error[5]."<br>";}?></span>
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
