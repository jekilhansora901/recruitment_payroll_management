<?php
session_start();
if(!($_SESSION['usr']))
{
	header("location:emplogin.php");
}
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location:index.php");
	exit;
}
if(isset($_POST['btn']))
{
	$month=$_POST['month'];
	$empcode=$_POST['empcode'];
		header("location:emp_salary_slip.php?month=$month&empcode=$empcode");
}
?>
<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="images/abc.ico"/>
<link rel="icon" href="icon.ico">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>
<body>
	<div id="main" >
		<header>
			<div id="logo" >
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
						<center>
<form method="post" action="">

<br />

<h2>Employee Pay Slip</h2>
<table>
<tr>
<td>Select Month</td>
<td><?php 
			$emp=$_REQUEST['empcode'];
			echo "<input type=hidden name=empcode value='$emp'>";
			$query = "select DISTINCT month from SALARY where emp_code='$emp' order by month";
			$result = mysql_query($query,$link);
			$sb='<select name=month>';
			while ($row = mysql_fetch_assoc($result)) {
				$sb.='<option value=' . $row['month'] . '>' . $row['month'] . '</option>';
			}
			$sb.='</select>';
			mysql_free_result($result);
			echo $sb;
			?>
</td>
<td valign="middle"><?php if(isset($error[1])){?><span class="jekil"><?php echo "<br>".$error[1];} ?></span></td>
</tr>
<tr>
<td>
<input type="submit" name="btn" value="Show"  />
</td>
<td>
<input type="submit" name="cbtn" value="Cancel"  />
</td>
</tr>
</table>
</form>
</center>
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
	  $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>

</body>

</html>
