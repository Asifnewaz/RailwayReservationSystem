<?php include('header.php'); 

require '../dbconnect.php';

if(isset($_POST['submit']))
{
	$pnr=$_POST['pnr'];
	$statement = $db->prepare("SELECT * FROM tickets WHERE pnr = ?");
	$statement->execute(array($pnr));
	$result = $statement->fetch()['train_id'];
	$train_id = $result;
	if(empty($result))
	{
		
		?> 

				<div class="col-md-3">
				<table class="table tablebg">
					<tr>
						<td>Invalid PNR Number.</td>
					</tr>
				</table>
				</div>

				<?php
	}
	else
	{
		$msg="ok";
	}
}
?>
			  <div class="col-md-12 forminput">
			  
				
				<form class="form-horizontal action="" method="post" ">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">PNR No</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="PNR" name="pnr">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					 <input type="submit" value="Submit" name="submit" />
					</div>
				  </div>
				</form>
				 <br> </br>
		<?php
				if(isset($msg))
				{

				
		?>		
				
				<table class="table tablebg">
					<tr>
						<td><center>Status of your tickets ..</center></td>
					</tr>
				</table>
				
				<table class="table tablebg">

				  <tr>
					<td>PNR </td>
					<td>Passenger Name </td>
					<td>Source </td>
					<td>Destination </td>
					<td>Train</td>
					<td>No of Seat</td>
					<td>Status</td>
				  </tr>

				  <?php 
				  	$statement = $db->prepare("SELECT * FROM trains WHERE train_id = ?");
					$statement->execute(array($train_id));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row) {
				  		}

					$statement1 = $db->prepare("SELECT * FROM tickets WHERE pnr = ?");
					$statement1->execute(array($pnr));
					$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result1 as $row1) {
					}

				  ?>
				  
				 
				<tr>
					<td><?php echo $pnr;?></td>
					<td><?php echo $row1['passenger_name'];?></td>
					<td><?php echo $row['source_stn'];?></td>
					<td><?php echo $row['destination_stn'];?></td>
					<td><?php echo $row['train_name'];?></td>
					<td><?php echo $row1['no_of_seats']?></td>
					<td><?php echo $row1['train_status']?></td>
				  </tr>
				</table>
				<?php
						
					}
				?>				
				
			  </div>
			</div>
		</div>
<?php include('../footer.php'); ?>
 

       