<?php
include("connect.php");
session_start();
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
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
	<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("loginpanel.php");
			
			if(!(@$_SESSION['admin']))
			{
				include("menu.php");
			}
			else
			{
				include("adminmenu.php");
			}
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
			<?php
				include("connect.php");
				//$newsid=$_REQUEST['id'];
				$sql="select * from event_master ORDER BY  event_id DESC";
				$query=mysql_query($sql,$link);
				$no_row=mysql_num_rows($query);
				$n=0;
				if($no_row>0)
				{
				
					if(isset($_GET['id']))
					{
					$eventid=$_REQUEST['id'];
					$sql="select * from event_master where event_id='$eventid'";
					$query=mysql_query($sql,$link);
					$row=mysql_fetch_array($query);
					echo "<center><h2>Events</h2></center>";
					echo "<table align=center>";
					echo "<tr>";
					echo "<th width=15%>".date('d/m/Y',strtotime($row['date']))."</th>";
					echo "<th width=85% colspan=3>".$row['event_name']."</th>";
					echo "</tr>";
					$sel="select * from event_image_master where event_id='$eventid'";
					$result=mysql_query($sel,$link);
					$no=mysql_num_rows($result);
					$nrows = $no / 3;
					$cur = 0;
					while($cur <= $nrows+1)
					{
					echo "<tr>";
					echo "<td />";
					$i=0;
					while($rows=mysql_fetch_array($result))
					{
						echo "<td><a href=images/events/".$rows['event_photo']."><img src=images/events/".$rows['event_photo']." height=140 width=180 ></a></td>";
					$i++;
					if($i==3)
						break;
					}
					$cur++;
					echo "</tr>";
					}
					echo "</tr>";
					echo "<tr>";
					echo "<th width=20%>Detail</th>";
					echo "<td colspan=5>".$row['event_desc']."</td>";
					echo "</tr>";
					echo "</table>";
					echo "<center><h4><br><a href='?showall'>Show All Events</a></h4></center>";
					}
					if(isset($_GET['showall']))
					{
						echo "<center><h2>Events</h2></center>";
						echo "<table align=center>";
						
						while($row=mysql_fetch_array($query))
						{
						echo "<tr>";
						echo "<th width=15%>".date('d/m/Y',strtotime($row['date']))."</th>";
						echo "<th width=85% colspan=3>".$row['event_name']."</th>";
						echo "</tr>";
						$eventid=$row['event_id'];
						$sel1="select * from event_image_master where event_id='$eventid'";
						$result1=mysql_query($sel1,$link);
						$no=mysql_num_rows($result1);
						$nrows = $no / 3;
						$cur = 0;
						while($cur <= $nrows+1)
						{
						echo "<tr>";
						echo "<td />";
						$i=0;
						while($rows=mysql_fetch_array($result1))
						{
							echo "<td><a href=images/events/".$rows['event_photo']."><img src=images/events/".$rows['event_photo']." height=140 width=180 ></a></td>";
						$i++;
						if($i==3)
							break;
						}
						$cur++;
						echo "</tr>";
						}
						echo "</tr>";
						
						echo "<tr>";
						echo "<td />";
						echo "<td colspan=3>".$row['event_desc']."</td>";
						echo "</tr>";
						}
						echo "</table>";
					}
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
