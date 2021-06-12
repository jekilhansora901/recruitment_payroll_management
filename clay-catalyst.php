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
			<div class="sublink">
		    <a href="product.php">Products</a>
                    <a href="clay-catalyst.php">></a>
                    <a href="clay-catalyst.php">Clay Catalyst</a>
                    </div>
          <div class="content_inner">
            <div class="headings2">Actal Acid Clay Catalyst</div>
            <p>Naturally occuring Bentonite is activated with acids. During acid activation the interlayer cations are exchanged per protons and other catalytically active cations. Metal ions like Al & Fe are leached out from octahedral layer of clay. As a result, clay becomes acidic and porous. This acid activation method is proprietary and is developed to impart complex acid catalyst properties . e.g.</p>
			<div class="bullet2">
				<ul>
					<li>Bronsted /Lewis Acidity</li>
					<li>Number and Strength of Acid site</li>
					<li>Ion exchange sites</li>
				</ul>
			</div>
			<div class="bullet2">
				<ul>
					<li>Surface area</li>
					<li>Catalytic sites</li>
					<li>Porosity</li>
				</ul>
			</div>
			<div class="headings2">Functions of Clay Catalyst</div>
			<p>Clay works bi-functionally as an acid catalyst and adsorbent. Acid catalyst nature of clay enhances the reactions involving the olefins and aromatics. These reactions are typically alkylation, isomerisation and disproportionation. As a result of alkylation reactions BrI due to olefins is reduced to desired level. The products of these reactions are in general high boiling and are seperated at later stage. Clay catalyst due to its porous nature adsorbs color precursors this improving the AWN.</p>
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
