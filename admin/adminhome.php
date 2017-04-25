<?php include('header.php'); ?>
			 
			  <div class="col-md-12 ">
			
				<div class="list-group homelist">
					<?php 
							session_start();
							if($_SESSION['sid']==session_id())
							{
						?>

				  <a href="../admin/add_train.php" class="list-group-item ">Add Train</a>
				  <a href="../admin/add_train_status.php" class="list-group-item ">Add Train Status</a>
				  <a href="../admin/add_route.php" class="list-group-item " >Add Route</a>
				  <a href="../admin/logout.php"class="list-group-item ">Logout</a>
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
 

       