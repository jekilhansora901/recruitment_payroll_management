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
				$sql="select * from emp_personal_detail,department_detail,desg_detail,education_master where emp_personal_detail.emp_code='$empcode' AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND emp_personal_detail.edu_id=education_master.edu_id";
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

					echo "<tr>";
					echo "<td>Type of Loan</td>";
					echo "<td><input type='text' name='type of loan' disabled='daisabled' /></td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td>Aim</td>";
					echo "<td><textarea name='aim'></textarea></td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td>Installment</td>";
					echo "<td><input type='text' name='installment' disabled='disabled' /></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td><input type='submit' name='submit' value='submit' align='center' /></td>";
					echo "<td><input type='reset' name='submit' value='Cancel' ></td>";
					echo "</tr>";
					echo "</table>";
				}
					?>
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
