
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
    $train_name=test_input($_POST['train_name']);
    $train_type=test_input($_POST['train_type']);
    $off_day=test_input($_POST['off_day']);
    $source_stn=test_input($_POST['source_stn']);
    $destination_stn=test_input($_POST['destination_stn']);
    $source_id=test_input($_POST['source_id']);
    $destination_id=test_input($_POST['destination_id']);
 
    
    
     //mysqli_query($con,"INSERT INTO `train` (`train_id`,`train_name`,`train_type`,`source_stn`,`destination_stn`,`source_id`,`destination_id`) VALUES ('$train_id','$train_name','$train_type','$source_stn','$destination_stn','$source_id','$destination_id')") or die(mysql_error());
     //header("location:adminhome.php");
	 
 $statement = $db->prepare("INSERT INTO trains (train_id,train_name,train_type,off_day,source_stn,destination_stn,source_id,destination_id) VALUES (?,?,?,?,?,?,?,?)");
		
	$statement->execute(array($train_id,$train_name,$train_type,$off_day,$source_stn,$destination_stn,$source_id,$destination_id));
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
				x=document.forms["adform"]["train_name"].value;
				if(x==null || x=="")
				{
					alert("Enter Train name");
					return false;
				}
				x=document.forms["adform"]["train_type"].value;
				if(x==null || x=="")
				{
					alert("Enter Train type");
					return false;
				}
				x=document.forms["adform"]["off_day"].value;
				if(x==null || x=="")
				{
					alert("Enter Train Off Day");
					return false;
				}
				x=document.forms["adform"]["source_stn"].value;
				if(x==null || x=="")
				{
					alert("Enter Source stn");
					return false;
				}
				x=document.forms["adform"]["destination_stn"].value;
				if(x==null || x=="")
				{
					alert("Enter Destination stn");
					return false;
				}
				x=document.forms["adform"]["source_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Source ID number");
					return false;
				}
				x=document.forms["adform"]["destination_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Destination ID");
					return false;
				}
			
			}
		</script>
		
				<form class="form-horizontal" name="adform" action="" onsubmit="return validate_from()" method="post">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">train_id</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" name="train_id" placeholder="train_id">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">train_name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="train_name" placeholder="train_name">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">train_type</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="train_type" placeholder="train_type">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Off Day</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="off_day" placeholder="off_day">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">source_stn</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="source_stn" placeholder="source_stn">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">destination_stn</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="destination_stn" placeholder="destination_stn">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">source_id</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="source_id" placeholder="source_id">
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">destination_id</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputPassword3" name="destination_id" placeholder="destination_id">
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
<?php include('footer.php'); ?>
 

       