<?php
require("connect.php");
session_start();

if(@$_POST['submit']){
 
$pass=trim(mysql_real_escape_string($_POST["txtpass"]));
$cpass=trim(mysql_real_escape_string($_POST["txtcpass"]));
$sans=trim(mysql_real_escape_string($_POST["sans"]));
$security_q=intval(mysql_real_escape_string($_POST["sque"]));
$empcode=mysql_real_escape_string($_SESSION['empcode']);
$mail=mysql_real_escape_string($_SESSION['email']);
if(empty($pass)) {
$error[1]= "Enter a Password.";
$code= "1" ;
}
if(strlen($pass) > 10 || strlen($pass) < 5)
{
if(!@$code==1)
{
$error[3]= "5 - 10 character required.";
$code= "3";
}
}
if(empty($cpass)) {
$error[2]= "Retype a Password.";
$code= "2" ;
}
if(!(strlen($pass)==strlen($cpass)) || !($pass==$cpass))
{
if(!@$code==2)
{
$error[4]= "Enter Same Password you entered.";
$code= "4" ;
}
}
if(empty($sans)) {
$error[5]= "Enter your Answer.";
$code= "5" ;
}
if(isset($code))
{
}
else
{
$pass=base64_encode($pass);
//echo "<span class='jekil'>'$empcode', '$mail', '".md5($pass)."', '$security_q', '$sans'</span>";
$insert = "INSERT INTO login_master (login_id, emp_code, login_name, login_pass, security_que_id, answer, delete_flag) VALUES (NULL, '$empcode', '$mail', '$pass', '$security_q', '$sans', '0');";
$result = mysql_query($insert,$link);
if($result)
{
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM emp_personal_detail WHERE emp_code='$empcode'"));
$_SESSION['usr']=$row['first_name'];
$_SESSION['empcode']=$row['emp_code'];
header("location:index.php");
?>
<span class="jekil">
<?php echo "Data Inserted Successfully."; ?>
</span>
<?php
}
else
{
?>
<span class="jekil">
<?php echo "<br>".mysql_error();
echo "Something going wrong."; ?>
</span>
<?php
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
            
			
		</header>
    
		<div id="site_content">
      		
			<div id="content">
				<div id="content_item">
          <div class="content-inner">
		  <form method="POST" action="" enctype="multipart/form-data">
		  <?php
			require("connect.php");
			$emp_code=$_GET['empcode'];
			
			$sql="select * from emp_personal_detail,department_detail,desg_detail where emp_code='$emp_code' AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code";
			$query=mysql_query($sql,$link);
			$no_row=mysql_num_rows($query);
			if($no_row>0)
			{
			$row=mysql_fetch_array($query);
			echo "<table align=center>";
				echo "<tr>";
					echo "<td rowspan=5 valign=top>";
					$image=$row ['emp_photo'];
					?>
						<img src="images/<?php echo $image; ?>" height="145" width="126" />
					<?php
					echo "</td>";
					echo "<td width=120>";
						$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
						echo "Name";
					echo "</td>";
					echo "<td width=180>";
						echo ": $empname";
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							$empcode=$row['emp_code'];
							$_SESSION['empcode']=$empcode;
							echo "Employee Code";
						echo "</td>";
						echo "<td>";
						echo ": $empcode";
							echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							$dob=$row['d_o_b'];
							echo "Date Of Birth";
						echo "</td>";
						echo "<td>";
							echo ": $dob";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							$dept=$row['dept_name'];
							echo "Department";
						echo "</td>";
						echo "<td>";
							echo ": $dept";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							$desg=$row['desg_name'];
							echo "Designation";
						echo "</td>";
						echo "<td>";
							echo ": $desg";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							$email=$row['email'];
							$_SESSION['email']=$email;
							echo "Email / User Name ";
						echo "</td>";
						echo "<td colspan=2>";
							echo ": $email";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Enter Your Password";
						echo "</td>";
						echo "<td colspan=2>";
							echo ": ";
							?>
							<input type='password' size='30' name='txtpass' placeholder='Enter your password' value="<?php if(isset($pass)){/*for($i=1;$i<=strlen($pass);$i++)*/echo "$pass";} ?>" /> </td> <td> <?php if(isset($error[1])){?><span class="jekil"><?php echo $error[1];} if(isset($error[3])){?><span class="jekil"><?php echo $error[3];}
						
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Conform Your Password";
						echo "</td>";
						echo "<td colspan=2>";
							echo ": ";
							?>
							<input type='password' size='30' name='txtcpass' placeholder='Enter your password again' value="<?php if(isset($cpass)){/*for($i=1;$i<=strlen($pass);$i++)*/echo "$cpass";} ?>" /> </td> <td> <?php if(isset($error[2])){?><span class="jekil"><?php echo $error[2];} if(isset($error[4])){?><span class="jekil"><?php echo $error[4];}
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Security Question";
						echo "</td>";
						echo "<td colspan=2>";
							$query = "select * from security_que";
							$result = mysql_query($query,$link);
							$sb='<select name=sque>';
							while ($row = mysql_fetch_assoc($result)) {
								$sb.='<option value=' . $row['que_id'] . '>' . $row['que'] . '</option>';
							}
							$sb.='</select>';
							mysql_free_result($result);
							echo ": $sb";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Enter Answer ";
						echo "</td>";
						echo "<td colspan=2>";
							echo ": ";
							?>
							<input type='text' name='sans' size='30' placeholder='Enter your answer' value="<?php if(isset($sans)){echo $sans;} ?>"/></td><td> <?php if(isset($error[5])){?><span class="jekil"><?php echo $error[5];}
						echo "</td>";
					echo "</tr>";
					echo "<tr align='center'>";
						echo "<td />";
						echo "<td />";
						echo "<td>";
							echo "<input type=submit name=submit value=Next>";
						echo "</td>";
					echo "</tr>";
			echo "</table>";
					}
				?>
			</form>
            </div>
          <!-- InstanceEndEditable --></div>
 
 </div>
      		</div>
		</div>
	
		<div id="footer">
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
