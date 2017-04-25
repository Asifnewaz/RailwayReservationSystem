<?php include('header.php'); ?>

<?php 

include("../dbconnect.php");

if(isset($_POST['form_login'])) 
{
    
    try {

        if(empty($_POST['email_id'])) {
            throw new Exception('email_id can not be empty');
        }
        
        if(empty($_POST['password'])) {
            throw new Exception('Password can not be empty');
        }
    
        
        $password = $_POST['password']; // admin
        $password = md5($password);
    
    
        $num=0;
                
        $statement = $db->prepare("SELECT * FROM user_table WHERE email_id=? AND password=?");
        $statement->execute(array($_POST['email_id'],$password));       
        
        $num = $statement->rowCount();
        
        if($num>0) 
        {
            session_start();
            $_SESSION['sid'] = session_id();
            header("location: userhome.php");
        }
        else
        {
            throw new Exception('Invalid Username and/or password');
        }

    }
    
    catch(Exception $e) {
        $error_message = $e->getMessage();
    }
    
}

?>
 
			  <div class="col-md-12 forminput">
			  
				
				<form class="form-horizontal" method="post" action="">
				  <div class="form-group">
					<label  class="col-sm-3 control-label">Email ID</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email_id">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
					</div>
				  </div>
				 
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-8">
					  <a><input type="submit" value="LOGIN" name="form_login" /></a>
					</div>
				  </div>
				</form>
				
			  </div>
			</div>
		</div>
<?php include('footer.php'); ?>
 

       