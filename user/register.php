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

    $email_id=test_input($_POST['email_id']);
    $password=test_input($_POST['password']);
    $password = md5($password);
    $fullname=test_input($_POST['fullname']);
    $gender=test_input($_POST['gender']);
    $age=test_input($_POST['age']);
    $mobile=test_input($_POST['mobile']);
    $city=test_input($_POST['city']);
    $state=test_input($_POST['state']);
    
    
     // mysqli_query($con,"INSERT INTO `user_table` (`email_id`,`password`,`fullname`,`gender`,`age`,`mobile`,`city`,`state`) VALUES ('$email_id','$password','$fullname','$gender','$age','$mobile','$city','$state')") or die(mysql_error());
     // header("location:../index.php");

    $statement = $db->prepare("INSERT INTO user_table (email_id,password,fullname,gender,age,mobile,city,state) VALUES (?,?,?,?,?,?,?,?)");
		
	$statement->execute(array($email_id,$password,$fullname,$gender,$age,$mobile,$city,$state));
	header("location:../index.php");
} 

?>

			<script>
			function validate_from()
			{
				var x=document.forms["adform"]["email_id"].value;
				if(x==null || x=="")
				{
					alert("Enter your email_id");
					return false;
				}
				x=document.forms["adform"]["password"].value;
				if(x==null || x=="")
				{
					alert("Enter password");
					return false;
				}
				x=document.forms["adform"]["fullname"].value;
				if(x==null || x=="")
				{
					alert("Enter fullname");
					return false;
				}
				x=document.forms["adform"]["gender"].value;
				if(x==null || x=="")
				{
					alert("Enter gender");
					return false;
				}
				x=document.forms["adform"]["age"].value;
				if(x==null || x=="")
				{
					alert("Enter age");
					return false;
				}
				x=document.forms["adform"]["mobile"].value;
				if(x==null || x=="")
				{
					alert("Enter mobile number");
					return false;
				}
				x=document.forms["adform"]["city"].value;
				if(x==null || x=="")
				{
					alert("Enter city");
					return false;
				}
				x=document.forms["adform"]["state"].value;
				if(x==null || x=="")
				{
					alert("Enter state");
					return false;
				}
			}
		</script>
			 
			  <div class="col-md-12 forminput">
				<form name="adform" action="" onsubmit="return validate_from()" method="post" class="form-horizontal" >
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Email ID</label>
					<div class="col-sm-8">
					  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email_id">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Full Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Full Name" name="fullname">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Gender" name="gender">
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Age</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Age" name="age">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">Phone Number</label>
  					
					<div class="col-sm-8">
					  <input class="form-control" type="tel" pattern="^\d{11}$" required name="mobile" placeholder="(format: xxxxxxxxxxx)" >
					</div>
				  </div>
				  <div class="form-group">
					<label  class="col-sm-3 control-label">city</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="City" name="city">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-sm-3 control-label">state</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="State" name="state">
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
 

       