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
                    <a href="clay-specifications.php">></a>
                    <a href="clay-specifications.php">Specifications</a>
					</div>

          <div class="content_inner">
		  <div class="headings2">Properties of Actal </div>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="28%">&nbsp;</td>
                  <td width="18%">&nbsp;</td>
                  <td width="19%">Actal 20X</td>
                  <td width="18%">Actal 20</td>
                  <td width="17%">Actal 10</td>
                </tr>
                <tr valign="top">
                  <td>Loose Bulk Density</td>
                  <td>gm/l</td>
                  <td>700&plusmn;50</td>
                  <td>700&plusmn;50</td>
                  <td>620&plusmn;50</td>
                </tr>
                <tr valign="top">
                  <td>Free Moisture (2 hrs,110'C)</td>
                  <td>%</td>
                  <td>6 max</td>
                  <td>6 max</td>
                  <td>6 max</td>
                </tr>
                <tr valign="top">
                  <td>pH (10% suspension filters)</td>
                  <td>-</td>
                  <td>2.5 - 3.5</td>
                  <td>2.5 - 3.5</td>
                  <td>2.5 - 3.5</td>
                </tr>
                <tr valign="top">
                  <td>Free Acidity</td>
                  <td>mg KOH/gm</td>
                  <td>7 max</td>
                  <td>7 max</td>
                  <td>7 max</td>
                </tr>
                <tr valign="top">
                  <td>Total Acidity</td>
                  <td>mg KOH/gm</td>
                  <td>23 - 26</td>
                  <td>20 - 23</td>
                  <td>9 - 14</td>
                </tr>
                <tr valign="top">
                  <td>Surface Area</td>
                  <td>(BET)</td>
                  <td>300&plusmn;30</td>
                  <td>300&plusmn;30</td>
                  <td>300&plusmn;30</td>
                </tr>
            </table>
            <div class="headings2">Particle Size Distribution</div>
            <p>The particle size distribution of ACTAL is determined by a sieve analysis of the dry granules. The following average residues were found on different fine sieves.</p>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="40%">Sieve range</td>
                  <td width="29%">Unit</td>
                  <td width="31%">Value</td>
                </tr>
                <tr valign="top">
                  <td>> 2.0 mm</td>
                  <td>%</td>
                  <td>10 max</td>
                </tr>
                <tr valign="top">
                  <td>2.0 - 0.25 mm</td>
                  <td>%</td>
                  <td>85 min</td>
                </tr>
                <tr valign="top">
                  <td> < 0.25 mm</td>
                  <td>%</td>
                  <td>5 max</td>
                </tr>
              </table>
            <div class="headings2">Chemical Composition</div>
            <p>Typically Actal shows the following chemical composition</p>
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="40%"">Composition</td>
                  <td width="29%"">Unit</td>
                  <td width="31%">Value</td>
                </tr>
                <tr valign="top">
                  <td>SiO<sub>2</sub></td>
                  <td>%</td>
                  <td>59.9</td>
                </tr>
                <tr valign="top">
                  <td>Al<sub>2</sub>O<sub>3</sub></td>
                  <td>%</td>
                  <td>13.9</td>
                </tr>
                <tr valign="top">
                  <td>Fe<sub>2</sub>O<sub>3</sub></td>
                  <td>%</td>
                  <td>7.3</td>
                </tr>
                <tr valign="top">
                  <td>CaO</td>
                  <td>%</td>
                  <td>0.8</td>
                </tr>
                <tr valign="top">
                  <td>MgO</td>
                  <td>%</td>
                  <td>2.3</td>
                </tr>
                <tr valign="top">
                  <td>Na<sub>2</sub>O</td>
                  <td>%</td>
                  <td>0.2</td>
                </tr>
                <tr valign="top">
                  <td>K<sub>2</sub>O</td>
                  <td>%</td>
                  <td>0.1</td>
                </tr>
                <tr valign="top">
                  <td>TiO<sub>2</sub></td>
                  <td>%</td>
                  <td>2.8</td>
                </tr>
                <tr valign="top">
                  <td>Loss on ignition</td>
                  <td>%</td>
                  <td>10.04</td>
                </tr>
            </table>
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
