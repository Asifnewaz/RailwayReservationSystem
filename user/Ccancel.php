<?php include('header.php'); ?>
			 

<?php

    require '../dbconnect.php';

	if(isset($_POST['submit']))
	{
		$pnr=$_POST['pnr'];


		$statement = $db->prepare("SELECT * FROM tickets WHERE pnr = ?");
		$statement->execute(array($pnr));
		$result = $statement->fetch()['pnr'];
	
		if(!empty($result))
		{
		
				$statement = $db->prepare("DELETE FROM tickets WHERE pnr=?");
				$statement->execute(array($pnr));
				
				
				?> 

				<div align="center" class="col-md-3">
				<table class="table tablebg">
					<tr>
						<td>Your Requested is completed </td>
					</tr>
					<tr>
						<td>Your have cancelled the seat.</td>
					</tr>
				</table>
				</div>

				<?php
				
			}else{
			?> 
			<div align="center" class="col-md-3">
				<table class="table tablebg">
					<tr>
						<td>You can enter invalid PNR</td>
					</tr>
					<tr>
						<td>Unable to Cancel.</td>
					</tr>
				</table>
				</div>
			<?php
			}
		}
			
			
	

?>
<?php include('footer.php'); ?>