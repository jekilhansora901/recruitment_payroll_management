<?php
require 'connect.php';
session_start();
if(!($_SESSION['admin']))
{
	header("location:adminlogin.php");
}
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location:index.php");
	exit;
}


if(isset($_POST['add']))
{
$eventname=trim(mysql_real_escape_string($_POST['eventname']));
$doe=trim(mysql_real_escape_string($_POST['doee']));
$ddoe=trim(mysql_real_escape_string($_POST['doe']));
$desc=trim(mysql_real_escape_string($_POST['desc']));
for($a=1;$a<=5;$a++)
{
	$img[$a]=@$_FILES['file'.$a];
	$name[$a]=$img[$a]['name'];
	$type[$a] = $img[$a]['type'];
	$size[$a] = $img[$a]['size'];
	$tmp_path[$a] = $img[$a]['tmp_name'];
}
function compress_image($source_url, $destination_url, $quality) 
			{
				$info = getimagesize($source_url);
				if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
				elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
				elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
				//save it
				imagejpeg($image, $destination_url, $quality);
				//return destination file url
				return $destination_url;
			}
$error=array();
for($i=1;$i<30;$i++)
{
$error[$i]="";
}
if(empty($eventname)) {
$error[1]= "Enter name of Event";
$code= "1" ;
}
if(empty($doe)) {
$error[2]= "Select Date";
$code= "2" ;
}
if(isset($code))
{
}
else
{
$insert = "INSERT INTO event_master (event_id, event_name, date, event_desc) VALUES (null, '$eventname', '$doe', '$desc');";
$result=mysql_query($insert,$link);
if($result)
{
$sel="select * from event_master order by event_id DESC";
$result=mysql_fetch_array(mysql_query($sel,$link));
$id=$result['event_id'];

for($a=1;$a<=5;$a++)
{
	
	if($name[$a]!="")
	{
		$name1=$name[$a];
		$tmppath=$tmp_path[$a];
	if(move_uploaded_file ($tmppath, 'images/events/'.$name1))//image is a folder in which you will save image
	{
			

			$source_photo = 'images/events/'.$name1;
			$dest_photo = 'images/events/'.$id.'event'.$a.'.jpg';
			$d = compress_image($source_photo, $dest_photo, 60);
			unlink("images/events/$name1");
			
			$name1=$id.'event'.$a.'.jpg';
			$insert="INSERT INTO event_image_master (sr_no, event_id, event_photo) VALUES (NULL, '$id', '$name1');";
			$result=mysql_query($insert,$link);
			if($result)
			{
			$msg="<span id='actemp'>Image Insert Successfully.</span>";
			}
			else
			{
			$msg="<span id='deaemp'>".mysql_error()."Something going wrong.</span>";
			}
	}
	}
		echo"No Image";
}
$msg="<span id=actemp>Event Inserted Successfully</span>";
header("location:admin_new_events.php");
$msg="<span id=actemp>Event Inserted Successfully</span>";

}
else
{
echo "<br>".mysql_error();
echo "Something going wrong.";
}
}
}
if(isset($_POST['can']))
{
	header("location:admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery.ui.all.css">

	<script src="jquery-1.7.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<script language="javascript">
	$(function() {
		$( "#datepicker").datepicker({
			altField: "#alternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "-20Y",
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true
			});
		
	});
	</script>

</head>

<body>
<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			include("adminmenu.php");
			?>
		</header>
   
		<div id="site_content" style="background: #eae5e5;">
			<div id="sidebar_container">
        		<div class="sidebar">
          			<?php
    			      	include("latest_news.php");
       		   		?>
       	 		</div>
        	
				<div class="sidebar">
          			
          			<p>We'd love to hear from you. Call us, <a href="#">email us</a> or complete our <a href="contact.php">contact form</a>.</p>
       		</div>
      		</div>
			<div id="content">
				<div id="content_item">
         
			<form method="POST" action="" enctype="multipart/form-data">
			<center>
			<h2>Add Events</h2>
		  	<table>
			<tr>
			<td>Enter Event Name</td>
			<td><input type="text" name="eventname" size="37" value="<?php if(isset($eventname)){echo $eventname;} ?>"/> </td>
			<td><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];}?></span></td>
			</tr>
			<tr>
			<td>Event Date</td>
			<td><input type="text" name="doe" id="datepicker" disabled="disabled" size="20" value="<?php if(isset($ddoe)){echo $ddoe;} ?>" /></td>
			<td> <?php if(isset($error[2])){?><span class="jekil"><?php echo "<br>".$error[2];} ?></span>
			<input type="text" hidden="true" id="alternate" size="47" name="doee" value="<?php if(isset($doe)){echo $doe;} ?>"/></td>
			</tr>
			<tr>
			<td valign=top>Event Description</td>
			<td><textarea name="desc" cols=30 rows=8 /><?php if(isset($desc)){echo $desc;} ?></textarea></td>
			</tr>
			<tr>
			<td valign="top" rowspan=5>Event Images</td>
			<?php
			for($i=1;$i<=5;$i++)
			{
			echo "<td><input type='file' name='file$i'></td>";
			echo "</tr>";
			echo "<tr>";
			}
			?>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<input type="submit" name="add" value="Add">
			<input type="submit" name="can" value="Cancel">
			</td>
			</tr>
			</table>
			<?php
			if(isset($msg))	echo $msg;
			?>
			</center>
			</form>
 <!-- InstanceEndEditable --></div>
 
 
 </div>
      		</div>
			<div id="footer">
      			<?php
				include("footer.php");
				?>
      	</div>
	</div>
</body>
</html>


