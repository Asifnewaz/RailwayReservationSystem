 <?php 
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
    $stop_number=test_input($_POST['stop_number']);
    $station_id=test_input($_POST['station_id']);
    $arrival_time=test_input($_POST['arrival_time']);
    $departure_time=test_input($_POST['departure_time']);
 
 $statement = $db->prepare("INSERT INTO routes (train_id,stop_number,station_id,arrival_time,departure_time)VALUES(?,?,?,?,?)");
		
	$statement->execute(array($train_id,$stop_number,$station_id,$arrival_time,$departure_time));
	header("location:adminhome.php");
} 

?>

<?php include('header.php'); ?>

			  <div class="col-md-12 forminput">
			  <script>
function validate_from()
			{
				var x=document.forms["adform"]["train_id"].value;
				if(x==null || x=="")
				{
					alert("Enter your Train ID");
					return false;
				}
				x=document.forms["adform"]["stop_number"].value;
				if(x==null || x=="")
				{
					alert("Enter stop number");
					return false;
				}
				x=document.forms["adform"]["station_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Station ID");
					return false;
				}
				x=document.forms["adform"]["arrival_time"].value;
				if(x==null || x=="")
				{
					alert("Enter Arrival time");
					return false;
				}
				x=document.forms["adform"]["departure_time"].value;
				if(x==null || x=="")
				{
					alert("Enter Departure time");
					return false;
				}

			}
		</script>
			 
				
				<form class="form-horizontal" name="adform" action="" onsubmit="return validate_from()" method="post">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Train_ID</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" name="train_id" placeholder="Train_ID">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">stop_number</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="stop_number" placeholder="stop_number">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Station_ID</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="station_id" placeholder="Station_ID">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Arrival_time</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="arrival_time" placeholder="Arrival_time">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Departure_time</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="departure_time" placeholder="Departure_time">
					</div>
				  </div>
				 
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					 <a><input type="submit" value="Submit" name="submit" /></a>
					</div>
				  </div>
				</form>
				
			  </div>
			</div>
		</div>
<?php include('footer.php'); ?>
 

       