<?php
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

<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css">
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
		
			<div id="content">
				<div id="content_item">
					<?php
						include("empreg/add_new_news.php");
					?>
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