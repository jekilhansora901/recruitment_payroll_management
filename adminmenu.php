      <div>
        <div id="menu_container">
        <ul class="sf-menu" id="nav">
          <li><a href="admin.php">Home</a></li>
          
          <li><a href="">Recruitment</a>
          	<ul>
				<li><a href="admin_country_master.php">Country Master</a></li>
				<li><a href="admin_edu_master.php">Education Master</a></li>
            </ul>
          </li>
          <?php
		require 'connect.php';
		$total=0;
		$sql="select * from basic_sal_master where set_flag=0";
		$query=mysql_query($sql,$link);
		$no_row=mysql_num_rows($query);
		?>
		  <li><a href="#">Payroll <?php if(!$no_row==0){?><span id='deaemp' style="text-decoration:blink">(<?php echo $no_row; ?>)</span><?php }?></a>
          	<ul>
            	<li><a href="adminemplist.php">Manage all employee</a></li>
				<li><a href="#">Employee Report</a>
				<ul>
					<li><a href="admin_emp_pdf.php">All employee</a></li>
					<li><a href="admin_deptws_emp.php">Department wise employee</a></li>
					<li><a href="admin_desgws_emp.php">Designation wise employee</a></li>		
				</ul></li>
				<li><a href="admin_master_sal_gen.php">Generate Salary</a></li>
				<li><a href="#">Salary Slip Report</a>
				<ul>
					<li><a href="admin_salary_slip_pdf.php">All employee Slip</a></li>
					<li><a href="admin_dept_salary.php">Department wise employee Slip</a></li>
					<li><a href="admin_desg_salary.php">Designation wise employee Slip</a></li>	
					<li><a href="admin_month_salary.php">Month wise employee Slip</a></li>					
				</ul></li>
				
                
				<li><a href="admin_dept_master.php">Department Master</a></li>
				<li><a href="admin_desg_master.php">Designation Master</a></li>
				<li><a href="admin_set_rule_salary.php">Set Salary Rule <?php if(!$no_row==0){?><span id='deaemp' style="text-decoration:blink">(<?php echo $no_row; ?>)</span><?php }?></a></li>
				<li><a href="admin_set_rule_leave.php">Set Leave Rule</a></li>
            
			</ul>
          </li>
		  <li><a href="#">Gallary</a>
		<ul>
			<li><a href="admin_slide_image.php">Slide Show</a>
				<ul><li><a href="admin_add_img.php">Add More Images</a></li>
					<li><a href="admin_slide_image.php">Show All Images</a></li>
				</ul>	</li>
			
		</ul>	
	</li>
          <li><a href="#">News/Event</a>
		<ul>
			<li><a href="admin_edit_news.php">Edit News</a></li>
			<li><a href="admin_new_news.php">Update Latest News</a></li>
			<li><a href="clear_recently_news.php">Clear Recently News</a></li>
			<li><a href="admin_new_events.php">Update New Events</a></li>
			<li><a href="admin_manage_events.php">Manage Events</a></li>
		</ul>	
		</li>
		<?php
		require 'connect.php';
		$total=0;
		$totalt=0;
		$sql="select * from emp_personal_detail where active_flag=0";
		$query=mysql_query($sql,$link);
		$no_row=mysql_num_rows($query);
		while($row=mysql_fetch_array($query))
		{
			$empcode=$row['emp_code'];
			$logsel="select * from login_master where emp_code='$empcode'";
			$resultt=mysql_query($logsel,$link);
			$no=mysql_num_rows($resultt);
			if(!$no>0)
			{
				$total++;
			}
		}
		$sql1="select * from leave_master where approve_flag=0";
		$query1=mysql_query($sql1,$link);
		$no_row_lv=mysql_num_rows($query1);
		
		$sql8="select * from personal_detail,experience_detail,education_master,education_detail,country_master where personal_detail.approve_flag=0 AND personal_detail.country_id=country_master.country_id AND education_detail.edu_id=education_master.edu_id AND personal_detail.id_no=experience_detail.id_no AND personal_detail.id_no=education_detail.id_no";
		$query18=mysql_query($sql8,$link);
		$no_row=mysql_num_rows($query18);
		
		$totalt=$total+$no_row_lv+$no_row;
		?>
          <li><a href="#">Notifications <?php if(!$totalt==0){?><span id='deaemp' style="text-decoration:blink">(<?php echo $totalt; ?>)</span><?php }?></a>
          	<ul>
            	<li><a href="admin_emp_req_page.php">Employee Notification <span id='deaemp'>(<?php echo $total; ?>)</span></a></li>
                <li><a href="admin_leave_app.php">Leave <span id='deaemp'>(<?php echo $no_row_lv; ?>)</span></a></li>
                <li><a href="admin_rec_req_page.php">Recruitment Notification <span id='deaemp'>(<?php echo $no_row; ?>)</span></a></li>
            </ul>
         </li>
		 <li style="float:right; margin-right:0px">
			<?php
				if(@$_SESSION['admin'])
				{
					echo "<a href='admin.php'>".$_SESSION['admin']."</a>";
					echo "<ul>";
						echo "<li><a href='adminacchange.php'>Change Account Setting</a>";
						echo "<li><a href='?logoff'>Log Out</a>";
					echo "</ul>";
				}
			?>
		</li>
    </ul>
      </nav>
</div>
</div>