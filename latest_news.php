<h1>Latest News</h1>
					<?php
				include("connect.php");
				$sql="select * from news_master ORDER BY news_id DESC LIMIT 5;";
				$query=mysql_query($sql,$link);
				?>
    			      	<marquee scrollamount="2" behavior="scroll" direction="up" onmouseover="stop()" height="135" onmouseout="start()">
						<ul>
						<?php
						$i=0;
						while($row=mysql_fetch_array($query))
						{
							$i++;
							$str=$row['news_title'];
							$newsid=$row['news_id'];
							if($i==1)
							{
							?>
							<li><span style="display:inline-block; color:#FFF; text-decoration:blink; background-color:#F00">New</span>  <a href="news.php?id=<?php echo $newsid; ?>"><?php echo substr($str,0,100)."<br>"; ?></a></li>
							<?php
							}
							else
							{
							?>
							<li><a href="news.php?id=<?php echo $newsid; ?>"><?php echo substr($str,0,100)."<br>"; ?></a></li>
							<?php
							}
								
						}
						?>
						</ul>
						</marquee>

						
<h1>Events</h1>
					<?php
				include("connect.php");
				$sql="select * from event_master ORDER BY event_id DESC LIMIT 5;";
				$query=mysql_query($sql,$link);
				?>
    			      	<marquee scrollamount="2" behavior="scroll" direction="up" onmouseover="stop()" height="135" onmouseout="start()">
						<ul>
						<?php
						while($row=mysql_fetch_array($query))
						{
							$i++;
							$str=$row['event_name'];
							$eventid=$row['event_id'];
							$date=date('d/m',strtotime($row['date']));
							?>
							<li><?php echo $date; ?><a href="events.php?id=<?php echo $eventid; ?>"> <?php echo substr($str,0,100)."<br>"; ?></a></li>
							<?php								
						}
						?>
						</ul>
						</marquee>