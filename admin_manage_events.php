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
				$sql="select * from event_master ORDER BY  event_id DESC";
				$query=mysql_query($sql,$link);
				$no_row=mysql_num_rows($query);
				$n=0;
				if($no_row>0)
				{
					echo "<center>";
					echo "<h2>Event Master</h2>";
					echo "<table align=center>";
					/*echo "<th width=6%>Sr No.</th>";
					echo "<th width=6%>News Id</th>";*/
					echo "<th width=20%>Date</th>";
					echo "<th width=70%>Event Name</th>";
					echo "<th width=10%>Delete</th>";
					while($row=mysql_fetch_array($query))
					{
						$n++;
						echo "<tr>";
						/*echo "<td valign=top>";
							echo $n;
						echo "</td>";
						echo "<td align='center' valign=top>";
							*/
							$eventid=$row['event_id'];
							/*echo $eventid;
						echo "</td>";*/
						echo "<td valign=top>";
						$date=$row['date'];
							echo $date;
						echo "</td>";
						echo "<td valign=top>";
							$ename=$row['event_name'];
							echo "<a href=admin_edit_events.php?eventid=$eventid>$ename</a>";
						echo "</td>";
						echo "<td valign=top>";
						echo "<a href=\"admin/del_event.php?eventid=$eventid\">"."Delete"."</a>";
						echo "</td>";
						echo "</tr>";
					}

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
