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
                    <a href="clay-grades.php">></a>
                    <a href="clay-grades.php">Grades</a>
				</div>

          <div class="content_inner">
            <div class="headings2">ACTAL</div>
            <div class="bullet1">
				<ul>
					<li>Actal is included in UOP duty specification for clay treating of BTX.</li>
					<li>Actal is a granular solid acid catalyst manufactured from high quality Ca-montmorillonite of India.</li>
					<li>Actal is a product designed with a highly porous inner structure. This results in accessible active site for reactants and lowers diffusion limitation for byproducts.</li>
					<li>Actal is developed for adsorption and acid catalyst in fixed bed reactors.</li>
				</ul>
			</div>
            <div class="headings2">Grades of Actal</div>
            <div class="bullet1">
				<ul>
					<li>Actal 20X</li>
					<li>Actal 20</li>
					<li>Actal 10</li>
				</ul>
			</div>
			
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
