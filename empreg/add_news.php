
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery.ui.all.css">
<link rel="stylesheet" href="../css/style.css">
	<script src="jquery-1.7.1.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js">
	$(function() {
		$( "#datepicker" ).datepicker({
			altField: "#alternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			maxDate : "-19Y",
			minDate: "-60Y",
			
		});
		$( "#jdatepicker").datepicker({
			altField: "#jalternate",
			altFormat: "yy-m-d",
			changeMonth: true,
			changeYear: true,
			minDate: "-20Y",
			maxDate: "+0D +0M"
			});
	});
	</script>

</head>
<body>
<div id="main">
		<header>
			<div id="logo">
      			<h1><a href="index.php">ASHAPURA <span class="logo_colour"><br>VOLCLAY </span>LTD.</a></h1>
      			</div>
            
			<?php
			//include("adminmenu.php");
			?>
		</header>
    
		<div id="site_content" style="background: #eae5e5;">
			<div id="sidebar_container">
        		<div class="sidebar">
          			<h1>Latest News</h1>
    			      	<h2>New Website Launched</h2>
       		   		<p>We've redesigned our own website. Take a look around and let us know what you think.</p>
       	 		</div>
        	
				<div class="sidebar">
          			<h1>Contact Us</h1>
          			<p>We'd love to hear from you. Call us, <a href="#">email us</a> or complete our <a href="contact.php">contact form</a>.</p>
       		</div>
      		</div>
			<div id="content">
				<div id="content_item">
         
			<form method="POST" action="">
			<center>
			<h2>Add Latest News</h2>
		  	<table>
			<tr>
			<td>Enter News Title</td>
			<td><input type="text" name="newstitle" size=37></td>
			</tr>
			<tr>
			<td>Select Date</td>
			<td><input type="text" name="nwdt" id="datepicker" size="20"> </td>
			<td><input type="text" hidden="true" id="alternate" size="47" name="dobb" ></td>
			</tr>
			<tr>
			<td valign=top>Description of News</td>
			<td><textarea cols=30 rows=8></textarea></td>
			</tr>
			<tr>
			<td>
			<input type="submit" name="add" value="Add">
			</td>
			<td>
			<input type="submit" name="can" value="Cancel">
			</td>
			</tr>
			</table>
			</center>
			</form>
          <!-- InstanceEndEditable --></div>
 
 
 </div>
      		</div>
	
	
		<div id="footer">
      			<?php
				include("footer.php");
				?>
      	</div>
	</div>
</body>
</html>
