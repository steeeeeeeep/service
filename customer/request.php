
<?php require_once '../scripts/session.php';?>
<?php require '../scripts/db_conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkGo.ph</title>
	<link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="../css/reqs.css">

</head>
<body>
    <style>
        .req {
			background: rgb(0,0,0,15%);
        }
		.req a{
            color: #088F8F;
		}
    </style>
	<?php 

        require_once '../include/c_header.php';
	
	?>

    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
			<h1>REQUEST</h1><br>

			<?php
				$q_p = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_r = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
			?>
			
			<div class="dashboard">
				<div id="box" class="success"><a><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div><div><span>Request</span></div></a></div>
				<div id="box" class="info1"><a href="accepted_req.php"><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div><div><span>Accepted</span></div></a></div>
				<div id="box" class="warning"><a href = "checkout.php"><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
				<div id="box" class="danger"><a href = "rejected.php"><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
			</div>
			<br />
            <br>
                <table class="table table-bordered" id="other">
                <thead>
						<tr>
                            <th>Photo</th>
							<th>Service Provider</th>
							<th>Contact No</th>
							<th>Service Type</th>
							<th>Booking Date</th>
							<th>Service Reserved Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $db_home_service_111->query("SELECT * FROM bookings NATURAL JOIN transactions NATURAL JOIN provider_info NATURAL JOIN service_info LEFT JOIN workers ON workers.provider_id=bookings.provider_id WHERE customer_id='$_SESSION[customer_id]' AND booking_status='Pending' ORDER BY sched_date DESC") or die(mysqli_error());
							$count = $query->num_rows;

							if($count < 1 ){
						?>
							<tr>
								<td colspan="8">You haven't made any Request yet! <a href="WorkGO_customer.php" style="color: #0048ff">Request now!</a></td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){
						?>
						<tr>
                            <td><?php echo "<img style='height:100px; width:100px;border-radius:100%; border: 2px solid #fff' src='../user_images/".$fetch['photo']."'>"?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['contact']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td><?php echo date('F j, Y h:i A', strtotime($fetch['booking_date']))?></td>
							<?php if($fetch['sched_date'] <= date("Y-m-d")){?>
							<td style = 'color:#ff0000;'><strong><?php echo date("M d, Y h:i A", strtotime($fetch['sched_date']))?></strong></td>
							<td><label style = 'color:#ff0000; padding: 10px'>Outdated</label></td>

							<?php } else{?>
							<td style = 'color:#00ff00;'><?php echo date("M d, Y h:i A", strtotime($fetch['sched_date']))?></td>
							<td><label style = 'color:#00ff00;'><?php echo $fetch['booking_status']?></label></td>
							<?php } ?>
							<td>
								<center>
								<a class="btn btn-primary" href = "edit_booking.php?booking_id=<?php echo $fetch['booking_id']?>">Edit</a>
								<a class="btn btn-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?booking_id=<?php echo $fetch['booking_id']?>">Cancel</a>
								</center>
							</td>
						</tr>
						<?php
							}

						}

						$db_home_service_111->close();
						?>
					</tbody>
                </table>
            </div>
		<div class="note">
			<p>*Please Note that if the request is not accepted will be marked as 'Outdated'.</p>
		</div>
        </div>
    </div>
	<script>
		function confirmationDelete(anchor){
			var conf = confirm("Are you sure you want to Cancel this request?")
			if(conf){
				window.location = anchor.attr("href");
			}
		}
	</script>
	<script src="../js/nav.js"></script>  
	<script src="../js/loaders.js"></script>
</body>
</html>