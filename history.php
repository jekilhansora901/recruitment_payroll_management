<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />



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
          			
          			
       		</div>
      		</div>
      
			<div id="content">
				<div id="content_item">
				<div class="sublink">
					<a href="about-us.php">About Us</a>
                    <a href="history.php">></a>
                    <a href="history.php">History of Ashapura Group</a>
					</div>
          <div class="content_inner">
            <p>Ashapura Group, India's largest multi-mineral solutions provider since 1960. Its flagship company Ashapura Minechem Ltd. is listed on India's premier exchanges. Ashapura Minechem Ltd. which is a part of the BSE Midcap & BSE 500 indices was ranked 4th in terms of Net Profit growth and 21st in terms of Super Rank by Business Standard (December 2006). The multinational group has mining & mineral processing facilities in Belgium, Nigeria, Oman and Malaysia; in India it operates from Gujarat, Maharashtra, Karnataka, Kerala, Andhra Pradesh and Orissa.</p>
            <p>The Ashapura Group is one of the largest exporters of traded Bauxite in the world and is amongst the world's top five Bentonite processing companies. Ashapura also dominates the value added segments in the country for Bleaching Clay, Geosynthetic Clay Liners, Clay Catalysts and Calcined Bauxite.</p>
            <p>Ashapura Minechem Limited (AML), a company incorporated in 1982, under the Indian Companies Act, 1956. In 1982, this concern was converted into a limited company. AML has reached the zenith in this arena has holds the distinction of being the largest mine owner, organized producer & exporter of Bentonite in India and has pioneered the production of Bentonite.</p>
            <p>Our strong Research & Development (R&D) facility strive to keep the edge by producing number of value added Bentonite products which are used in various industries such as Oil Well Drilling, Iron & Steel, Foundry, Oil Bleaching, Iron Ore Pelletization, Civil Engineering, Ceramics, Animal Feed etc. AML's products are exported to 23 countries in all continents and account for nearly 84% of the Bentonite product exports from India.</p>
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
