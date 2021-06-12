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
				<div class="sublink">
					<a href="about-us.php">About Us</a>
                    <a href="achievement.php">></a>
                    <a href="achievement.php">Achievements/Landmarks</a>
					</div>
          <div class="content_inner">
			<div class="achievement-div">
              <div class="achievement-bg">1999</div>
			  <div class="achievement-text">Incorporation of Ashapura Volclay Limited</div>
            </div>
			
			<div class="achievement-div">
              <div class="achievement-bg">1999</div>
			  <div class="achievement-text">Agreement with Mizusawa Industrial Corporation, Japan for Technology transfer</div>
            </div>
            <div class="achievement-div">
              <div class="achievement-bg">2001</div>
           	  <div class="achievement-text">Start of Line 1 production at Bhuj, Gujarat with an annual capacity of 24,000 MT p.a.</div>
            </div>
			<div class="achievement-div">
              <div class="achievement-bg">2004</div>
              <div class="achievement-text">Trials for BTX Clay Catalyst</div>
            </div>
			<div class="achievement-div">
              <div class="achievement-bg">2005</div>
			  <div class="achievement-text">Increase in production capacity by introducing Line 2 production at Bhuj, Gujarat with new annual capacity of 48,000 MT p.a.</div>
            </div>
			
			<div class="achievement-div">
              <div class="achievement-bg">2005</div>
			  <div class="achievement-text">New plant for BTX Clay Catalyst commences production</div>
            </div>
			
			<div class="achievement-div">
              <div class="achievement-bg">2005</div>
			  <div class="achievement-text">New Geosynthetic Clay Liner plant commences production</div>
            </div>
			<div class="achievement-div">
              <div class="achievement-bg">2007</div>
			  <div class="achievement-text">New plant at Dharur, Hyderabad with an annual capacity 24,000 MT p.a.</div>
            </div>

            <div class="achievement-div">
              <div class="achievement-bg">2008</div>
              <div class="achievement-text">Commissioning of Antwerp Mineral Processing complex</div>
            </div>
			
            <div class="achievement-div">
              <div class="achievement-bg">2008</div>
              <div class="achievement-text">New Multi-Mineral facility in Antwerp, Belgium to cater European Customers</div>
            </div>
			
            <div class="achievement-div">
              <div class="achievement-bg">2008</div>
              <div class="achievement-text">JV in Malaysia with MPA Hudson</div>
            </div>
			<div class="achievement-div">
              <div class="achievement-bg">2010</div>
              <div class="achievement-text">Increase in production capacity by introducing Line 3 production at Bhuj, Gujarat with new annual capacity of 72,000 MT p.a.</div>
            </div>
		  
		  </div>
		  </div>
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
