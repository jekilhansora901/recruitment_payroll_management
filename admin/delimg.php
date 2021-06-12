<?php 
include("../connect.php");
$image=$_REQUEST['photo'];
$q1="DELETE FROM slideshow_master WHERE img='$image'";
$result=mysql_query($q1,$link);
if($result)
{
unlink("../images/slideshow/$image");
header("location:../admin_slide_image.php");
}
else 
{
echo "Error to Deleting Images";
}
?>