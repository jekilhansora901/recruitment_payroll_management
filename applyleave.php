
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

if(isset($_POST['btn']))
{
$ltype=trim(mysql_real_escape_string($_POST["ltype"]));
$don=trim(mysql_real_escape_string($_POST['dobb']));
$ddob=trim(mysql_real_escape_string($_POST['dob']));
$noday=trim(mysql_real_escape_string($_POST["noday"]));
$reason=trim(mysql_real_escape_string($_POST["res"]));
$empcode=trim(mysql_real_escape_string($_POST["empcode"]));
$error=array();
for($i=1;$i<30;$i++)
{
$error[$i]="";
}
$month=date("m");
$cl="select * from leave_availed where emp_code='$empcode'";
$re=mysql_query($cl,$link);
$row=mysql_fetch_array($re);


if($ltype=='cl_availed')
{
$c2="SELECT * from leave_master where  DATE_FORMAT(date_leave,'%m')='$month' and type_leave='cl' and emp_code='$empcode'";
$result=mysql_query($c2,$link);
$norow=mysql_num_rows($result);
if(!$norow==0)
{
$error[3]="CL leave is already use this Month";
$code="3";
}

if(!$noday==1)
{
$error[7]="You can get only 1 CL in 1 Month";
$code="7";
}
}

$pll=$row['pl_availed'];
if($ltype=='pl')
{
if($pll==0)
{
$error[4]="No PL leave Remaining for this year";
$code="4";
}
}

$mll=$row['medical_availed'];
if($ltype=='medical_availed')
{
if($mll==0)
{
$error[5]="No Medical leave Remaining for this year";
$code="5";
}
}



if(empty($don)) {
$error[2]= "Select Date.";
$code= "2" ;
}
if(empty($reason)) {
$error[1]= "Enter Reason for leave";
$code= "1" ;
}
if(isset($code))
{
}
else
{
$insert = "INSERT INTO leave_master (sr_no, emp_code, date_leave, days, type_leave, leave_reason) VALUES (NULL, '$empcode', '$don', '$noday', '$ltype', '$reason')";
$result=mysql_query($insert,$link);
if($result)
{
$msg="<span id=actemp>Form Successfully Submited</span>";
}
else
{
echo "<br>".mysql_error();
echo "Something going wrong.";
}
}
}
if(isset($_POST['can']))
{
	header("location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="jquery.ui.all.css">
<script src="jquery-1.7.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	
	
	<script language="javascript">
	$(function() {
		$( "#datepicker").datepicker({
			altField: "#alternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "0Y"
			});
		
	});
	</script>
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
				<h2>Leave Application Form</h2>
				<?php
				include("connect.php");
				$empcode=$_SESSION['empcode'];
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
					<input type="text" name="empcode" value="<?php echo $row['emp_code']; ?>" hidden="true">
					<tr>
					<td>Type of Leave</td>
					<td><select name="ltype">
						<option value="cl" selected>CL</option>
						<option value="pl">PL</option>
						<option value="medical">Medical</option>
						<option value="half_day">Half Day</option>
					</select><?php if(isset($error[3])){?><span class="jekil"><?php echo $error[3];} ?></span><?php if(isset($error[4])){?><span class="jekil"><?php echo $error[4];} ?></span><?php if(isset($error[5])){?><span class="jekil"><?php echo $error[5];} ?></span><?php if(isset($error[7])){?><span class="jekil"><?php echo $error[7];} ?></span></td>
					</tr>

					<tr>
					<td valign=top>Reason for Leave</td>
					<td><textarea name='res'><?php if(isset($desc)){echo $desc;} ?></textarea> <?php if(isset($error[1])){?><span class="jekil"><?php echo $error[1];} ?></span></td>
					</tr>
					
					<td>Select Date</td>
					<td><input type="text" name="dob" id="datepicker" size="20" value="<?php if(isset($ddob)){echo $ddob;} ?>" />
					<?php if(isset($error[2])){?><span class="jekil"><?php echo $error[2];} ?></span>
					<input type="text" hidden="true" id="alternate" size="47" name="dobb" value="<?php if(isset($don)){echo $don;} ?>"/></td>
					</tr>
					<tr>
					<td>No. of Days</td>
					<td><select name="noday">
						<option value="1" selected>1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select></td>
					</tr>
					<tr>
					<td><input type='submit' name='btn' value='submit' align='center' /></td>
					<td><input type='submit' name='can' value='Cancel' >
					<?php
					if(isset($msg)) echo $msg;
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td valign=top>Leave Remaining</td>";
					echo "<td>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<th>CL Remaining</th>";
					echo "<th>PL Remaining</th>";
					echo "<th>Medical Remaining</th>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$row['cl_availed']." Days</td>";
					echo "<td>".$row['pl_availed']." Days</td>";
					echo "<td>".$row['medical_availed']." Days</td>";
					echo "</tr>";
					echo "</table>";
					echo "</td>";
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

 

</body>

</html>
