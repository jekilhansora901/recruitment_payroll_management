<?php 
include("../connect.php");
$concode=$_REQUEST['concode'];
$q1="UPDATE country_master SET delete_flag = '1' WHERE country_id ='$concode';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_country_master.php");
}
else 
{
echo "Error to delete Country";
}
?>