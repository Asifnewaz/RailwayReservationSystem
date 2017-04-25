<?php include('header.php'); 
require '../dbconnect.php';
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if(isset($_POST['submit']))
{ 
	$source_stn=test_input($_POST['source_stn']);
    $destination_stn=test_input($_POST['destination_stn']);	
    	 


    $statement = $db->prepare("SELECT * FROM trains WHERE source_stn=? AND destination_stn=? ");
	$statement->execute(array($source_stn , $destination_stn));


?>
			  <div class="col-md-12 forminput">
			<table class="table tablebg">
					<tr>
						<th>Train_ID</th>
						<th>Train_name</th>
						<th>Train_type</th>
						<th>Source_stn</th>
						<th>Destination_stn</th>
					</tr>
					
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['train_id'] ?></td>
						<td><?php echo $row['train_name'] ?></td>
						<td><?php echo $row['train_type'] ?></td>
						<td><?php echo $row['source_stn'] ?></td>
						<td><?php echo $row['destination_stn'] ?></td>
					</tr>
<?php } ?>
				</table>
				
<?php 
	} else {  
?>	
				<form class="form-horizontal" style="margin-top:300px;" action="" method="post">
				  <div class="form-group">
					  <label class="col-sm-2 for="sel1">Source Station</label>
					  <div class="col-sm-7">
					  <select class="form-control forminp" id="sel1" name="source_stn">
					    <option value="">Select Station ....</option>
					  
					  <?php

						$statement = $db->prepare("SELECT * FROM  trains");
						$statement->execute(array());
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['source_stn']; ?>"><?php echo $row['source_stn'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				  <div class="form-group">
					  <label class="col-sm-2 for="sel1">Destination Station</label>
					  <div class="col-sm-7">
					  <select class="form-control forminp" id="sel1" name="destination_stn">
					    <option value="">Select Station ....</option>
					  
					  <?php

						$statement = $db->prepare("SELECT * FROM  trains");
						$statement->execute(array());
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['destination_stn']; ?>"><?php echo $row['destination_stn'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
					  <a><input type="submit" value="Submit" name="submit" /></a>
					</div>
				  </div>
				</form>
<?php  } ?>
			  </div>
			</div>
		</div>
<?php include('../footer.php'); ?>
 

       