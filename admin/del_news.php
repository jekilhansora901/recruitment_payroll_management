<?php 
include("../connect.php");
$newsid=$_REQUEST['newsid'];
$q1="DELETE FROM news_master WHERE news_id ='$newsid';";
$result=mysql_query($q1,$link);
if($result)
{
header("location:../admin_edit_news.php");
}
else 
{
echo "Error to delete news";
}
?>