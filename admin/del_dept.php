<?php 
include("../connect.php");
$deptcode=$_REQUEST['deptcode'];
$q1="UPDATE department_detail SET delete_flag = '1' WHERE dept_code ='$deptcode';";
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