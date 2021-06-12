<?php
session_start();
include("connect.php");
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
/*if(strlen($pass) > 10 || strlen($pass) < 5)
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
}*/
if(!(strlen($npass)==strlen($cpass)) || !($npass==$cpass))
{
if(!@$code==3)
{
$error[6]= "Enter Same Password you entered.";
$code= "6" ;
}
}
$id=$_SESSION['admin'];
$row=mysql_fetch_assoc(mysql_query("select * from admin_master where admin_id='$id'"));
$adminpass=base64_decode($row['admin_pass']);
//$emppass=$row['login_pass'];
if(!(strlen($pass)==strlen($adminpass)) || !($pass==$adminpass))
{
if(!@$code==1)
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
$sql="UPDATE admin_master SET admin_pass = '$npass' WHERE admin_id ='$id';";
$result = mysql_query($sql,$link);
if($result)
{
header("location:adminacchange.php");
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
		  <form method="POST" action="">
		  <center>
		  	<table>
			<tr>
			<td>Enter Your Old Password </td>
			<td><input type="password" name="oldpassword"></td>
			<td><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}?></span>
				
				<?php if(isset($error[7])){?><span class="jekil"><?php echo "<br>".$error[7];}?></span>
			</td>
			</tr>
			<tr>
			<td>Enter Your New Password </td>
			<td><input type="password" name="newpassword"></td>
			<td><?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];}?></span>
				
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
