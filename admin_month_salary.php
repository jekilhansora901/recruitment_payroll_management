<?php
session_start();
require("connect.php");
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
if(isset($_POST['btn']))
{
	$month=$_POST['month'];
		header("location:admin_salary_slip_pdf.php?month=$month");
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
<form method="post" action="">

<br />

<h2>Month Wise Employee Pay Slip</h2>
<table>
<tr>
<td>Select Month</td>
<td><?php $query = "select DISTINCT month from SALARY order by month";
			$result = mysql_query($query,$link);
			$sb='<select name=month>';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['month'] . '>' . $row['month'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?>
</td>
<td valign="middle"><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} ?></span></td>
</tr>
<tr>
<td>
<input type="submit" name="btn" value="Show"  />
</td>
<td>
<input type="submit" name="cbtn" value="Cancel"  />
</td>
</tr>
</table>
</form>
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
