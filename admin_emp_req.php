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
<form method="post" action="approve.php">
<center>
<?php
$c=0;
$sql="select * from emp_personal_detail,department_detail,desg_detail where active_flag=0 AND emp_personal_detail.dept_code=department_detail.dept_code AND emp_personal_detail.desg_code=desg_detail.desg_code";
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
	$empcode=$row['emp_code'];
	$logsel="select * from login_master where emp_code='$empcode'";
	$resultt=mysql_query($logsel,$link);
	$no=mysql_num_rows($resultt);
	if(!$no>0)
	{
	echo "<tr>";
		echo "<td rowspan=6 width=15>";
			$i++;
			echo "$i";
		echo "</td>";
		echo "<td rowspan=6 align=center width=15 valign=middle>";
			echo "<input type=checkbox name=check_emp[] value=".$row['emp_id'].""; 
		echo "</td>";
		
		echo "<td rowspan=6 valign=top>";
			$image=$row ['emp_photo'];
			?>
				<img src="images/<?php echo $image; ?>" height="162" width="126" />
			<?php
		echo "</td>";
		echo "<td width=93>";
			$empname=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo "Name";
		echo "</td>";
		echo "<td width=155>";
			echo ": $empname";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			$empcode=$row['emp_code'];
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
			$doj=$row['date_join'];
			echo "Date Of Join";
		echo "</td>";
		echo "<td>";
			echo ": $doj";
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
	$c=1;
	}
	else
	{
		
	}
}
?>
</table>
<input type="submit" value="Approve" name="btn"> <input type="submit" value="Disapprove" name="cbtn">
<?php
if($c!=1)
		{
			echo "<br>Sorry  There are no employee notification";
			$c=0;
		}
}
else
{
	echo "<center>Sorry ! There is no Employee Request for Approve.";
	echo "<br>Thank You !</center>";
}
?>
</center>
</body>
</html>