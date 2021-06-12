<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<?php
session_start();
?>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="loginslider.css" rel="stylesheet" type="text/css" <!--/>
		<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>-->
		<link rel="stylesheet" href="jquery.ui.all.css">
			<script src="jquery-1.7.1.js"></script>
			<script src="jquery.ui.core.js"></script>
			<script src="jquery.ui.widget.js"></script>
			<script src="jquery.ui.datepicker.js">
			
			$(function() {
				$( "#datepicker" ).datepicker({
					altField: "#alternate",
					altFormat: "DD, d MM, yy"
				});
				$( "#jdatepicker").datepicker({
					altField: "#jalternate",
					altFormat: "DD, d MM, yy"
				});
			});
		</script>


<title>Employee Registration</title>
</head>
<body>
	<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("loginpanel.php");
			include("menu.php");	   			
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
          			
          			<p>We'd love to hear from you. Call us, <a href="#">email us</a> or complete our <a href="contact.php">contact form</a>.</p>
        		</div>
      		</div>
      
		<div id="content">
            		
			<div id="content_item">
<?php
include("empreg/registration.php");
?>
			</div>
      		</div>
   	 </div>
	
		<footer>
      			<?php
				include("footer.php");
				?>
      		</footer>
	</div>

<!--  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>-->
</body>

</html>
