<?php 
include("../connect.php");
$desgcode=$_REQUEST['desgcode'];
$q1="DELETE FROM desg_detail WHERE desg_code ='$desgcode';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_desg_master.php");
}
else 
{
echo "Error to delete designation";
}
?>