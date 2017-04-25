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
    $available_date=test_input($_POST['available_date']);	
    $available_date = date($available_date);	 


    $statement = $db->prepare("SELECT * FROM train_status WHERE train_id= ? and available_date = ? ");
	$statement->execute(array($train_id , $available_date));


?>		  
		<div class="col-md-12 forminput">
			<table class="table tablebg">
					<tr>
						<th>Train_ID</th>
						<th>Available Date</th>
						<th>Booked Seats</th>
						<th>Available Seats</th>
					</tr>
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['train_id'] ?> </td>
						<td><?php echo $row['available_date']?></td>
						<td><?php echo $row['booked_seats']?></td>
						<td><?php echo $row['available_seats']?></td>
						
					</tr>
<?php } ?>
					
				</table>
			
			
<?php 
	} else {  
?>		
			
				<form style="margin-top:300px;" class="form-horizontal forminput" action="" method="post">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Train Number</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Train No" name="train_id">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Journey Date</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Date" name="available_date">
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
 

       