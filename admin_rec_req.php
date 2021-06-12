<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Approving</title>
<?php
require 'connect.php';
?>
</head>

<body>
<form method="post" action="rec_approve.php">
<center>
<?php
$c=0;
$sql="select * from personal_detail,experience_detail,education_master,education_detail,country_master where personal_detail.approve_flag=0 AND personal_detail.country_id=country_master.country_id AND education_detail.edu_id=education_master.edu_id AND personal_detail.id_no=experience_detail.id_no AND personal_detail.id_no=education_detail.id_no";
$query=mysql_query($sql,$link);
$no_row=mysql_num_rows($query);
if($no_row>0)
{
	$i=0;
	echo "<table align=center>";
	echo "<th>Sr.<br>No.</th>";
	echo "<th>Approve</th>";
	echo "<th>Photo</th>";
	echo "<th colspan=2>Details</th>";

while($row=mysql_fetch_array($query))
{
	echo "<tr>";
	$expd=$row['exp_detail'];
	if(empty($expd))
	{
		$rowss=11;
	}
	else
	{
		$rowss=15;
	}
		echo "<td rowspan=$rowss width=15 valign=top>";
			$i++;
			echo "$i";
		echo "</td>";
		echo "<td rowspan=$rowss align=center width=15 valign=top>";
			echo "<input type=checkbox name=check_app[] value=".$row['id_no'].""; 
		echo "</td>";
		
		echo "<td rowspan=6 valign=top>";
			$image=$row ['photo'];
			?>
				<img src="images/<?php echo $image; ?>" height="162" width="126" />
			<?php
		echo "</td>";
		echo "<td width=93>";
			$appname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo "Name";
		echo "</td>";
		echo "<td width=155>";
			echo ": $appname";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			$email=$row['email_id'];
			echo "Email";
		echo "</td>";
		echo "<td width=250>";
			echo ": $email";
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
			$bld=$row['bld_grp'];
			echo "Blood Group";
		echo "</td>";
		echo "<td>";
			echo ": $bld";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			$gender=$row['gender'];
			echo "Gender";
		echo "</td>";
		echo "<td>";
			echo ": $gender";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			$country=$row['country_name'];
			echo "Country";
		echo "</td>";
		echo "<td>";
			echo ": $country";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td rowspan=2 valign=top>";
		$add1=$row['add1'];
		echo "Address";
	echo "</td>";
	echo "<td colspan=2>";
	echo ": $add1";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=2>";
		$add2=$row['add2'];
		echo ": $add2";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td rowspan=3 valign=top>";
		$course=$row['course_name'];
		echo "<b>Qualification</b>";
	echo "</td>";
	echo "<td>";
		echo "Course";
	echo "</td>";
	echo "<td>"	;
		echo ": $course";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
		$perc=$row['perc'];
		$py=$row['passing_year'];
		echo "Percentage";
	echo "</td>";
	echo "<td colspan=2>";
		echo ": $perc";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
		echo "Passing year";
	echo "</td>";
	echo "<td colspan=2>";
		echo ": $py";
	echo "</td>";
	echo "</tr>";
	
	if(!empty($expd))
	{
	echo "<tr>";
	echo "<td rowspan=4 valign=top>";
		$exp=$row['experience'];
		echo "<b>Experience</b>";
	echo "</td>";
	echo "<td>";
		echo "Company";
	echo "</td>";
	echo "<td>"	;
		echo ": $exp";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
		$expd=$row['exp_detail'];
		$totalexp=$row['total_exp'];
		$keyskill=$row['key_skill'];
		echo "Detail";
	echo "</td>";
	echo "<td colspan=2>";
		echo ": $expd";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
		echo "Total Exp.";
	echo "</td>";
	echo "<td colspan=2>";
		echo ": $totalexp";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>";
		echo "Key Skill";
	echo "</td>";
	echo "<td colspan=2>";
		echo ": $keyskill";
	echo "</td>";
	echo "</tr>";
	}
	}
?>
</table>
<input type="submit" value="Approve" name="btn"> <input type="submit" value="Disapprove" name="cbtn"> <input type="submit" value="Set Mail Body" name="mail">
<?php
}
else
{
	echo "<center>Sorry ! There is no new application for Approve.";
	echo "<br>Thank You !</center>";
}
?>
</center>
</body>
</html>