<?php
require 'connect.php';


if(@$_POST['btn']){
 
$fname=trim(mysql_real_escape_string($_POST["fn"]));
$mname=trim(mysql_real_escape_string($_POST["mn"]));
$lname=trim(mysql_real_escape_string($_POST["ln"]));
$empcode=trim(mysql_real_escape_string($_POST["emp_code"]));
$dob=trim(mysql_real_escape_string($_POST['dobb']));
$ddob=trim(mysql_real_escape_string(@$_POST['dob']));
$agedob=trim(mysql_real_escape_string(@$_POST['dob']));
$add1=trim(mysql_real_escape_string($_POST["add1"]));
$add2=trim(mysql_real_escape_string($_POST["add2"]));
$email=trim(mysql_real_escape_string($_POST["email"]));
$bldgrp=trim(mysql_real_escape_string($_POST['bldgrp']));
$doj=trim(mysql_real_escape_string($_POST['dojj']));
$ddoj=trim(mysql_real_escape_string(@$_POST['doj']));
$department=trim(mysql_real_escape_string($_POST['department']));
$designation=trim(mysql_real_escape_string($_POST['designation']));
$qualification=trim(mysql_real_escape_string($_POST['qualification']));
$mob=trim(mysql_real_escape_string($_POST["mob"]));


$file1 = $_FILES["file"];
$name1 = $file1['name'];
$type = $file1['type'];
$size = $file1['size'];
$tmppath = $file1['tmp_name']; 

$error=array();
for($i=1;$i<30;$i++)
{
$error[$i]="";
}

if(($name1=='')) {
$error[19]= "Upload Your Photo.";
$code= "19" ;
}


if(empty($fname)) {
$error[1]= "Enter a first name.";
$code= "1" ;
}

if(preg_match('/[^a-z]+/i',$fname)) {
if(!(@$code=="1"))
		{
			$error[15]= "Enter a valid name.";
			$code= "15" ;
		}
}	
if(preg_match('/[^a-z]+/i',$mname)) {
if(!(@$code=="2"))
		{
$error[16]= "Enter a valid name.";
$code= "16" ;
		}
}	
if(preg_match('/[^a-z]+/i',$lname)) {
if(!(@$code=="3"))
		{
$error[17]= "Enter a valid name.";
$code= "17" ;
		}
}	

if(empty($mname)) {
$error[2]= "Enter middle name.";
$code= "2" ;
}

if(empty($lname)) {
$error[3]= "Enter a last name.";
$code= "3" ;
}

if(empty($empcode)) {
$error[4]= "Enter your Code.";
$code= "4";
}

if(isset($empcode))
{
	if(!(@$code=="4"))
		{
$row = mysql_fetch_array(mysql_query("select emp_code from emp_personal_detail where emp_code='$empcode'"));
if($row['emp_code'])
{
$error[20]= "It is already entered.";
$code= "20";
}
}
}

if(empty($dob)) {
$error[5]= "Select your B'Date.";
$code= "5" ;
}

if(empty($add1)) {
$error[6]= "Enter an Address Line 1";
$code= "6" ;
}

if(empty($add2)) {
$add2= " ";
}

if(empty($mob)) {
$error[7]= "Enter a Mobile Number.";
$code= "7" ;
}

//if(strlen($mob) != 10 || is_numeric($mob) == false )
//if(!preg_match('/[0-9]+/i',$mob))
if(!(is_numeric($mob)))
{
	if(!(@$code=="7"))
		{
$error[14]= "Only digits are allowed";
$code= "14";
}
}

if(!(strlen($mob) == 10))
{
	if(!(@$code=="7"))
		{
	if(!(@$code=="14"))
		{
$error[18]= "Only 10 digits are allowed";
$code= "18";
}
}
}

if(empty($bldgrp)) {
$error[9]= "Select your Blood Group.";
$code= "9" ;
}

if(empty($doj)) {
$error[10]= "Select Your Join date.";
$code= "10" ;
}

if(empty($department)) {
$error[11]= "Select your Department.";
$code= "11" ;
}

if(empty($designation) ) {
$error[12]= "Select your Designation.";
$code= "12" ;
}

if(empty($qualification)) {
$error[13]= "Select your Qualification.";
$code= "13" ;
}

if(empty($email)) {
$error[8]= "Enter a email.";
$code= "8";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
if(!(@$code=="8"))
		{
$error[24]= 'You did not enter a valid email.';
$code= "24";
}
}
//check if the number field is numeric
/*elseif(is_numeric(trim($_POST["number"])) == false ) {
$error= "error : Please enter numeric value.";
$code= "2";
}

elseif(strlen($number)<5) {
$error= "error : Number should be five digits.";
$code= "2";
}

elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
$error= 'error : You did not enter a valid email.';
$code= "3";
}
*/

/*if(isset($error[1]) && isset($error[2]) && isset($error[3]) && isset($error[4]) && isset($error[5]) && isset($error[6]) && isset($error[7]) && isset($error[8]) && isset($error[9]) && isset($error[10]) && isset($error[11]) && isset($error[12]) && isset($error[13]))
{*/
if(isset($code))
{
}
else
{
//calculate age from date of birth
$birthDate = $agedob;
$birthDate = explode("/", $birthDate);
$age =(date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
//image upload
if($name1!="")
{
if(move_uploaded_file ($tmppath, 'images/'.$name1))//image is a folder in which you will save image
{
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
		
//echo "<br>".$fname."<br>".$mname."<br>".$lname."<br>".$empcode."<br>".$dob."<br>".$age."<br>".$add1."<br>".$add2."<br>".$email."<br>".$bldgrp."<br>".$doj."<br>".$department."<br>".$designation."<br>".$qualification."<br>".$mob."<br>".$file1."<br>".$name1;
$insert1 = "INSERT INTO emp_personal_detail(emp_code, first_name, middle_name, last_name, email, d_o_b, age, mobile, add1, add2, blood_grp, date_join, dept_code, desg_code, emp_photo, edu_id, delete_flag, active_flag) VALUES ('$empcode','$fname', '$mname', '$lname', '$email', '$dob', '$age', '$mob', '$add1', '$add2', '$bldgrp', '$doj', '$department', '$designation', '$name1', '$qualification','0','0');";
//$insert1="INSERT INTO `rpm`.`emp_personal_detail` (`emp_id`, `emp_code`, `first_name`, `middle_name`, `last_name`, `d_o_b`, `age`, `add1`, `add2`, `blood_grp`, `date_join`, `dept_code`, `desg_code`, `emp_photo`, `edu_id`, `delete_flag`, `active_flag`) VALUES (NULL, 'E103', 'ABC', 'PQE', 'TDF', '1995-01-04', '18', '9,Unanti Appartment, Hinglajwadi', 'B/H Ncc Office, Bhuj', 'O-', '2013-03-02', '2', '2', 'I.gif', '2', '0', '0');";
$result1=mysql_query($insert1,$link);
if($result1)
{

header("location:empregsuc.php");
}
else
{
echo "<br>".mysql_error();
echo "Something going wrong.";
}
}
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery.ui.all.css">

	<script src="jquery-1.7.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	
	<link rel="stylesheet" href="../css/style.css">
	<script language="javascript">
	$(function() {
		$( "#datepicker" ).datepicker({
			altField: "#alternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			maxDate : "-19Y",
			minDate: "-50Y",
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true
			
		});
		$( "#jdatepicker").datepicker({
			altField: "#jalternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "-15Y",
			maxDate: "-1D +0M",
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true
			});
	});
	</script>

</head>

<body>
<form name="empreg" method="post" action="" enctype="multipart/form-data">
<center><h2>Employee Sing Up Form</h2></center>
<table align="center" class="table">
<p><tr>
<td>Name</td>
<td ><input type="text" name="fn" size="21" placeholder="First Name" value="<?php if(isset($fname)){echo $fname;} ?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} if(isset($error[15])){?><span class="jekil"><?php echo $error[15];} ?></span>  </td>
<td ><input type="text" name="mn" size="21" placeholder="Middle Name" value="<?php if(isset($mname)){echo $mname;} ?>"/> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} if(isset($error[16])){?><span class="jekil"><?php echo $error[16];} ?></span>  </td>
<td ><input type="text" name="ln" size="21" placeholder="Last Name" value="<?php if(isset($lname)){echo $lname;} ?>"/> <?php if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];} if(isset($error[17])){?><span class="jekil"><?php echo $error[17];} ?></span>  </td>
</tr>

<tr>
<td>Employee code</td>
<td><input type="text" name="emp_code"  size="15" value="<?php if(isset($empcode)){echo $empcode;} ?>"/> <?php if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];} ?></span><?php if(isset($error[20])){?><span class="jekil"><?php echo "<br>".$error[20];} ?></span>  </td>

<td colspan="2">Your Photo<input type="file" accept="image/jpeg" accept="image/gif" accept="image/x-png" name="file" value="<?php if(isset($name1)){echo $name1;} ?>"/> <?php if(isset($error[19])){?><span class="jekil"><?php echo "<br>".$error[19];} ?> </span></td>
</tr>

<tr>
<td>Date Of Birth</td>
<td><input type="text" name="dob" id="datepicker" size="20" disabled="disabled" value="<?php if(isset($ddob)){echo $ddob;} ?>" /> <?php if(isset($error[5])){?><span class="jekil"><?php echo "<br>".$error[5];} ?></span>  </td>
<td colspan="2"><input type="text" hidden="true" id="alternate" size="47" name="dobb" value="<?php if(isset($dob)){echo $dob;} ?>"/></td>
</tr>

<tr>
<td rowspan="2" valign="top">Address</td>
<td colspan="3"><input type="text" name="add1" size="50" placeholder="Enter Address Line 1" value="<?php if(isset($add1)){echo $add1;} ?>"/> <?php if(isset($error[6])){?><span class="jekil"><?php echo "<br>".$error[6];} ?></span>  </td>
</tr>
<tr>
<td colspan="3"><input type="text" name="add2" size="50" placeholder="Enter Address Line 2" value="<?php if(isset($add2)){echo $add2;} ?>"/> <?php /*if(isset($error[21])){?><span class="jekil"><?php echo "<br>".$error[21];} */?>  </td>
</tr>

<tr>
<td>Email Address</td>
<td colspan="3"><input type="text" name="email" size="50" value="<?php if(isset($email)){echo $email;} ?>"/> <?php if(isset($error[8])){?><span class="jekil"><?php echo "<br>".$error[8];} if(isset($error[24])){?><span class="jekil"><?php echo $error[24];} ?></span>  </td>
</tr>

<tr>
<td>Mobile Number</td>
<td><input type="text" name="mob" maxlength="10" size="20" value="<?php if(isset($mob)){echo $mob;} ?>"/> <?php if(isset($error[7])){?><span class="jekil"><?php echo "<br>".$error[7];} if(isset($error[14])){?><span class="jekil"><?php echo $error[14];}?></span> <?php if(isset($error[18])){?><span class="jekil"><?php echo $error[18];}?></span>  </td>

<td colspan="2">Blood Group
<select name="bldgrp" value="<?php if(isset($bldgrp)){echo $bldgrp;} ?>"/> <?php if(isset($error[9])){?><span class="jekil"><?php echo "<br>".$error[9];} ?></span>   >
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="A+">B+</option>
<option value="A-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
</select>
</td>
</tr>

<tr>
<td>Date Of Join</td>
<td><input type="text" name="doj" size="20" id="jdatepicker" disabled="disabled" value="<?php if(isset($ddoj)){echo $ddoj;} ?>"/> <?php if(isset($error[10])){?><span class="jekil"><?php echo "<br>".$error[10];} ?></span>  </td>
<td colspan="2"><input name="dojj" type="text" size="47" hidden="true" id="jalternate" value="<?php if(isset($doj)){echo $doj;} ?>"/></td>
</tr>

<tr>
<td>Department</td>
<td> <?php $query = "select dept_code,dept_name from department_detail where delete_flag='0' order by dept_name";
			$result = mysql_query($query,$link);
			$sb='<select name=department>';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['dept_code'] . '>' . $row['dept_name'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?> <?php if(isset($error[11])){ ?> <span class="jekil"><?php echo "<br>".$error[11];} ?></span>
</td>
<td colspan=2>Designation <?php $query = "select desg_code,desg_name from desg_detail where delete_flag='0' order by desg_name";
			$result = mysql_query($query,$link);
			$sb='<select name=designation>';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['desg_code'] . '>' . $row['desg_name'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?><?php if(isset($error[12])){?><span class="jekil"><?php echo "<br>".$error[12];} ?></span> 
</td>
</tr>

<tr>
<td>Qualification</td>
<td colspan="3">
<?php 		$query = "select edu_id,course_name from education_master";
			$result = mysql_query($query,$link);
			$sb='<select name=qualification>';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['edu_id'] . '>' . $row['course_name'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?><?php if(isset($error[13])){?><span class="jekil"><?php echo "<br>".$error[13];} ?></span> 
</td>
</tr>


<tr>
<td /><td />
<td><input type="submit" name="btn"  value="Submit" />
</td>
<td><input type="reset" name="reset" value="Clear"  />
</td>

</tr>
</p>
</table>

</form>

</body>
</html>