<?php
include("connect.php");
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
if(@$_POST['btn']){
 
$edu=trim(mysql_real_escape_string($_POST["newedu"]));

if(empty($edu)) {
$error[1]= "Enter name.";
$code= "1" ;
}

if(preg_match('/[^a-z]+/i',$edu)) {
if(!(@$code=="1"))
		{
			$error[2]= "Enter a valid name.";
			$code= "2" ;
		}
}
$s="select course_name from education_master";
$q = mysql_query($s,$link);
while($row=mysql_fetch_array($q))
{
if(strtolower($row['course_name'])==strtolower($edu))
{
if(!(@$code=="1"))
		{
if(!(@$code=="2"))
		{
$error[3]= "It is already entered.";
$code= "3";
}
}
}
}

if(isset($code))
{
}
else
{
$insert1 = "INSERT INTO education_master (edu_id, course_name, delete_flag) VALUES (NULL, '$edu', '0');";
$result1=mysql_query($insert1,$link);
if($result1)
{
//header("refresh:0;url='http://localhost/recruitment_payroll_management/admin_dept_master.php';");
header("location:admin_edu_master.php");

}
else
{
echo "<br>".mysql_error();
echo "Something going wrong.";
}

}
}
if(@$_POST['cn']){
header("location:admin_edu_master.php");
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
			include("adminmenu.php");
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
			<?php
				include("connect.php");
				$sql="select * from education_master;";
				$query=mysql_query($sql,$link);
				$no_row=mysql_num_rows($query);
				$n=0;
				if($no_row>0)
				{
					echo "<center>";
					echo "<h2>Education Master</h2>";
					echo "<table align=center>";
					echo "<th>Sr No.</th>";
					echo "<th align='center'>Edu<br>Code</th>";
					echo "<th align='center'>Course Name</th>";
					echo "<th>Status</th>";
					echo "<th>Active / <br>Deactive</th>";
					//echo "<th>Parmanent<br>Delete</th>";
					while($row=mysql_fetch_array($query))
					{
						$n++;
						echo "<tr>";
						echo "<td>";
							echo $n;
						echo "</td>";
						echo "<td align='center'>";
							$educode=$row['edu_id'];
							echo $educode;
						echo "</td>";
						echo "<td>";
							echo "<center>".$row['course_name']."</center>";
						echo "</td>";
						echo "<td>";
							if($row['delete_flag']==0)
							{
								echo '<span id="actemp">Active</span>';
							}
							if($row['delete_flag']==1)
							{
								echo '<span id="deaemp">Deactive</span>';
							}
						echo "</td>";

						echo "<td>";
							if($row['delete_flag']==0)
							{
							echo "<a href=\"admin/del_edu.php? educode={$educode}\">"."Deactivate"."</a>";
							}
							if($row['delete_flag']==1)
							{
							echo "<a href=\"admin/rec_edu.php? educode={$educode}\">"."Activate"."</a>";
							}
						echo "</td>";
						/*echo "<td>";
							if($row['delete_flag']==1)
							{
							echo "<a href=\"admin/pdel_edu.php? educode={$educode}\">"."Delete"."</a>";
							}
						echo "</td>";*/
						echo "</tr>";
					}

					if(isset($_GET['addmore']))
						{
							echo "<form method=POST action=''>";
							echo "<tr>";
							echo "<td /><td />";
							echo "<td>";
								?>
								<input type="text" name="newedu" size="15" placeholder="Education" value="<?php if(isset($edu)){echo $edu;} ?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo $error[1];} if(isset($error[2])){?><span class="jekil"><?php echo $error[2];} ?></span> <?php if(isset($error[3])){?><span class="jekil"><?php echo $error[3];} ?></span>
								<?php
							echo "</td>";
							echo "<td>";
								echo "<input type=submit name=btn value=Insert>";
							echo "</td>";
							echo "<td>";
								echo "<input type=submit name=cn value=Cancel>";
							echo "</td>";
							echo "</tr>";
							echo "</form>";
						}

					if(!isset($_GET['addmore']))
						{
							echo "<tr>";
							echo "<td /><td />";
							echo "<td colspan=3>";
								echo "<a href=\"?addmore\">Add New Course</a>";
							echo "</td>";
							echo "</tr>";
						}

					echo "</table>";
					echo "</center>";
				}
			?>
							
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
