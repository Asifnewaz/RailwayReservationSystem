<?php include('header.php'); ?>
			 
			  <div class="col-md-12 forminput">
			 
		<?php
				if(isset($msg))
				{
					$query2=mysqli_query($con,"select * from train where Train_ID='$Train_ID'");
			$result2=mysqli_fetch_array($query2);
			$number=$result['Train_ID'];
			$query3=mysqli_query($con,"select * from train where Train_ID='$number'");
			$result3=mysqli_fetch_array($query3);
			echo "Status of Your Ticket";}
		?>
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
				 
				<tr>
					<td><?php //echo $pnr;?></td>
					<td><?php //echo $result['Passeneger_Name'];?></td>
					<td><?php //echo $result2['Source_stn'];?></td>
					<td><?php //echo $result2['Destination_stn'];?></td>
					<td><?php //echo $result2['Train_name'];?></td>
					<td><?php //echo $result['No_of_seats']?></td>
					<td><?php //echo $result['Train_status']?></td>
				  </tr>
				</table>
								
				
			  </div>
			</div>
		</div>
<?php include('../footer.php'); ?>
 

       