<?php
include("connect.php");
session_start();
if(!($_SESSION['empcode']))
{
	header("location:emplogin.php");
}
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location:index.php");
	exit;
}
if(@$_POST['change'])
{
$pass=trim(mysql_real_escape_string($_POST["oldpassword"]));
$npass=trim(mysql_real_escape_string($_POST["newpassword"]));
$cpass=trim(mysql_real_escape_string($_POST["confpassword"]));
if(empty($pass)) {
$error[1]= "Enter a Password.";
$code= "1" ;
}
if(empty($npass)) {
$error[2]= "Enter a New Password.";
$code= "2" ;
}
if(empty($cpass)) {
$error[3]= "Enter a New Password Again";
$code= "3" ;
}
if(strlen($pass) > 10 || strlen($pass) < 5)
{
if(!@$code==1)
{
$error[4]= "5 - 10 character required.";
$code= "4";
}
}
if(strlen($npass) > 10 || strlen($npass) < 5)
{
if(!@$code==2)
{
$error[5]= "5 - 10 character required.";
$code= "5";
}
}
if(!(strlen($npass)==strlen($cpass)) || !($npass==$cpass))
{
if(!@$code==3)
{
$error[6]= "Enter Same Password you entered.";
$code= "6" ;
}
}
$empcode=$_SESSION['empcode'];
$row=mysql_fetch_assoc(mysql_query("select * from login_master where login_master.emp_code='$empcode'"));
$emppass=base64_decode($row['login_pass']);
//$emppass=$row['login_pass'];
if(!(strlen($pass)==strlen($emppass)) || !($pass==$emppass))
{
if(!@$code==4)
{
$error[7]= "Enter Your Correct Password";
$code= "7" ;
}
}
if(isset($code))
{
}
else
{
$npass=base64_encode($npass);
$sql="UPDATE login_master SET login_pass = '$npass' WHERE login_master.emp_code ='$empcode';";
$result = mysql_query($sql,$link);
if($result)
{
header("location:empacchange.php");
}
else
{
echo "<span id='deaemp'>".mysql_error()."Something going wrong.</span>";
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
          			
          			
       		</div>
      		</div>
      
			<div id="content">
				<div id="content_item">
          <div class="content-inner">
		  <form method="POST" action="">
			<center>
			<h2>Employee Change Password</h2>
			<table>
			<tr>
			<td>Enter Your Old Password </td>
			<td><input type="password" name="oldpassword"></td>
			<td><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}?></span>
				<?php if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];}?></span>
				<?php if(isset($error[7])){?><span class="jekil"><?php echo "<br>".$error[7];}?></span>
			</td>
			</tr>
			<tr>
			<td>Enter Your New Password </td>
			<td><input type="password" name="newpassword"></td>
			<td><?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];}?></span>
				<?php if(isset($error[5])){?><span class="jekil"><?php echo "<br>".$error[5];}?></span>
			</td>
			</tr><tr>
			<td>Reenter New Password </td>
			<td><input type="password" name="confpassword"></td>
			<td><?php if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];}?></span>
				<?php if(isset($error[6])){?><span class="jekil"><?php echo "<br>".$error[6];}?></span>
			</td>
			</tr>
			<tr>
			<td />
			<td>
			<input type="submit" name="change" value="Change">
			</td>
			</tr>
			</table>
			</center>
		  </form>
          </div>
          <!-- InstanceEndEditable --></div>
 
 </div>
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
