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
                    <a href="bleaching-earth.php">></a>
                    <a href="bleaching-earth.php">Bleaching Earth</a>
                    <a href="bleaching-application.php">></a>
                    <a href="bleaching-application.php">Applications</a>
					</div>
			<div class="content_inner">
				<p><b>Broadly speaking Bleaching Earth finds use in following fields</b></p>
				<div class="bullet1">
				  <ul>
					<li>Refining of Vegetable oils </li>
					<li>Refining of hydrogenated Vanaspati ghee oils, Margarine & shortening </li>
					<li>Refining of Animal Fats like tallow oil, fish oil, lard oil </li>
					<li>Refining of Mineral Oils like  
					  <ul>
						<li>Insulating oil</li>
						<li>Rolling oil </li>
						<li>Lube oil </li>
						<li>Waste oil </li>
						<li>Industrial triglycerides and fatty acids used for paints, varnishes and soaps </li>
						<li>Paraffins and Waxes </li>
					  </ul>
					</li>
					<li>Decolourising by removing colour pigments like carotenoids, chlorophyll, Pheophytine </li>
					<li>Removal of gums (phospholipids), FFA and soap contents and traces of heavy metals in vegetable oils </li>
					<li>Reducing and Controlling different oil parameters like Peroxide value, Anisidine value,
	 UV-absorption value.FFA contents etc.</li>
					<li>Purification of Aromatic Compounds in case of mineral oils & waxes and removal of Sulphuric acid, Tars acid, Sludge, Sulfonic acid etc. </li>
					<li>Other Applications like 
					  <ul>
						<li>Bleaching of Sulphur </li>
						<li>In Effluent treatment plants</li>
					  </ul>
					</li>
				  </ul>
				</div>
			  </div>
          <!-- InstanceEndEditable -->
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
