<?php
$date='31-1-2013';
$leave='2013-02-09';
$jekil=date(strtotime($date))+(5*24*60*60);
echo "<br>".date('Y-m-d',$jekil);
for($i=1;$i<6;$i++)
{
$jekil=date(strtotime($date))+($i*24*60*60);

$dd=date('Y-m-d',$jekil);
echo "<br>".$dd;
if($leave==$dd)
$msg = "Mujje Haqqq Heeeeee";

}
if(isset($msg))
{
	echo "Tanne Haqqqq j Natthiiii";
	echo "<br>".$msg;
}
else
{
	echo "Hal ne Bagichaa ma dekhadu bhaag 2";
}
?>
