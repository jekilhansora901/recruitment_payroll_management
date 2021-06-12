<?php 
include("../connect.php");
$empcode=$_REQUEST['empcode'];
$image=$_REQUEST['photo'];
$q1="DELETE FROM emp_personal_detail WHERE emp_code='$empcode'";
$result=mysql_query($q1,$link);
if($result)
{
$q1="DELETE FROM login_master WHERE emp_code='$empcode'";
$result=mysql_query($q1,$link);
if($result)
{
unlink("../images/$image");
header("location:../adminemplist.php");
}
}
else 
{
echo "Error to Deactivate Employee.";
}
?>