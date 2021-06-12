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
$email=trim(mysql_real_escape_string($_POST["nemail"]));
$add1=trim(mysql_real_escape_string($_POST["nadd1"]));
$add2=trim(mysql_real_escape_string($_POST["nadd2"]));
$department=trim(mysql_real_escape_string($_POST['ndepartment']));
$designation=trim(mysql_real_escape_string($_POST['ndesignation']));
$qualification=trim(mysql_real_escape_string($_POST['nqualification']));
$file1 = $_FILES["file"];
$name1 = $file1['name'];
$type = $file1['type'];
$size = $file1['size'];
$tmppath = $file1['tmp_name']; 

for($i=1;$i<20;$i++)
{
$error[$i]="";
}
if(empty($email)) {
$error[1]= "Enter a email.";
$code= "1";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
if(!(@$code=="1"))
		{
$error[2]= 'You did not enter a valid email.';
$code= "2";
}
}
if(empty($add1)) {
$error[3]= "Enter Address Line 1.";
$code= "3" ;
}
/*if(empty($add2)) {
$error[4]= "Enter Address Line 2.";
$code= "4" ;
}*/
if(isset($code))
{
}
else
{
$empcode=$_SESSION['empcode'];
if($name1!="")
{
if(move_uploaded_file ($tmppath, 'images/'.$name1))//image is a folder in which you will save image
{
	unlink("images/".$empcode.".jpg");
		function compress_image($source_url, $destination_url, $quality) 
		{
			$info = getimagesize($source_url);
			if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
			elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
			elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
			//save it
			imagejpeg($image, $destination_url, $quality);
			//return destination file url
			return $destination_url;
		}

		$source_photo = 'images/'.$name1;
		$dest_photo = 'images/'.$empcode.'.jpg';
		$d = compress_image($source_photo, $dest_photo, 60);
		unlink("images/$name1");
		
		$name1=$empcode.'.jpg';
		$update = "UPDATE emp_personal_detail SET emp_photo = '$name1' WHERE emp_personal_detail.emp_code = '$empcode';";
		$result=mysql_query($update,$link);
		header("refresh:0;url='http://localhost/recruitment_payroll_management/empprof.php';");
}
else
echo "Cant Move";
}
$update = "UPDATE emp_personal_detail SET email = '$email', add1 = '$add1', add2 = '$add2', dept_code = '$department', desg_code = '$designation', edu_id = '$qualification'  WHERE emp_personal_detail.emp_code = '$empcode';";
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
			<center>
			<form method="POST" action="" enctype="multipart/form-data">
				<?php
				include("connect.php");
				$empcode=$_SESSION['empcode'];
				$sql="select * from emp_personal_detail,department_detail,desg_detail,education_master where emp_personal_detail.emp_code='$empcode' AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code AND emp_personal_detail.edu_id=education_master.edu_id";
				$query=mysql_query($sql,$link);
				if($query)
				{
					$row=mysql_fetch_array($query);
					echo "<table align=center>";
					echo "<th colspan=5>Personal Information</th>";
					echo "<tr>";
					echo "<td rowspan=6 width=130>";
							$image=$row ['emp_photo'];
							?>
								<img src="images/<?php echo $image; ?>" height="162" width="126" />
							<?php
							if(isset($_POST['edit']) || isset($code))
							{
								/*echo '</td>';
								echo "<tr>";
								echo "<td>";*/
								echo "<input type='file' name='file'>";
								/*echo "</td>";
								echo "</tr>";*/
							}
						echo "</td>";
						/*echo "<td>";
							echo "Employee Id";
						echo "</td>";
						echo "<td>";
							echo $row['emp_id'];
						echo "</td>";*/
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Employee Code";
						echo "</td>";
						echo "<td>";
							echo $row['emp_code'];
						echo "</td>";
						
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Full Name";
						echo "</td>";
						echo "<td>";
							echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Date Of Birth";
						echo "</td>";
						echo "<td>";
							echo $row['d_o_b'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
					
						echo "<td>";
							echo "Age";
						echo "</td>";
						echo "<td>";
							echo $row['age'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Email Address";
						echo "</td>";
						echo "<td>";
						$oemail=$row['email'];
						if(isset($_POST['edit']) || isset($code))
							{
								echo "<input type='text' value='$oemail' name='nemail' size='30'>";if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}?></span><?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];}?></span><?php
							}
						else
							{
								echo $oemail;
							}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td rowspan=2 valign=top>";
							echo "Address";
						echo "</td>";
						echo "<td colspan=2>";
						$oadd1=$row['add1'];
						if(isset($_POST['edit']) || isset($code))
							{
								echo "<input type='text' value='$oadd1' name='nadd1' size='30'>";if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];}?></span><?php
							}
						else
						{
							echo $oadd1;
						}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan=2>";
						$oadd2=$row['add2'];
						if(isset($_POST['edit']) || isset($code))
							{
								echo "<input type='text' value='$oadd2' name='nadd2' size='30'>";if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];}?></span><?php
							}
						else
						{
							echo $oadd2;
						}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Blood Group";
						echo "</td>";
						echo "<td colspan=2>";
							echo $row['blood_grp'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
					
						echo "<td>";
							echo "Date of Join";
						echo "</td>";
						echo "<td colspan=2>";
							echo $row['date_join'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Department";
						echo "</td>";
						echo "<td colspan=2>";
						if(isset($_POST['edit']) || isset($code))
							{
								$query1 = "select dept_code,dept_name from department_detail where delete_flag='0' order by dept_name";
								$result1 = mysql_query($query1,$link);
								$sb='<select name=ndepartment>';
								while ($row1 = mysql_fetch_assoc($result1)) {
									if($row1['dept_name']==$row['dept_name'])
									{
									$sb.='<option value=' . $row1['dept_code'] . ' selected>' . $row1['dept_name'] . '</option>';
									}
									else
									{
									$sb.='<option value=' . $row1['dept_code'] . '>' . $row1['dept_name'] . '</option>';
									}
								}
								$sb.='</select>';
								mysql_free_result($result1);
								echo $sb;
							}
						else
						{
							echo $row['dept_name'];
						}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
					
						echo "<td>";
							echo "Designation";
						echo "</td>";
						echo "<td colspan=2>";
						if(isset($_POST['edit']) || isset($code))
							{
								$query2 = "select desg_code,desg_name from desg_detail where delete_flag='0' order by desg_name";
								$result2 = mysql_query($query2,$link);
								$sb='<select name=ndesignation>';
								while ($row2 = mysql_fetch_assoc($result2)) {
									if($row2['desg_name']==$row['desg_name'])
									{
									$sb.='<option value=' . $row2['desg_code'] . ' selected>' . $row2['desg_name'] . '</option>';
									}
									else
									{
									$sb.='<option value=' . $row2['desg_code'] . '>' . $row2['desg_name'] . '</option>';
									}
								}
								$sb.='</select>';
								mysql_free_result($result2);
								echo $sb;	
							}
						else
						{
							echo $row['desg_name'];
						}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Qualification";
						echo "</td>";
						echo "<td colspan=2>";
						if(isset($_POST['edit']) || isset($code))
							{
								$query3 = "select edu_id,course_name from education_master";
								$result3 = mysql_query($query3,$link);
								$sb='<select name=nqualification>';
								while ($row3 = mysql_fetch_assoc($result3)) {
									if($row3['course_name']==$row['course_name'])
										{
											$sb.='<option value=' . $row3['edu_id'] . ' selected>' . $row3['course_name'] . '</option>';
										}
									else
									{
										$sb.='<option value=' . $row3['edu_id'] . '>' . $row3['course_name'] . '</option>';
									}
								}
								$sb.='</select>';
								mysql_free_result($result3);
								echo $sb;
							}
						else
						{
							echo $row['course_name'];
						}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td />";
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
