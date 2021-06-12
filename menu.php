      <div>
        <div id="menu_container">
        <ul class="sf-menu" id="nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Products</a>
          	<ul>
            	<li><a href="bleaching-earth.php">Bleaching Earth</a>
                	<ul>
                    	<li><a href="bleaching-oil.php">Oils</a></li>
                        <li><a href="bleaching-application.php">Applications</a></li>
                		<li><a href="bleaching-grades.php">Grades</a></li>
                		<li><a href="bleaching-specification.php">Specification</a></li>
                		
                	</ul>
		</li>
                <li><a href="clay-catalyst.php">Clay Catalyst</a>
                	<ul>
                    	<li><a href="clay-details.php">Details</a></li>
                    	<li><a href="clay-applications.php">Applications</a></li>
                    	<li><a href="clay-grades.php">Grade</a></li>
                    	<li><a href="clay-specifications.php">Specifications</a></li>
                    	
                	</ul>
           	</li>
            <li><a href="download.php">Prospective Downloads</a></li>
		</ul>
          </li>
          
		  
		<?php	
			if(@$_SESSION['usr'])
			{
				?>
				<li><a href="">Payroll</a>
					<ul>
						<li><a href="#">Leave</a>
						<ul>
						<li><a href="applyleave.php">Apply for Leave</a></li>
						</ul>
						</li>
						
						<?php	
					$empcode=$_SESSION['empcode'];
					
						echo "<li><a href='emp_payslip.php?empcode=$empcode'>Payslip</a></li>";
					?>
					</ul>
				</li>
				<?php					
			}
			if(!(@$_SESSION['usr']))
			{
				?>
				<li><a href="">Recruitment</a>
					<ul>
						<li><a href="meritlist.php">Merit List</a></li>
						<li><a href="recruitment_main.php">Application Form</a></li>
						
					</ul>
				</li>
				<?php
			}
			?>
          <li><a href="news.php?showall">News/Events</a>
				<ul>
					<li><a href="news.php?showall">News</a></li>
					<li><a href="events.php?showall">Events</a></li>
				</ul>
		  </li>
          <li><a href="about-us.php">About Us</a>
          	<ul>
            	<li><a href="about-us.php">About Ashapura Volclay limited</a></li>
                <li><a href="history.php">History of Ashapura Group</a></li>
                <li><a href="achievement.php">Achievements | Landmarks</a></li>
            </ul>
         </li>
         <li><a href="contact_us.php">Contact Us</a></li>
		<li>
		<?php	
			if(@$_SESSION['usr'])
			{
					
					$empcode=$_SESSION['empcode'];
					include("connect.php");
					$sql="select * from emp_personal_detail where emp_code='$empcode'";
					$query=mysql_query($sql,$link);
					$row=mysql_fetch_array($query);
					$image=$row ['emp_photo'];
					?>
					<a href='empprof.php'><img src="images/<?php echo $image; ?>" height="30" width="30" /> <?PHP echo substr($_SESSION['usr'],0,7); ?></a> 
					<ul>
						<li><a href='empprof.php'>View Profile</a>
						<li><a href='empacchange.php'>Change Account Setting</a>
						<li><a href='?logoff'>Log Out</a>
					</ul>
					<?php
			}
			if(!(@$_SESSION['usr']))
			{
				?>
				<a href='adminlogin.php'>Log In</a>
				<ul>
					<li><a href='emplogin.php'>Log In Employee</a>
					<li><a href='signup.php'>Sign Up New Employee</a>
				</ul>
				<?php
			}
		?>
		</li>
		  </ul>
		  </div>
      </div>
