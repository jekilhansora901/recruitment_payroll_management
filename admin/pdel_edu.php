<?php 
include("../connect.php");
$educode=$_REQUEST['educode'];
$q1="DELETE FROM education_master WHERE edu_id ='$educode';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_edu_master.php");
}
else 
{
echo "Error to delete course name";
}
?>