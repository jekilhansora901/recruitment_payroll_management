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
          <div class="headings2">About Ashapura Volclay Limited</div>
          <div class="content_inner">
		  <p>The inception of "Ashapura Volclay Limited" (AVL) is a joint venture between Ashapura Minechem Ltd & AMCOL Int. Corp of USA for manufacturing Bentonite and Clay based value added products in India. A state-of-the-art Bleaching Earth manufacturing facility at Bhuj, Gujarat, in technological collaboration with Japan's Mizusawa Industrial Chemicals Limited further adds value to our brand.</p>
			<div class="headings2">Bhuj <span class="sub_headings">(India)</span></div>
            <div class="about-img"><img src="images/about_us/about-img3.png" alt="Bleaching Earth Manufacturing Plant -Bhuj"></div><p>At Bhuj, is the world's second largest single location for Bentonite based Bleaching Earth manufacturing facility.  The plant was set up with Technology from Mizusawa Industrial Chemicals Limited, Japan and is a joint venture of Ashapura Minechem Ltd. and AMCOL  Corporation, USA. The plant uses the world-class and unique filterless technology to manufacture our successful Bleaching Earth: Galleon V2 & V2 Super. This plant is a pioneering Bleaching Earth project in India and also manufactures the renowned ACTAL Grade of catalyst for the petrochemical industry.</p>
            <div class="clear"><img src="images/spacer.gif"></div>
			<div class="headings2">Dharur <span class="sub_headings">(India)</span></div>
            <div class="about-img"><img src="images/about_us/about-img2.png" alt="Bleaching Earth Manufacturing Plant at Dharur"></div><p>Following the success of our plant at Bhuj, Ashapura Group has set up another plant for manufacturing Bleaching Earth at Dharur. This plant not only has access to the primary raw mineral Attapulgite but also has a logistical edge for exports to the Palm Oil producing and refining countries in South East Asia. The brand "CLEARFLOW" has, within a short span, established itself as a cost-effective brand in major oil refineries in India and overseas.</p>
            <div class="clear"><img src="images/spacer.gif"></div>
			<div class="headings2">Antwerp <span class="sub_headings">(Belgium)</span></div>
            <div class="about-img"><img src="images/about_us/about-img4.png" alt="Mineral Processing Complex at Antwerp"></div><p>Given the importance of Europe as a market for Ashapura, the company has set up a Mineral Processing Complex at Antwerp as a Joint Venture with AMCOL International Corporation. The facility has the capability of processing Bleaching Earth which would be exported from India in a semi-processed form. The Antwerp facility today serves all the major oil refiners of Europe, by making available a cost-effective and quality product at their doorstep. All the Bleaching Earth grades from Ashapura are available at Antwerp facility.</p>
            <div class="clear"><img src="images/spacer.gif"></div>
			<div class="headings2">Selangor <span class="sub_headings">(Malaysia)</span></div>
            <div class="about-img"><img src="images/about_us/about-img1.png" alt="Hudson MPA Snd. Bhd - Bleaching Earth Manufacturer Malaysia"></div><p>Malaysia being a strategic manufacturing hub in South East Asia for edible oils, Ashapura has invested in Hudson MPA Snd. Bhd., a reputed Bleaching Earth manufacturer of Malaysia. This facility imports Attapulgite and Bleaching Earth from Ashapura in India and processes it for marketing in Malaysia and neighboring countries.</p>  </div>
	    	
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
