<?php
require 'connect.php';
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


if(isset($_POST['clr']))
{
$don=trim(mysql_real_escape_string($_POST['dobb']));
$ddob=trim(mysql_real_escape_string($_POST['dob']));

$error=array();
for($i=1;$i<30;$i++)
{
$error[$i]="";
}

if(empty($don)) {
$error[2]= "Select Date.";
$code= "2" ;
}
if(isset($code))
{
}
else
{
$insert = "DELETE FROM news_master where date<='$don'";
$result = mysql_query($insert,$link);
if($result)
{
$msg="<span id=actemp>Clear Successfully</span>";
//header("location:admin_edit_news.php");
}
else
{
echo "<br>".mysql_error();
echo "Something going wrong.";
}
}
}
if(isset($_POST['can']))
{
	header("location:admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery.ui.all.css">

	<script src="jquery-1.7.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<script language="javascript">
	$(function() {
		$( "#datepicker").datepicker({
			altField: "#alternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "-20Y",
			maxDate: "+0D +0M",
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true
			});
		
	});
	</script>

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
         
			<form method="POST" action="">
			<center>
			<h2>Clear Recently News</h2>
		  	<table>
			<tr>
			<td>Clear News before Date : </td>
			<td><input type="text" name="dob" id="datepicker" disabled="disabled" size="20" value="<?php if(isset($ddob)){echo $ddob;} ?>" /></td>
			<td> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} ?></span>
			<input type="text" hidden="true" id="alternate" size="47" name="dobb" value="<?php if(isset($don)){echo $don;} ?>"/></td>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<input type="submit" name="clr" value="Clear">
			<input type="submit" name="can" value="Cancel">
			</td>
			</tr>
			</table>
			<?php
			if(isset($msg))	echo $msg;
			?>
			</center>
			</form>
 <!-- InstanceEndEditable --></div>
 
 
 </div>
      		</div>
				<div id="footer">
						<?php
						include("footer.php");
						?>
				</div>
	</div>
</body>
</html>


