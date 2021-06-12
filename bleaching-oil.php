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
                    <a href="bleaching-oil.php">></a>
                    <a href="bleaching-oil.php">Oils</a>
					</div>
          <div class="content_inner">
            <p>Cooking oil is purified fat of plant origin, which is usually liquid at room temperature (saturated oils such as coconut and palm are more solid at room temperature than other oils).</p>
            <p>Some of the many different kinds of edible vegetable oils include: olive oil, palm oil, soybean oil, canola oil, pumpkin seed oil, corn oil, sunflower oil, safflower oil, peanut oil, grape seed oil, sesame oil, argan oil and rice bran oil. Many other kinds of vegetable oils are also used for cooking.</p>
            <p>The generic term "vegetable oil" when used to label a cooking oil product may refer to a specific oil (such as rapeseed oil) or may refer to a blend of a variety of oils often based on palm, corn, soybean or sunflower oils.</p>
            <div class="headings2">List of vegetable oils</div>
			<p>The list of vegetable oils includes all vegetable oils that are extracted from plants. There are three methods for removing the oil. The relevant part of the plant may be placed under pressure to "extract" the oil, giving an expelled oil. Oils may also be extracted from plants by dissolving parts of plants in water or another solvent. The solution may be separated from the plant material and concentrated, giving an extracted or leached oil. The mixture may also be separated by distilling the oil away from the plant material. Oils extracted by this latter method are called essential oils. Essential oils often have different properties and uses than pressed or leached vegetable oils. Macerated oils are made by infusing parts of plants in a base oil a process known as maceration. Although most plants contain some oil, only the oil from certain major oil crops complemented by a few dozen minor oil crops is widely used and traded. These oils are one of several types of plant oils.</p>
            <div class="headings2">Vegetable oils can be classified in several ways, for example</div>
            <div class="bullet1">
				<ul>
					<li><b>By source :</b> most, but not all vegetable oils are extracted from the fruits or seeds of plants, and the oils may be classified by grouping oils from similar plants, such as "nut oils".</li>
					<li><b>By use :</b> oils from plants are used in cooking, for fuel, for cosmetics, for medical purposes, and for other industrial purposes.</li>
				</ul>
			</div>
			<div class="headings2">The Major vegetable oils are mentioned below</div>
			<div class="bullet1">
				<ul>
					<li>Coconut oil</li>
					<li>Corn oil </li>
					<li>Cottonseed oil </li>
					<li>Olive oil </li>
					<li>Palm oil </li>
					<li>Peanut oil (Ground nut oil) </li>
					<li>Rapeseed oil</li>
					<li>Rice Bran oil </li>
					<li>Safflower oil</li>
					<li>Soybean oil </li>
					<li>Sunflower oil </li>
					<li>Mustard oil</li>
				</ul>
			</div>
			<div class="headings2">Oils used for biofuel</div>
			<p>A number of oils are used for biofuel (biodiesel and Straight Vegetable Oil). Although diesel engines were invented, in part, with vegetable oil in mind, diesel fuel is almost exclusively petroleum-based. Rising oil prices have made biodiesel more attractive. Vegetable oils are evaluated for use as a biofuel based on</p>
            <div class="bullet1">
				<ul>
					<li>Suitability as a fuel, based on flash point, energy content, viscosity, combustion products and other factors</li>
					<li>Cost, based in part on yield, effort required to grow and harvest, and post-harvest processing cost </li>
				</ul>
			</div>
			<p>The Major oils used as biofuel are:</p>
			<div class="bullet1">
				<ul>
					<li>Castor oil</li>
					<li>Mustard oil </li>
					<li>Palm oil </li>
					<li>Jatropha oil</li>
				</ul>
			</div>
          </div>
          <!-- InstanceEndEditable --></div>
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
