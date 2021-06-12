<?php
include("connect.php");
if(@$_POST['btn'])
{
$ans=@$_POST['ans'];
//$email=$_POST['email'];

$remail=trim(mysql_real_escape_string($_POST['remail']));

if(empty($remail)) {
$error[1]= "Enter a email.";
$code= "1";
}

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $remail)) 
{
if(!(@$code=="1"))
		{
			$error[2]= 'You did not enter a valid email.';
			$code= "2";
		}
}
$query="SELECT * FROM emp_personal_detail WHERE email = '$remail';";
$result=mysql_query($query,$link);
$row = mysql_fetch_assoc($result);
$emp_code=$row['emp_code'];
if(!$row['email'])
{ 
if(!(@$code=="1"))
		{
		if(!(@$code=="2"))
		{
$error[3]="Please Enter Your Correct Email Address.";
$code="3";
}
}
else
{
$code="6";
}
}
if(empty($ans)) {
$error[4]= "Enter Your Answer.";
$code1= "4";
}

$query="Select * FROM login_master,security_que WHERE login_master.emp_code='$emp_code' AND login_master.security_que_id=security_que.que_id AND login_master.answer='$ans';";
$result=mysql_query($query,$link);
$row = mysql_fetch_array($result);
if(!$row['answer'])
{
if(!(@$code=="4"))
{
$error[5]="Please Enter Correct Answer.";
$code1="5";
}
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
				
          <div class="content-inner">
		  <form method="POST" action="">
			<table>
			<tr>
				<td>Enter Your Email Address</td>
				<td><input type="text" name="remail" size="35" value="<?php if(isset($remail)){echo $remail;}?>"/> <?php if(isset($error[1])){?><span class="jekil"><?php echo $error[1];} if(isset($error[2])){?><span class="jekil"><?php echo $error[2];} if(isset($error[3])){?><span class="jekil"><?php echo $error[3];}?></span></td>
			</tr>
			<?php 
			if(isset($remail))
			{
		  //$remail=trim(mysql_real_escape_string($_POST['remail']));
			$query="SELECT * FROM emp_personal_detail WHERE email = '$remail';";
			$result=mysql_query($query,$link);
			$row = mysql_fetch_assoc($result);
			$emp_code=$row['emp_code'];
			$query="Select * FROM login_master,security_que WHERE emp_code='$emp_code' AND login_master.security_que_id=security_que.que_id;";
			$result=mysql_query($query,$link);
			$row1 = mysql_fetch_assoc($result);
			if(!isset($code))
			{
			
			?>
			<tr><td>
			Your Security Question is :
			</td>
			<td>
			<?php
			echo $row1['que'];
			?>
			</td>
			</tr>
			<tr><td>
			Enter Your Answer
			</td>
			<td>
			<input type="text" name="ans" value="<?php if(isset($ans)){echo $ans;} ?>"/> <?php if(isset($error[4])){?><span class='jekil'><?php echo $error[4];} if(isset($error[5])){?><span class='jekil'><?php echo $error[5];}?>
			</td>
			</tr>
			<?php
			if(!isset($code1))
			{
			?>
			<tr>
			<td>
			Your Old Password is
			</td>
			<td>
			<?php
			$pass=base64_decode($row1['login_pass']);
			echo $pass;
			?>
			</td>
			</tr>
			<tr>
			<td colspan=2 align="center">
			<a href="emplogin.php">Click here for Employee Log In </a>
			</td>
			</tr>
			<?php
			}
			}
			}
			?>
			
			<tr><td />
			<td>
			<input type='submit' name='btn' value='Submit'>
			</td></tr>	
			</table>
		</div>
          <!-- InstanceEndEditable -->

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
