<?php include('header.php'); ?>
			 
			  <div class="col-md-12 menu mycss">
			
						<div class="list-group homelist">
				<?php 
						session_start();
						if($_SESSION['sid']==session_id())
						{
				    ?>

			  <a href="../user/view_schedule.php" class="list-group-item" >View Schedule</a>
			  <a href="../user/trains_between_stations.php" class="list-group-item">Train Between Stations</a>
			  <a href="../user/book.php"class="list-group-item">Booking</a>
			  <a href="../user/PNR.php"class="list-group-item">PNR Status</a>
			  <a href="../user/cancel.php"class="list-group-item">Cancel</a>
			  <a href="../user/logout.php"class="list-group-item">Logout</a>
				<?php 
				     	}
						else
						{
							header("location:login.php");
						}
					?>
			</div>
			
							  </div>
			</div>
		</div>
<?php include('footer.php'); ?>
 

       