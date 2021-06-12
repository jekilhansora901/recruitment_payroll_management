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
                    <a href="bleaching-specification.php">></a>
                    <a href="bleaching-specification.php">Specification</a>
					</div>

				<div class="content_inner">
            <p>All grades of Galleon Earth are severally controlled by the following two specification to customers and in-house specification.</p>
            <div class="headings2">Grades of Galleon Earth</div>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="39%">&nbsp;</td>
                <td width="33%">V2</td>
                <td width="28%" >V2 Test Method</td>
              </tr>
              <tr valign="top">
                <td colspan="3">Delivery Specification</td>
              </tr>
              <tr valign="top">
                <td >Moisture (%)</td>
                <td >15 Max</td>
                <td >Test Method 2</td>
              </tr>
              <tr valign="top">
                <td >Fineness (%)</td>
                <td >80 Min.</td>
                <td >Test Method 3</td>
              </tr>
              <tr valign="top">
                <td >Residual Acidity (mgKOH/g)</td>
                <td >2.5 Max</td>
                <td >Test Method 4</td>
              </tr>
              <tr valign="top">
                <td >Bleaching Performance</td>
                <td >The same bleaching<br />
                  Performance as that<br />
                  of V2 Indian<br />
                  Standard 1) or more</td>
                <td >Test Method 5</td>
              </tr>
              <tr valign="top">
                <td colspan="3">In-house Specification</td>
              </tr>
              <tr valign="top">
                <td >Filterability 2)</td>
                <td >&nbsp;</td>
                <td >Test Method 7</td>
              </tr>
              <tr valign="top">
                <td >(V2 Indian Standard =100) Particle Size 3) &lt;5 m m (%)</td>
                <td >20 Max</td>
                <td >Test Method 6</td>
              </tr>
              <tr valign="top">
                <td >Average Particle Size ( m m)</td>
                <td >20 ~ 30</td>
                <td >&nbsp;</td>
              </tr>
            </table>
            <p>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr valign="top">
                <td>1.</td>
                <td>V2 Indian standard is the pure sample which was manufactured from AVL&rsquo;s raw clay by<br>
                  MIZUSAWA INDUSTRIAL CHEMICALS LTD.</td>
              </tr>
              <tr valign="top">
                <td height="47">2.</td>
                <td>Filtration rate of V2 Indian Standard to oil : A(min)<br>
                  Filtration rate of the final product to oil : B (min)</td>
              </tr>
              <tr valign="top">
                <td>&nbsp;</td>
                <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">Filterability =</td>
                      <td width="5%" align="center">A / B</td>
                      <td width="20%">X 100</td>
                      <td width="8%">&nbsp;</td>
                      <td width="56%">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr valign="top">
                <td width="3%">3.</td>
                <td width="97%">Malven Mastersizer measurement condition:<br>
                  a. Real refractive index of the particle - 1.5295<br>
                b. Imaginary refractive index of the particle - 0.1000<br>
                c. Real refractive index of Water - 1.3300</td>
              </tr>
            </table>
            </p>
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
