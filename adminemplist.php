<?php
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
<?php
$sql="select * from emp_personal_detail,department_detail,desg_detail where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$i=0;
	echo "<table align=center>";
	echo "<th>Sr.<br>No.</th>";
	echo "<th>Emp<br>Code</th>";
	echo "<th width=200>Name</th>";
	echo "<th>Department</th>";
	echo "<th>Status</th>";
	echo "<th>Activate/<br>Deactivate</th>";
	//echo "<th>Delete<br>Permanently</th>";
	echo "<th colspan=2>Details</th>";

while($row=mysql_fetch_array($query))
{
	echo "<tr>";
		echo "<td width=15>";
			$i++;
			echo "$i";
		echo "</td>";
		echo "<td>";
			$empcode=$row['emp_code'];
			echo $empcode;
		echo "</td>";
		echo "<td width=110>";
			$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo $empname;
		echo "</td>";
		echo "<td>";
			$dept=$row['dept_name'];
			echo $dept;
		echo "</td>";
		echo "<td>";
			if($row['active_flag']==1)
			{
				echo '<span id="actemp">Active</span>';
			}
			if($row['active_flag']==0)
			{
				echo '<span id="deaemp">Deactive</span>';
			}
		echo "</td>";
		echo "<td align=center><center>";
		$select12="select * from login_master where emp_code='$empcode'";
		$query12=mysql_query($select12,$link);
		$noofrow=mysql_num_rows($query12);
		if($noofrow>0)
		{
			if($row['active_flag']==0)
			{
			echo "<a href=\"admin/act.php? empcode={$empcode}\">"."Activate"."</a>";
			}
			if($row['active_flag']==1)
			{
			echo "<a href=\"admin/dea.php? empcode={$empcode}\">"."Dectivate"."</a>";
			}
		}
		else
		{
			echo '<span id="deaemp">Not conform by Emp</span>';
		}
		echo "</center></td>";
		/*echo "<td>";
			echo "<a href=\"admin/del.php? empcode={$empcode}&photo={$row['emp_photo']}\">"."Delete"."</a>";
		echo "</td>";*/
		echo "<td>";
			$empcode=base64_encode($empcode);
			echo "<a href=\"admin_emp_all_info.php?empcode={$empcode}\">"."View More Details"."</a>";
		echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
}
else
{
	echo "Sorry ! There is no Employee in Database.";
	echo "<br>Thank You !";
}
?>
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
