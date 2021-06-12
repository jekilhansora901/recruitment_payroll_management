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
	$empcode=$_REQUEST['empcode'];
	$empcode=base64_decode($empcode);

$pl=trim(mysql_real_escape_string($_POST['pl']));
$medical=trim(mysql_real_escape_string($_POST['medical']));
for($i=1;$i<30;$i++)
{
$error[$i]="";
}
if(empty($pl)) 
{
$error[1]= "Enter No. of Leave";
$code= "1" ;
}
if(!(is_numeric($pl)))
{
	if(!(@$code=="1"))
	{
		$error[2]= "Only digits are allowed";
		$code= "2";
	}
}
if(empty($medical)) 
{
$error[3]= "Enter No. of Medical";
$code= "3" ;
}
if(!(is_numeric($medical)))
{
	if(!(@$code=="3"))
	{
		$error[4]= "Only digits are allowed";
		$code= "4";
	}
}
/*if(empty($pf)) 
{
$error[3]= "Enter Total PF";
$code= "3" ;
}
if(!(is_numeric($pf)))
{
	if(!(@$code=="3"))
	{
		$error[4]= "Only digits are allowed";
		$code= "4";
	}
}*/
if(isset($code))
{
}
else
{
	$sql="UPDATE leave_availed set pl_availed='$pl',medical_availed='$medical' where emp_code='$empcode'";
	$result=mysql_query($sql);
	if($result)
	{
			$msg="Successfuly Updated";
	}
	else
	{
		die(mysql_error());
	}
}
}
if(isset($_POST['cbtn']))
{
	header("location:admin_set_rule_leave.php");
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
         		<center>
				<h2>Employee Account Setting</h2>
				<form action="" method="post">
				<?php
				include("connect.php");

				$empcode=$_REQUEST['empcode'];
				$empcode=base64_decode($empcode);
				$sql="select * from emp_personal_detail,department_detail,desg_detail,education_master,leave_availed where emp_personal_detail.emp_code='$empcode' AND leave_availed.emp_code='$empcode' AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND emp_personal_detail.edu_id=education_master.edu_id";
				$query=mysql_query($sql,$link);
				if($query)
				{
					$row=mysql_fetch_array($query);
					
					echo "<table>";

					echo "<tr>";
					echo "<td>Name of Employee</td>";
					echo "<td>";
					echo ": ".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					echo "</td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td>Employee Code</td>";
					echo "<td>";
					echo ": ".$row['emp_code'];
					echo "</td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td>Department</td>";
					echo "<td>: ".$row['dept_name'];
					echo "</td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td>Designation</td>";
					echo "<td>: ".$row['desg_name']."</td>";
					echo "</tr>";
					
					?>
					
					<tr>
					<td>PL Leave</td>
					<td><input type="text" name="pl" value="<?php echo $row['pl_availed']; ?>"><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}?> </span> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} ?> </span></td>
					</tr>
					<tr>
					<td>Medical Leave</td>
					<td><input type="text" name="medical" value="<?php echo $row['medical_availed']; ?>"><?php if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];}?> </span> <?php if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];} ?> </span></td>
					</tr>
					
					<tr>
					<td><input type="submit" value="Insert" name="btn"></td>
					<td><input type="submit" value="Back To Home" name="cbtn"><span id='actemp'><?php if(isset($msg))echo $msg;?></span></td>
					</tr>
					</table>
                    <?php
					 } 
					 else
					 	die(mysql_error());
						
					 ?>
					</center>
					</form>
					
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

				