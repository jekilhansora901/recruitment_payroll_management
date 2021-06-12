<?php
include("connect.php");
session_start();

if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
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
          			
          			
       		</div>
      		</div>
      
			<div id="content">
				<div id="content_item">
          <div class="content-inner">
		  <div class="content-spacer1"><img src="images/spacer.gif" height="18"/></div>
			<div class="headings2">M S D S</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%"><table width="95%"  align="left" cellpadding="0" cellspacing="0">
                    <tr align="left">
                      <td width="10%" height="30"><img src="images/download-icon.gif" /></td>
                      <td width="75%"><a href="pdf/AVL-ACTAL-MSDS-Rev-2010-feb-2006.pdf" target="_blank">Actal</a></td>
                      <td width="15%" height="36"><a href="pdf/AVL-ACTAL-MSDS-Rev-2010-feb-2006.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
                    <tr align="left">
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/MSDS_V2.pdf" target="_blank">Galleon Earth V2</a></td>
                      <td height="36"><a href="pdf/MSDS_V2.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
                </table></td>
                <td width="50%"><table width="95%" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10%" height="30"><img src="images/download-icon.gif" /></td>
                      <td width="72%"><a href="pdf/MSDS_V2-Special.pdf" target="_blank">Galleon Earth V2 Special</a></td>
                      <td width="18%" height="36"><a href="pdf/MSDS_V2-Special.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/MSDS_V2-Super.pdf" target="_blank">Galleon Earth V2 Super</a></td>
                      <td height="36"><a href="pdf/MSDS_V2-Super.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
                </table></td>
              </tr>
            </table>
			<div class="content-spacer1"><img src="images/spacer.gif" height="18"/></div>
			<div class="headings2">Specification Sheets</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr valign="top">
                <td width="50%"><table width="95%"  align="left" cellpadding="0" cellspacing="0">
                    <tr align="left">
                      <td width="10%" height="30"><img src="images/download-icon.gif" /></td>
                      <td width="75%"><a href="pdf/V2-Spec.pdf" target="_blank">Galleon Earth V2</a></td>
                      <td width="15%" height="36"><a href="pdf/V2-Spec.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
                    <tr align="left">
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/V2-Special-Spec.pdf" target="_blank">Galleon Earth V2 Special</a></td>
                      <td height="36"><a href="pdf/V2-Special-Spec.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>

   <tr align="left">
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/Actal-20.pdf" target="_blank">Actal 20</a></td>
                      <td height="36"><a href="pdf/Actal-20.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>

                </table></td>
                <td width="50%"><table width="95%" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10%" height="30"><img src="images/download-icon.gif" /></td>
                      <td width="72%"><a href="pdf/V2-Super-Spec.pdf" target="_blank">Galleon Earth V2 Super</a></td>
                      <td width="18%" height="30"><a href="pdf/V2-Super-Spec.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>


  <tr align="left">
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/Actal-10.pdf" target="_blank">Actal 10</a></td>
                      <td height="36"><a href="pdf/Actal-10.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>
  <tr align="left">
                      <td height="30"><img src="images/download-icon.gif" /></td>
                      <td height="30"><a href="pdf/Actal-20X.pdf" target="_blank">Actal 20X</a></td>
                      <td height="36"><a href="pdf/Actal-20X.pdf" target="_blank"><img src="images/pdf-icon2.gif" border="0" /></a></td>
                    </tr>

                </table></td>
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
