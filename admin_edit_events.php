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
			<?php
				include("connect.php");
				$eventid=$_REQUEST['eventid'];
				$sql="select * from event_master where event_id='$eventid'";
				$query=mysql_query($sql,$link);
				$no_row=mysql_num_rows($query);
				$n=0;
				if($no_row>0)
				{
					echo "<center>";
					echo "<h2>Events</h2>";
					echo "<table align=center>";
					$row=mysql_fetch_array($query);
					$date=$row['date'];
					$ename=$row['event_name'];
					echo "<th width=20%>$date</th>";
					echo "<th colspan=4 width=70%>$ename</th>";
					$sel="select * from event_image_master where event_id='$eventid'";
					$result=mysql_query($sel,$link);
					$no=mysql_num_rows($result);
					$nrows = $no / 4;
					$cur = 0;
					while($cur <= $nrows+1)
					{
					echo "<tr>";
					echo "<td />";
					$i=0;
					while($rows=mysql_fetch_array($result))
					{
						echo "<td><a href=images/events/".$rows['event_photo']."><img src=images/events/".$rows['event_photo']." height=140 width=180 ></a>";
						$photoname=$rows['event_photo'];
						echo "<center><a href=?eventid=$eventid&delete=$photoname>Delete</a></center></td>";
					$i++;
					if($i==4)
						break;
					}
					if($cur==intval($nrows))
					{
					echo "<td><a href=admin_add_eimage.php?eventid=$eventid><img src=images/add_image.png></a></td>";
					}
					$cur++;
					echo "</tr>";
					}
					if(isset($_GET['delete']))
					{
						$photo=$_REQUEST['delete'];
						$del="DELETE from event_image_master where event_photo='$photo'";
						$r=mysql_query($del,$link);
						if(mysql_affected_rows()>0)
						{
							unlink("images/events/$photo");
							header("location:admin_edit_events.php?eventid=$eventid");
						}
						else
						{
							die(mysql_error());
						}
					}
					echo "</tr>";
					echo "<tr>";
					echo "<th width=20%>Detail</th>";
					echo "<td colspan=4>".$row['event_desc']."</td>";
					echo "</tr>";

					echo "</table>";
					echo "</center>";
				}
			?>
							
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

