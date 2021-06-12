<?php
session_start();
/*if($_SESSION['admin'])
{
	$_SESSION = array();
	session_destroy();
} 
else
{
	header("location:adminlogin.php");
}*/
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
        	
				
      		</div>
			<div id="content">
				<ul class="slideshow">
						  <?php 
						  include("connect.php");
						  $sql="select * from slideshow_master;";
							$query=mysql_query($sql,$link);
							$no_row=mysql_num_rows($query);
							if($no_row>0)
							{
								
								while($row=mysql_fetch_array($query))
								{
								$photo=$row['img'];
								echo "<li class='show'><img width='725' height='316' src='images/slideshow/$photo' alt='$photo' /></li>";
							}
							}
							?>
						</ul>		
				<div id="content_item">
					<div class="content-inner">
					<h1> Welcome To Ashapura Volclay Pvt. Ltd. </h1>
					
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
