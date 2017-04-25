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
	$train_id=test_input($_POST['train_id']); 


    $statement = $db->prepare("SELECT * FROM trains WHERE train_id= ?");
	$statement->execute(array($train_id));

	


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
						<td><?php echo $row['train_id'] ?> </td>
						<td><?php echo $row['train_name'] ?> </td>
						<td><?php echo $row['train_type']?></td>
						<td><?php echo $row['source_stn']?></td>
						<td><?php echo $row['destination_stn']?></td>
					</tr>
<?php } ?>			
				</table>
	
	
				<table class="table tablebg">
				  <h2 style="color:#fff;">Train Schedule</h2>
					<tr>
						<th>Train ID</th>
						<th>stop number</th>
						<th>Station ID</th>
						<th>Arrival Time</th>
						<th>Departure Time</th>
					</tr>
<?php 
	$statement = $db->prepare("SELECT * FROM routes WHERE train_id= ?");
	$statement->execute(array($train_id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['train_id'] ?>  </td>
						<td><?php echo $row['stop_number'] ?> </td>
						<td><?php echo $row['station_id'] ?> </td>
						<td><?php echo $row['arrival_time'] ?>  </td>
						<td><?php echo $row['departure_time'] ?>  </td>
					</tr>
				
			
<?php 
} 
}else {  
?>		
			</table>
			<br></br>
			<br></br>
				<form style="margin-top:200px;" class="form-horizontal forminput" action="" method="post">
				
				  <div class="form-group">
					  <label class="col-sm-3 control-label"  for="sel1">Select Train Name</label>
					   <div class="col-sm-8" >
					  <select class="form-control forminp" id="sel1" name="train_id">
					    <option value="">Select train Name ....</option>
					  
					  <?php

						$statement = $db->prepare("SELECT * FROM  trains");
						$statement->execute(array());
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['train_id']; ?>"><?php echo $row['train_name'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
					  <input type="submit" value="Submit" name="submit" />
					</div>
				  </div>
				</form>
		<?php } ?>
			  </div>
			</div>
		</div>

<?php include('footer.php'); ?>
 

       