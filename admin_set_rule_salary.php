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
         
			
				
				<center>
                <h2>Employee Account Setting</h2>
				<br>
				<table>
				<tr>
				<td><a href="?allemp">For Current All Employee</a></td>
				<td />
                <?php
		require 'connect.php';
		$total=0;
		$sql="select * from basic_sal_master where set_flag=0";
		$query=mysql_query($sql,$link);
		$no_row=mysql_num_rows($query);
		?>
				<td><a href="?newemp">For New Employee   <?php if(!$no_row==0){?><span id='deaemp' style="text-decoration:blink; font-size:14px">(<?php echo $no_row; ?>)</span><?php }?></a></td>
				</tr>
				</table>
				<?php
				if(isset($_GET['newemp']))
				{
				$sql="select * from emp_personal_detail,department_detail,desg_detail,basic_sal_master where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND basic_sal_master.set_flag=0 AND basic_sal_master.emp_code=emp_personal_detail.emp_code";
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
					echo "<th>Set Salary Rule</th>";
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
								$empcode=base64_encode($empcode);
								echo "<a href=\"admin_set_rl_salary.php?empcode={$empcode}\">"."Set Rule "."</a>";
							echo "</td>";
					}
					echo "</table>";
					}
					else
{
	echo "Sorry ! All Employee's Salary Rule is Updated Already";
	echo "<br>Thank You !";
}
					}
				if(isset($_GET['allemp']))
				{
				$sql="select * from emp_personal_detail,department_detail,desg_detail,basic_sal_master where emp_personal_detail.delete_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND basic_sal_master.emp_code=emp_personal_detail.emp_code";
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
					echo "<th>Set Salary Rule</th>";
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
								$empcode=base64_encode($empcode);
								echo "<a href=\"admin_set_rl_salary.php?empcode={$empcode}\">"."Set Rule "."</a>";
							echo "</td>";
					}
					echo "</table>";
				}
				else
{
	echo "Sorry ! All Employee's Salary Rule is Updated Already";
	echo "<br>Thank You !";
}
				
?>


<?php
}

?>
</center>
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
