<?php 
include("../connect.php");
$eventid=$_REQUEST['eventid'];
$q1="DELETE FROM event_master WHERE event_id ='$eventid';";
$result=mysql_query($q1,$link);
if(mysql_affected_rows()>0)
{
$q2="Select * from event_image_master where event_id='$eventid'";
$result1=mysql_query($q2,$link);
while($row=mysql_fetch_array($result1))
{
$img=$row['event_photo'];
unlink("../images/events/$img");
}
$q3="Delete from event_image_master where event_id='$eventid'";
$result2=mysql_query($q3,$link);
if(mysql_affected_rows())
{
header("location:../admin_manage_events.php");
}
else 
{
echo "Error to delete Event Images";
}
}
else 
{
echo "Error to delete Event";
}
?>