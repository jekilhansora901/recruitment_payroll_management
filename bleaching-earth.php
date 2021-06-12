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
      		</div>
      
			<div id="content">
				<div id="content_item">
					<!--<ul>
						<li> <a href=product.php>Products</a></li>
						<li><a href="bleaching_earth.php">Bleaching Earth</a></li>
					</ul>-->
                    <div class="sublink">
		    <a href="product.php">Products</a>
                    <a href="bleaching-earth.php">></a>
                    <a href="bleaching-earth.php">Bleaching Earth</a>
                    </div>
				<div class="content_inner">
					<p>Bleaching Earth is manufactured from the best quality, selectively mined and scientifically blended montmorillonite clays under 
					stringent process controls. While making Bleaching Earth special care is taken in maintaining the important properties like absorptive 
					capacity, acid properties, catalytic properties, ion exchange capacity and particle size distribution.</p>
				  <p>Bleaching Earth is manufactured by <b>Dry process</b> OR <b>Wet process</b>.</p>
				  <p>A Bleaching Earth is Activated adsorbent used for the general purpose of</p>
					<div class="bullet1">
						<ul>
						<li>Decolourisation of animal, vegetable mineral oils and waxes</li>
						<li>Enhance stability of the Refined Oil.</li>
						</ul>
					</div>
					<p class="headings2">Bleaching Earth is characterized by</p>
					<div class="bullet1">
                        <ul>
						<li>High bleaching efficiency</li>
						<li>Fast filtration rate</li>
						<li>Low oil retention</li>
						<li>Ability minimise the increase of free fatty acids</li>
						<li>Removing impurities like soap & trace metals without affecting appearance, flavour & nutritional properties of Oil</li>
						</ul>
                    </div>

					<p class="headings2">Important Points During Bleaching</p>
					<div class="bullet1">
                    <ul>
                    	<li>Normally about 0.5% - 3% of earth is required for bleaching application of vacuum during process which results in less oxidation & improvement in oil colour.</li>
						<li>Choice of Bleaching clay as per its characteristics.</li>
						<li>The total acidity (titrable acidity) of clay is expressed as mg of KOH/g of clay on a hot water extract.</li>
						<li>The Moisture content of Earth is vital as activity of clay depends on the evaporation of moisture from earth after its admixture with oil (15% max free moisture is desirable)</li>
						<li>The Particle size of Earth affects filtration & oils retention as per type of earth used & determines losses during bleaching process.</li>
						<li>Operations & maintenance of filters is very important during process.</li>
						<li>Treatment with Acid Activated Bleaching Earth in post-bleaching step removes traces of Nickel from hydrogenated oils (0.25-0.5% of earth used).</li>
						<li></li>
                    </ul>
                  </div>
					<p class="headings2">Oil Loss Economics During Bleaching</p>
						<div class="bullet1">
                        <ul>
						<li>Spent Earth carries around 30% of oil on dry basis</li>
						<li>By hot water washing of filter press, the oil content can be brought down to 22% on the average.</li>
						<li></li>
                        </ul>
                        </div> 
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
