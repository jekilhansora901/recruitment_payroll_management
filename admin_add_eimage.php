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
$eventid=$_REQUEST['eventid'];
if(isset($_POST['cbtn']))
{
header("location:admin_edit_events.php?eventid=$eventid");
}
if(isset($_POST['btn']))
{

for($a=1;$a<=5;$a++)
{
	$img[$a]=$_FILES['file'.$a];
	$name[$a]=$img[$a]['name'];
	$type[$a] = $img[$a]['type'];
	$size[$a] = $img[$a]['size'];
	$tmp_path[$a] = $img[$a]['tmp_name']; 
	echo $name[$a];
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
			
			$q="select * from event_image_master where event_id='$eventid' order by sr_no DESC";
			$r=mysql_query($q,$link);
			$row=mysql_fetch_array($r);
			$phname=$row['sr_no'];
			$phname=$phname+2;
for($a=1;$a<=5;$a++,$phname++)
{
	if($name[$a]!="")
	{
		$name1=$name[$a];
		$tmppath=$tmp_path[$a];
	if(move_uploaded_file ($tmppath, 'images/events/'.$name1))//image is a folder in which you will save image
	{
			

			$source_photo = 'images/events/'.$name1;
			$dest_photo = 'images/events/'.$eventid."event".$phname.'.jpg';
			$d = compress_image($source_photo, $dest_photo, 60);
			unlink("images/events/$name1");
			$name1=$eventid."event".$phname.'.jpg';
			$insert="INSERT INTO event_image_master (sr_no, event_id, event_photo) VALUES (NULL, '$eventid', '$name1');";
			$result=mysql_query($insert,$link);
			if($result)
			{
			$msg="<span id='actemp'>Image Insert Successfully.</span>";
			header("location:admin_edit_events.php?eventid=$eventid");
			}
			else
			{
			$msg="<span id='deaemp'>".mysql_error()."Something going wrong.</span>";
			}
	}
	}
}
}
?>

<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="loginslider.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("loginpanel.php");
			include("adminmenu.php");
			?>
		</header>
    
		<div id="site_content">
		<div id="content">
				<div id="content_item">
          <div class="content-inner">
			<center>
			<form method="POST" action="" enctype="multipart/form-data">
			<?php
			echo "<table>";
			for($i=1;$i<=5;$i++)
			{
			echo "<tr>";
			echo "<td>Select Image $i</td>";
			echo "<td><input type='file' name='file$i'></td>";
			echo "</tr>";
			}	
				echo "<tr>";
				echo "<td />";
				echo "<td><input type='submit' name='btn' value='Insert'>";
				echo "     <input type='submit' name='cbtn' value='Cancel'>";
				echo "<br>";
				if(isset($msg))
				{
					echo $msg;
				}
				echo "</td>";
				echo "</tr>";
			echo "</table>";
			?>
			</form>
			</center>
							
          </div>
          <!-- InstanceEndEditable --></div>
 
 </div>
      		</div>
		</div>
	
		<div id="footer">
      			<?php
				include("footer.php");
				?>
      	</div>
	</div>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>

</body>

</html>

