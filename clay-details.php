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
                    <a href="clay-details.php">></a>
                    <a href="clay-details.php">Details</a>
					</div>
          <div class="content-inner">
            <div class="headings2">What is Actal ?</div>
            <p>Actal is a clay catalyst. Clays are also known to act as radical catalysts. Modified smectite (swelling) clays can be very selective catalysts 
			for a wide range of organic transformations.</p>
            <p>Actal a catalyst and adsorbent provides improved process unit economics, superior product quality and reliable performance in fixed bed 
			purification of aromatics. Effectively removes olefins that can contaminate downstream adsorption and catalytic units. Longer bed cycles are 
			achieved as a result of its high catalytic activity, high acidity, and unique surface chemistry. Helps meet stringent Bromine Index and Acid 
			Wash Color product specifications. Good physical integrity minimizes particle breakdown during vessel loading and unit operations.</p>
          </div>
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
