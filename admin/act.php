<?php 
include("../connect.php");
$empcode=$_REQUEST['empcode'];
$q1="UPDATE emp_personal_detail,login_master SET login_master.active_flag=1,emp_personal_detail.active_flag=1 WHERE emp_personal_detail.emp_code='$empcode' AND login_master.emp_code='$empcode' ;";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../adminemplist.php");
}
else 
{
echo "Error to Activate Employee.";
}
?>