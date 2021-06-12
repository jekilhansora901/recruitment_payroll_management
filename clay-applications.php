<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<?php
session_start();
?>
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
				<div class="sublink">
					<a href="product.php">Products</a>
                    <a href="clay-catalyst.php">></a>
                    <a href="clay-catalyst.php">Clay Catalyst</a>
                    <a href="clay-applications.php">></a>
                    <a href="clay-applications.php">Applications</a>
					</div>

          <div class="content_inner">
            <div class="headings2">Abrasive Resistance</div>
            <p>Actal is a granular clay catalyst with improved resistance to attrition. According to standard test method, attrition is in the range of 1-3 %.</p>
            <div class="headings2">Applications of Actal</div>
            <p>Actal is designed for Olefin removal from BTX. ACTAL 20X is the most efficient clay catalyst in the market for the selective removal of olefins from Benzene/Toluene and Heavy Reformate (mainly Xylenes). Other grades of ACTAL are available for selective removal of N from Benzene feeds used in zeolite based processes for Ethyl benzene. Cumene and Phenol.</p>
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
