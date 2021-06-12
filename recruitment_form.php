<?php
require("connect.php");
if(@$_POST['submit'])
{
$photo1=$_FILES["file"];
$fname=trim(mysql_real_escape_string($_POST["fname"]));
$mname=trim(mysql_real_escape_string($_POST["mname"]));
$lname=trim(mysql_real_escape_string($_POST["lname"]));
$add1=trim(mysql_real_escape_string($_POST["add1"]));
$add2=trim(mysql_real_escape_string($_POST["add2"]));
$email=trim(mysql_real_escape_string($_POST["email"]));
$mobile=trim(mysql_real_escape_string($_POST["mobile"]));
//$telephone=($_POST["telephone"]);
$bg=trim(mysql_real_escape_string($_POST["bg"]));
$dob=trim(mysql_real_escape_string($_POST["dobb"]));
$ddob=trim(mysql_real_escape_string(@$_POST["dob"]));
$agedob=trim(mysql_real_escape_string(@$_POST["dob"]));
$gender=trim(mysql_real_escape_string($_POST["gender"]));
$py=trim(mysql_real_escape_string($_POST["py"]));
$qualification=trim(mysql_real_escape_string($_POST["qualification"]));
$perc=trim(mysql_real_escape_string($_POST["percentage"]));
$country=trim(mysql_real_escape_string(@$_POST["country"]));
$experience=trim(mysql_real_escape_string($_POST["experience"]));
$exp_detail=trim(mysql_real_escape_string($_POST["exp_detail"]));
$total_exp=trim(mysql_real_escape_string($_POST["total_exp"]));
$key_skill=trim(mysql_real_escape_string($_POST["key_skill"]));



$photo=$photo1['name'];
$tmppath=$photo1['tmp_name'];

$error=array();
for($i=1;$i<25;$i++)
{
$error[$i]="";
}

if(empty($fname))
{
$error[1]="Enter Your First Name..";
$code="1";
}

if(preg_match('/[^a-z]+/i',$fname)) 
{
$error[1]= "Enter a valid Name..";
$code= "1" ;
}


if(empty($mname))
{
$error[2]="Enter Your Middle Name..";
$code="2";
}

if(preg_match('/[^a-z]+/i',$mname)) 
{
$error[2]= "Enter a valid Name..";
$code= "2" ;
}


if(empty($lname))
{
$error[3]="Enter Your Last Name..";
$code="3";
}

if(preg_match('/[^a-z]+/i',$lname)) 
{
$error[3]= "Enter a valid Surname..";
$code= "3" ;
}

if(empty($add1))
{
$error[4]="Enter Your Address..";
$code="4";
}

if(empty($email))
{
$error[5]="Enter Your E-Mail Address..";
$code="5";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
{
$error[5]= "Enter Valid Email Address..";
$codee= "5";
}


if(empty($mobile))
{
$error[6]="Enter Your Mobile Number..";
$code="6";
}


if(preg_match('/[^0-9]+/i',$mobile))
{
$error[6]= "Enter Valid Mobile Number..";
$code= "6";
}


/*if(preg_match('/[^0-11]+/i',$telephone))
{
$error[9]= "Enter Valid Telephone Number..";
$code= "9";
}*/


if(empty($dob))
{
$error[7]="Enter Your Birth Date..";
$code="7";
}

if(empty($py))
{
$error[8]="Enter Your Passing Year..";
$code="8";
}


if(preg_match('/[^0-9]+/i',$py))
{
$error[8]= "Enter a Valid Year..";
$code= "8";
}

$dby=date("Y",strtotime($dob));
$dbgy=$dby+15;
$current=date("Y");
if($py < $dbgy || $py > $current)
{
if(@$code!=8)
{
$error[20]="this Year is not valid";
$code="20";
}
}

if(($photo=='')) {
$error[10]= "Select Your Photo.";
$code= "10" ;
}

if(empty($perc))
{
$error[11]="Enter your percentage...";
$code="11";
}

if(preg_match('/[^.0-9]+/i',$perc))
{
$error[11]= "Enter a Valid percentage..";
$code= "11";
}

if(!isset($code))
{
if($photo!="")
{
if(move_uploaded_file ($tmppath, 'images/'.$photo))//image is a folder in which you will save image
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

		$source_photo = 'images/'.$photo;
                $phname=$fname.$lname;
		$dest_photo = 'images/'.$phname.'.jpg';
		$d = compress_image($source_photo, $dest_photo, 60);
		unlink("images/$photo");
		$photo=$phname.'.jpg';
		
	$birthDate = $agedob;
	$birthDate = explode("/", $birthDate);
	$age =(date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
	
	$a = mysql_query("INSERT INTO personal_detail (country_id, age , photo, first_name, middle_name, last_name, add1, add2, mobile_no, bld_grp, d_o_b, email_id, gender) VALUES ('$country', '$age', '$photo', '$fname', '$mname', '$lname', '$add1', '$add2', '$mobile', '$bg', '$dob', '$email', '$gender');",$link) or die (mysql_error());
	$sql="Select * from personal_detail order by id_no DESC";
	$r=mysql_query($sql,$link);
	$row=mysql_fetch_array($r);
	$id=$row['id_no'];
	$b = mysql_query("INSERT INTO education_detail (id_no, passing_year, edu_id ,perc) VALUES ('$id', '$py','$qualification', '$perc');",$link);
	if($b)
{
	$c = mysql_query("INSERT INTO experience_detail (id_no, experience, exp_detail, total_exp, key_skill) VALUES ('$id','$experience', '$exp_detail', '$total_exp', '$key_skill');",$link);
	if($c)
{
	header("location:appregsuc.php");
}
else
{
$da=mysql_query("DELETE From personal_detail where id_no='$id'") or die(mysql_error);
$db=mysql_query("DELETE From education_detail where id_no='$id'") or die(mysql_error);
}
}
else
{
$da=mysql_query("DELETE From personal_detail where id_no='$id'") or die(mysql_error);
}
}
}
}
}
?>


<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
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
			maxDate : "-18Y",
			minDate: "-60Y",
                        showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true,
			
		});
		$( "#jdatepicker").datepicker({
			altField: "#jalternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "-20Y",
			maxDate: "+0D +0M"
			});
	});
	</script>
</head>
<center>
<h2><big><b><u>Application Form</u></b></big></h2>
</center>

<body>
<center>
<table align="center">
<p>
<td colspan="4"><h2><u>Personal Details</u></h2>
<form name="PERSONAL_INFO.php" method="post"  align ="center" enctype="multipart/form-data">

<tr>
<td>Photo</td>
<td colspan="2"><input type="file" name="file"/> <?php if(isset($error[10])){?><span class="jekil"><?php echo "<br>".$error[10];} ?> </span></td>
</tr>

<tr>
<td>Name</td>
<td><input type="text" name="fname" maxlength="15"  placeholder="First name..." value="<?php if(isset($fname)){echo $fname;} ?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} ?></span></td>
<td><input type="text" name="mname" maxlength="15"  placeholder="Middle name..."value="<?php if(isset($mname)){echo $mname;} ?>"/> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} ?></span></td>
<td><input type="text" name="lname" maxlength="15"  placeholder="Last name..."value="<?php if(isset($lname)){echo $lname;} ?>"/> <?php if(isset($error[3])){?><span class="jekil"><?php echo "<br>".$error[3];} ?></span></td>
</tr>



<tr>
<td>Gender</td>
<td colspan="3"><select name="gender">
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</td>
</tr>

<tr>
<td rowspan="2">Address</td>
<td colspan="3"><input type="text" name="add1" size="50" maxlength="60" placeholder="Address line 1..." value="<?php if(isset($add1)){echo $add1;} ?>"/> <?php if(isset($error[4])){?><span class="jekil"><?php echo "<br>".$error[4];} ?></span></td>
</tr>


<tr>
<td colspan="3"><input type="text" name="add2" size="50" maxlength="40" placeholder="Address line 2..." value="<?php if(isset($add2)){echo $add2;} ?>"></td> 
</tr>


<tr>
<td>Country</td>
<td> <?php $query = "select country_id,country_name from country_master where delete_flag='0' order by country_name";
			$result = mysql_query($query,$link);
			$sb='<select name="country">';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['country_id'] . '>' . $row['country_name'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?> 
</td>
</tr>


<tr>
<td>E-Mail</td>
<td colspan="3"><input type="text" name="email" size="50" placeholder="Email address..."value="<?php if(isset($email)){echo $email;} ?>"/> <?php if(isset($error[5])){?><span class="jekil"><?php echo "<br>".$error[5];} ?></span></td>
</tr>



<tr>
<td>Mobile No.</td>
<td colspan="3"><input type="text" name="mobile" size=20 maxlength="10" placeholder="Mobile no...."value="<?php if(isset($mobile)){echo $mobile;} ?>"/> <?php if(isset($error[6])){?><span class="jekil"><?php echo "<br>".$error[6];} ?></span></td>
</tr>


<!--<tr>
<td>Telephone No.</td>
<td colspan="4"><input type="text" name="telephone" size=20 maxlength="12" placeholder="Telephone no...."value="<?php if(isset($telephone)){echo $telephone;} ?>"/> <?php if(isset($error[9])){?><span class="jekil"><?php echo "<br>".$error[9];} ?></span></td>
</tr>-->


<tr>
<td>Blood Group</td>
<td colspan="3"><select name="bg">
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
</select>
</td>
</tr>

<tr>
<td>Date Of Birth</td>
<td colspan="4"><input type="text" name="dob" id="datepicker" size="20" disabled="disabled" value="<?php if(isset($ddob)){ echo $ddob; } ?>" /> <?php if(isset($error[7])){?><span class="jekil"><?php echo "<br>".$error[7];} ?></span> 
<input type="text" hidden="true" id="alternate" size="47" name="dobb" value="<?php if(isset($dob)){echo $dob;} ?>"/> </td>
</tr>


<tr>

<td colspan="4"><h2><u>Educational Details</u></h2>

</tr>

<tr>
<td>Qualification</td>

<td colspan="3"><?php $query = "select edu_id,course_name from education_master";
			$result = mysql_query($query,$link);
			$id=3;
			$sb='<select name=qualification>';
			while ($row = mysql_fetch_assoc($result)) {
				if($row['edu_id']==$id)
				$sb.='<option value=' . $row['edu_id'] . ' Selected>' . $row['course_name'] . '</option>';
				else
				$sb.='<option value=' . $row['edu_id'] . '>' . $row['course_name'] . '</option>';
				
				}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
?>
</td>
</tr>

<tr>
<td>Percentage</td>
<td colspan="3"><input type="text" name="percentage" size=20 maxlength="5" placeholder="i.e.99.99"value="<?php if(isset($perc)){echo $perc;} ?>"/> % <?php if(isset($error[11])){?><span class="jekil"><?php echo "<br>".$error[11];} ?></span></td>
</tr>

<tr>
<td>Passing Year</td>
<td colspan="4"><input type="text" name="py" maxlength="4" placeholder="i.e.2013"value="<?php if(isset($py)){echo $py;} ?>"/> <?php if(isset($error[8])){?><span class="jekil"><?php echo "<br>".$error[8];} ?></span><?php if(isset($error[20])){?><span class="jekil"><?php echo "<br>".$error[20];} ?></span></td>
</tr>

<tr>

<td colspan="4"><h2><u>Experiance Details</u></h2>

</tr>

<tr>
<td>Experience</td>
<td colspan=4><input type="text" name="experience" size=44 placeholder="Company name..." value="<?php if(isset($experience)){echo $experience;} ?>"></td>
</td>
</tr>

<tr>
<td>Details</td>
<td colspan="3"><textarea name="exp_detail" rows="2" cols="35" placeholder="Details of experiance..."><?php if(isset($exp_detail)){echo $exp_detail;} ?></textarea ></td>
</tr>


<tr>
<td>Total Experience</td>
<td colspan="3"><select name="total_exp">
<option value="6_month">6 Month</option>
<option value="1_year">1 Year</option>
<option value="2_year">2 Year</option>
<option value="3_year">3 Year</option>
<option value="4_year">4 Year</option>
<option value="5_year">5 Year</option>
<option value="6_year">6 Year</option>
<option value="7_year">7 Year</option>
<option value="8_year">8 Year</option>
<option value="9_year">9 Year</option>
<option value="10_year">10 Year</option>



</select>
</td>
</tr>


<tr>
<td>Key Skills</td>
<td colspan="3"><textarea name="key_skill" rows="2" cols="35" placeholder="Details of key skills..."><?php if(isset($key_skill)){echo $key_skill;} ?></textarea ></td>
</tr>


<tr>
<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit"  value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Clear" ></td>
</tr>



</p>
</table>
</form>
</center>
</body>
</html>					