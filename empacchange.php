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
if(isset($_POST['save']))
{
$uname=trim(mysql_real_escape_string($_POST["newuname"]));
$email=trim(mysql_real_escape_string($_POST["newemail"]));
$mob=trim(mysql_real_escape_string($_POST["newmob"]));
for($i=1;$i<20;$i++)
{
$error[$i]="";
}
if(empty($uname)) {
$error[1]= "Enter User name.";
$code= "1" ;
}
if(empty($email)) {
$error[2]= "Enter a email.";
$code= "2";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
if(!(@$code=="2"))
		{
$error[3]= 'You did not enter a valid email.';
$code= "3";
}
}
if(empty($mob)) {
$error[4]= "Enter a Mobile Number.";
$code= "4" ;
}

//if(strlen($mob) != 10 || is_numeric($mob) == false )
//if(!preg_match('/[0-9]+/i',$mob))
if(!(is_numeric($mob)))
{
	if(!(@$code=="4"))
		{
$error[5]= "Only digits are allowed";
$code= "5";
}
}

if(!(strlen($mob) == 10))
{
	if(!(@$code=="4"))
		{
	if(!(@$code=="5"))
		{
$error[6]= "Only 10 digits are allowed";
$code= "6";
}
}
}
if(isset($code))
{
}
else
{
$empcode=$_SESSION['empcode'];
$update = "UPDATE emp_personal_detail,login_master SET email = '$email', mobile = '$mob',login_name = '$uname' WHERE emp_personal_detail.emp_code = '$empcode' AND login_master.emp_code = '$empcode';";
$result=mysql_query($update,$link);
if($result)
{
$msg="<span id='actemp'>Data Change Successfully.</span>";
}
else
{
$msg="<span id='deaemp'>".mysql_error()."Something going wrong.</span>";
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
		  				<?php
				include("connect.php");
				$empcode=$_SESSION['empcode'];
				$sql="select * from emp_personal_detail,login_master where emp_personal_detail.emp_code='$empcode' AND login_master.emp_code='$empcode'";
				$query=mysql_query($sql,$link);
				if($query)
				{
					$row=mysql_fetch_array($query);

				echo "<table>";
				echo "<th colspan=3>Account Setting</th>";
				echo "<tr>";
				echo "<td>User Name</td>";
				echo "<td>";
				$username=$row['login_name'];
				echo $username;
				echo "</td>";
				if(isset($_POST['edit']) || isset($code))
				{
				echo "<td>";
				echo "<input type='text' value='$username' name='newuname' size='30'>";if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}
				echo "</td>";
				}
				echo "</tr>";
				echo "<tr>";
				echo "<td>Password</td>";
				echo "<td>";
				$a="";
				$len=strlen($row['login_pass']);
				for ($i=0;$i<$len;$i++)
					$a= "*".$a;
				echo "$a</td>";
				if(isset($_POST['edit']) || isset($code))
				{
				echo "<td>";
				echo "<a href='empchangepass.php'>Change Password</a>";
				echo "</td>";
				}
				echo "</tr>";
				echo "<tr>";
				echo "<td>Email Address</td>";
				echo "<td>";
				$email=$row['email'];
				echo $email;
				echo "</td>";
				if(isset($_POST['edit']) || isset($code))
				{
				echo "<td>";
				echo "<input type='text' value='$email' name='newemail' size='30'>";if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];}if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];}
				echo "</td>";
				}
				echo "</tr>";
				echo "<tr>";
				echo "<td>Mobile Number</td>";
				echo "<td>";
				$mob=$row['mobile'];
				echo $mob;
				echo "</td>";
				if(isset($_POST['edit']) || isset($code))
				{
				echo "<td>";
				echo "<input type='text' value='$mob' name='newmob' size='30'>";if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];} if(isset($error[5])){?><span class="jekil"><?php echo "<br>".$error[5];} if(isset($error[6])){?><span class="jekil"><?php echo "<br>".$error[6];}
				echo "</td>";
				}
				echo "</tr>";
				echo "<tr>";
				echo "<td />";
				echo "<td>";
				
				if(isset($_POST['edit']) || isset($code))
				{
				echo "<input type='submit' name='save' value='Save Detail'>";
				}
				if(!(isset($_POST['edit'])) && !(isset($code)))
				{
				echo "<input type='submit' name='edit' value='Change Detail'><br><br>";
				if(isset($msg))
				{
					echo $msg;
				}
				}
				echo "</td>";
				echo "</tr>";
				echo "</table>";
			}
			?>
			</form>
			</center>
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
