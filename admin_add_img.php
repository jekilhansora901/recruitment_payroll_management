<?php
include("connect.php");
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

if(isset($_POST['btn']))
{
if(isset($_GET['addmore']))
	$i=10;
else
	$i=5;
for($a=1;$a<=$i;$a++)
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
			$q="select * from slideshow_master";
			$r=mysql_query($q,$link);
			$no=0;
			if($r)
			{
			while($row = mysql_fetch_array($r))
			{
				$no++;
			}
			$no++;
			}
			else
			{
				$no=1;
			}
			
for($a=1;$a<=$i;$a++)
{
	if($name[$a]!="")
	{
		$name1=$name[$a];
		$tmppath=$tmp_path[$a];
	if(move_uploaded_file ($tmppath, 'images/slideshow/'.$name1))//image is a folder in which you will save image
	{
			

			$source_photo = 'images/slideshow/'.$name1;
			$dest_photo = 'images/slideshow/'.$no.'.jpg';
			$d = compress_image($source_photo, $dest_photo, 60);
			unlink("images/slideshow/$name1");
			$name1=$no.'.jpg';
			$insert="INSERT INTO slideshow_master (sr_no, img) VALUES (NULL, '$name1');";
			$result=mysql_query($insert,$link);
			$no++;
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
}
}
?>
<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />



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
      		<div id="sidebar_container">
        		<div class="sidebar">
          			<?php
    			      	include("latest_news.php");
       		   		?>
       	 		</div>
        	
				<div class="sidebar">
          			
       		</div>
      		</div>
      
			<div id="content">
				<div id="content_item">
          <div class="content-inner">
		  <center>
			<form method="POST" action="" enctype="multipart/form-data">
			<h2>Slide Show Image Upload</h2>
			<?php
			echo "<table>";
			for($i=1;$i<=5;$i++)
			{
			echo "<tr>";
			echo "<td>Select Image $i</td>";
			echo "<td><input type='file' name='file$i' accept='image/jpeg' accept='image/gif' accept='image/x-png'></td>";
			echo "</tr>";
			}
			if(isset($_GET['addmore']))
			{
				for($i=6;$i<=10;$i++)
				{
				echo "<tr>";
				echo "<td>Select Image $i</td>";
				echo "<td><input type='file' name='file$i'></td>";
				echo "</tr>";
				}
			}
			else
			{
				echo "<tr>";
				
				echo "<td><a href='?addmore'>Add More</a></td>";
				
			}
				
				echo "<td><a href='admin_slide_image.php'>Show All Images</a></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td />";
				echo "<td><input type='submit' name='btn' value='Insert'>";
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
