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
	      <div class="content_inner">
          <table
            <tr valign="top">
                      <td width="9%" class="contact-head" valign="top" style="border-bottom:none; font-weight: bold; ">Address</td>
                      <td width="2%" class="contact-head" valign="top" style="border-bottom:none; font-weight:bolder ">:</td>
                      <td width="89%" class="contact-text"  style="border-bottom:none; font-family: tahoma;
	color: #03248F;
	font-size: 15px;
	font-weight: bold; ">Village Ler, Near Bhujodi, Off Anjar-Bhuj Highway, <br>Bhuj-Kutch, Gujarat 370 001. INDIA</td>
                    </tr>
                      <tr valign="top" >
                      <td class="contact-head" style="border-bottom:none; font-weight: bold; ">Tel</td>
                      <td class="contact-head" style="font-weight:bolder">:</td>
                      <td class="contact-text" style="border-bottom:none; font-family: tahoma;
	color: #03248F;
	font-size: 15px;
	font-weight: bold; ">91-2832-240 301 / 302 / 242 032 / 033</td>
                    </tr>
                    <tr valign="top">
                      <td class="contact-head" style="border-bottom:none; font-weight: bold; ">Fax</td>
                      <td class="contact-head" style="border-bottom:none; font-weight:bolder ">:</td>
                      <td class="contact-text" style="border-bottom:none;border-bottom:none; font-family: tahoma;
	color: #03248F;
	font-size: 15px;
	font-weight: bold; ">91-2832-240 303</td>
                    </tr> 
                    <tr valign="top">
                      <td colspan="3"></td>
                    </tr>
                  </table>
                  <iframe width="650" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps/ms?ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202864882302857980160.00049b1de879131f6544f&amp;ll=23.110049,70.10376&amp;spn=0.884154,1.785278&amp;z=9&amp;output=embed"></iframe>
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
