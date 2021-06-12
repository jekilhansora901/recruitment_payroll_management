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
$empcode=$_REQUEST['empcode'];
$empcode=base64_decode($empcode);
$sql="select * from emp_personal_detail,department_detail,desg_detail,education_master where emp_personal_detail.emp_code='$empcode' AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND emp_personal_detail.edu_id=education_master.edu_id";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$row=mysql_fetch_array($query);
	$i=0;
	echo "<table align=center>";
	echo "<th colspan=5>Personal Information</th>";
	echo "<tr>";
		echo "<td>";
			echo "Employee Id";
		echo "</td>";
		echo "<td>";
			echo $row['emp_id'];
		echo "</td>";
		echo "<td>";
			echo "Employee Code";
		echo "</td>";
		echo "<td>";
			echo $row['emp_code'];
		echo "</td>";
		echo "<td rowspan=6>";
			$image=$row ['emp_photo'];
			?>
				<img src="images/<?php echo $image; ?>" height="162" width="126" />
			<?php
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Full Name";
		echo "</td>";
		echo "<td colspan=3>";
			echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Date Of Birth";
		echo "</td>";
		echo "<td colspan=2>";
			echo $row['d_o_b'];
		echo "</td>";
		/*echo "<td>";
			echo "Age";
		echo "</td>";
		echo "<td>";
			echo $row['age'];
		echo "</td>";*/
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Email Address";
		echo "</td>";
		echo "<td colspan=3>";
			echo $row['email'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td rowspan=2 valign=top>";
			echo "Address";
		echo "</td>";
		echo "<td colspan=3>";
			echo $row['add1'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan=3>";
			echo $row['add2'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Blood Group";
		echo "</td>";
		echo "<td>";
			echo $row['blood_grp'];
		echo "</td>";
		echo "<td colspan=2>";
			echo "Date of Join";
		echo "</td>";
		echo "<td>";
			echo $row['date_join'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Department";
		echo "</td>";
		echo "<td>";
			echo $row['dept_name'];
		echo "</td>";
		echo "<td colspan=2>";
			echo "Designation";
		echo "</td>";
		echo "<td>";
			echo $row['desg_name'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Qualification";
		echo "</td>";
		echo "<td>";
			echo $row['course_name'];
		echo "</td>";
		echo "<td colspan=2>";
			echo "ID Status";
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
	echo "</tr>";
/*	//echo "</table>";
}
$sql="select * from login_master,security_que where emp_code='$empcode' AND login_master.security_que_id=security_que.que_id";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$row=mysql_fetch_array($query);
	//echo "<table align=center>";
	echo "<th colspan=5>Log In Information</th>";
	echo "<tr>";
		echo "<td>";
			echo "Email";
		echo "</td>";
		echo "<td colspan=4>";
			echo $row['login_name'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Password";
		echo "</td>";
		echo "<td colspan=4>";
			echo $row['login_pass'];
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "Security Question";
		echo "</td>";
		echo "<td colspan=4>";
			echo $row['que'];
		echo "</td>";
	echo "</tr>";	
	echo "<tr>";
		echo "<td>";
			echo "Answer";
		echo "</td>";
		echo "<td colspan=4>";
			echo $row['answer'];
		echo "</td>";
	echo "</tr>";	
	echo "<tr />";
	echo "<tr />";*/
	echo "<tr>";
	echo "<td colspan=5>";
	echo "<a href=adminemplist.php>View All Employee List</a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
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
