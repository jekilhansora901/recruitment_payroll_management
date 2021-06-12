<?php 
include("../connect.php");
$desgcode=$_REQUEST['desgcode'];
$q1="UPDATE desg_detail SET delete_flag = '0' WHERE desg_code ='$desgcode';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_desg_master.php");
}
else 
{
echo "Error to Recover designation.";
}
?>