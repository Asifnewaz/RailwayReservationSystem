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

    $pname=test_input($_POST['pname']);
    $date=test_input($_POST['date']);
    $seat_no=test_input($_POST['seat_no']);

    $statement = $db->prepare("INSERT INTO train_status (train_id,available_date,booked_seats,available_seats) VALUES (?,?,?,?)");
		
	$statement->execute(array($pname,$date,'0',$seat_no));
	header("location:adminhome.php");
} 

 	

?>

			<script>
			function validate_from()
			{
				var x=document.forms["adform"]["pname"].value;
				if(x==null || x=="")
				{
					alert("Enter your name");
					return false;
				}
				x=document.forms["adform"]["date"].value;
				if(x==null || x=="")
				{
					alert("Enter date");
					return false;
				}
				x=document.forms["adform"]["seat_no"].value;
				if(x==null || x=="")
				{
					alert("Enter seat_no no.");
					return false;
				}
				x=document.forms["adform"]["train_no"].value;
				if(x==null || x=="")
				{
					alert("Enter train_no no.");
					return false;
				}
				
			}
		</script>
			 
			  <div class="col-md-12 forminput">
				<form style="margin-top:25px;" name="adform" action="" onsubmit="return validate_from()" method="post" class="form-horizontal" >
				  <div class="form-group">
					  <label  class="col-sm-3 control-label" for="sel1">Select Train Name</label>
					  <div class="col-sm-8" >
					  <select  class="form-control forminp selectform" id="sel1" name="pname">
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
					<label  class="col-sm-3 control-label">Available Date</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputdate3" placeholder="date : 2016-10-01" name="date">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Number of seats</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Number of seat_no" name="seat_no">
					</div>
				  </div>			
				 
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
					  <a><input type="submit" value="Submit" name="submit" /></a>
					</div>
				  </div>
				</form>
				
			  </div>
			</div>
		</div>
<?php include('../footer.php'); ?>
 

       