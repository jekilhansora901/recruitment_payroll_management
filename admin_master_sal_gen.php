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

$sql="select * from basic_sal_master";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	//$month=date("m");
	$date=date('Y-m-d');
	$month=$_POST['month'];
	$monthfull=date("F", strtotime("$month/01/1999"));
	//$c2="SELECT * from salary where DATE_FORMAT(salary_date,'%m')='$month'";
	$c2="SELECT * FROM salary where month='$monthfull'";
		$result=mysql_query($c2,$link) or die(mysql_error());
		$norowss=mysql_num_rows($result);
		if($norowss==0)
		{
	while($row=mysql_fetch_array($query))
	{
		
		$empcode=$row['emp_code'];
		$basic=$row['basic'];
		$sel="select * from basic_sal_master where emp_code='$empcode'";
		$res=mysql_query($sel,$link);
		$emp=mysql_fetch_array($res);
		
		$total_pf=$emp['total_pf'];
		$da=$basic*$emp['da(%)']/100;
		$hra=$basic*$emp['hra(%)']/100;
		$medical=300;
		$con=800;
		$pf=$basic*$emp['da(%)']/100;
		
		$select="select * from leave_master where emp_code='$empcode' and DATE_FORMAT(date_leave,'%m')='$month' And type_leave='half_day'";
		$res=mysql_query($select) or die(mysql_error());
		$num=mysql_num_rows($res);
		$r=mysql_fetch_array($res);
		if($num==0)
		{
			$abs_ded=0;
		}
		else
		{
			$monthday=date("t");
			$abs_ded=(($basic/$monthday)/2)*$num;
		}
		$gross=$basic+$da+$hra+$medical+$con;
		$netsal=$gross-$pf-$abs_ded;
		$total_pf=$total_pf+$pf;
		$totpf="UPDATE basic_sal_master SET total_pf='$total_pf' where emp_code='$empcode'";
		$resltpf=mysql_query($totpf,$link) or die(mysql_error());
		$sql="INSERT INTO salary (sr_no, emp_code, salary_date, month, basic, hra, da, medical, conveyance, pf, abs_ded, gross, net_salary) VALUES (NULL, '$empcode', '$date', '$monthfull', '$basic', '$hra', '$da', '$medical', '$con', '$pf', '$abs_ded', '$gross', '$netsal')";
		$reslt=mysql_query($sql,$link) or die(mysql_error());
	}
	$msg= "<br><span id='actemp'>The Salaries of the Month : ".$monthfull." is Generated Successfully";
		}
		else
		{
			$msg= "<br><span id='deaemp'>The Salaries of the Month : ".$monthfull." is already Generated";
		}
}
else
{
	echo "Sorry ! There is no Employee in Database.";
	echo "<br>Thank You !";
}
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
		<br>
        <h2>All Employee's Salary Generation</h2>
		Select Month : 
			<?php
			$m = date("m");
			$m-=1;
			$db=new DatePeriod(date_create(),DateInterval :: createFromDateString('last month'),$m);
			echo "<select name=month>";
			foreach($db as $dt)
			{
				$m=$dt->format("m");
				$f=$dt->format("F");
				echo "<option value='$m'>$f</option>";
			}
			echo "</select>";
			?>
		<br>
		<br>
		<input type="submit" name="btn" value="Generate" />
        <?php if(isset($msg))	echo $msg; ?>
        </form>
		<br>
		<br>
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
