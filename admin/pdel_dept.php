<?php 
include("../connect.php");
$deptcode=$_REQUEST['deptcode'];
$q1="DELETE FROM department_detail WHERE dept_code ='$deptcode';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_dept_master.php");
}
else 
{
echo "Error to delete department";
}
?>