<?php
include("connect.php");


if(isset($_POST['proceed']))
{
if($_POST['rmethod']=="mail")
{
	header("location:email_recover.php");
}
if($_POST['rmethod']=="sque")
{
header("location:security_que.php");
}
}
?>

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
				<div class="content-inner">
				<form method="POST" action="">
				<h1><center>Welcome To Ashapura Volclay</center></h1>
				<table align="center">
					
					<tr>
						<td width="200">Select Recovery Method</td>
						<td><select name="rmethod">
							<option value="mail">Send Password to Email Directly</option>
							<option value="sque">Answer the Security Question</option>
							</select>
						</td>
					</tr>
					<tr>
						<td />
						<td>
							<input type="submit" name="proceed" value="Proceed">
						</td>
					</tr>
					<tr />
					<tr />
					<tr />
					<tr />
					</table>
					<table>
					<tr>
						<td rowspan="2" valign="top" width="60"><h4><b><u>Note</u> :</b></td>
						<td><h4>Send Password to Email Directly</h4>If You choose this method, your password is sent to your email directly.</td>
					</tr>
					<tr>
						<td><h4>Answer the Security Question</h4>This method is Ask a Sequrity Question to you, which is selected by you where you register first time to this site, if your answer is true than it display your Password</td>
					</tr>	
						
				</table>
				</form>
							
          
            
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
