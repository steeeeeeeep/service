
<?php require_once '../session.php';?>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/navs.css">
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
				$q_p = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status`='Pending' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_r = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
			?>
			
			<div class="dashboard">
				<div id="box" class="success"><a href="request.php"><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div></span>Pendings</a></div>
				<div id="box" class="info1"><a href="accepted_req.php"><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div></span> Accepted</a></div>
				<div id="box" class="warning"><a href = "checkout.php"><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
				<div id="box" class="danger"><a><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
			</div>
			<br />
            <br>
                <table class="table table-bordered" id="other">
                <thead>
						<tr>
                            <th>Photo</th>
							<th>Service Provider</th>
							<th>Service Type</th>
							<th>Booking Date</th>
							<th>Service Reserved Date</th>
							<th>Status</th>
							<th>Response</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $db->query("SELECT * FROM bookings NATURAL JOIN transactions NATURAL JOIN provider_info NATURAL JOIN service_info LEFT JOIN sp_list ON sp_list.provider_id=bookings.provider_id WHERE customer_id='$_SESSION[customer_id]' AND booking_status='Rejected' ORDER BY sched_date DESC") or die(mysqli_error());
							$count = $query->num_rows;

							if($count < 1 ){
						?>
							<tr>
								<td colspan="8">No request has been rejected.</td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){
						?>
						<tr>
                            <td><?php echo "<img style='height:100px; width:100px;border-radius:100%; border: 2px solid #fff' src='../user_images/".$fetch['photo']."'>"?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td><?php echo date('F j, Y h:i A', strtotime($fetch['booking_date']))?></td>
							<?php if($fetch['booking_status'] == "Rejected"){?>
							<td style = 'color:#ff0000;'><strong><?php echo date("M d, Y H:i A", strtotime($fetch['sched_date']))?></strong></td>
							<td><label style = 'color:#ff0000;padding: 10px'>Rejected</label></td>
							<td><?php echo $fetch['response']?></td>

							<?php } else{?>
							<td></strong><label style = 'color:#00ff00;'><?php echo date("M d, Y H:i A", strtotime($fetch['sched_date']))?></label></strong></td>
							<td><label style = 'color:#00ff00;'><?php echo $fetch['booking_status']?></label></td>
							<?php } ?>
							<td><center>
								<a class="btn btn-success" href = "edit_booking.php?booking_id=<?php echo $fetch['booking_id']?>">Edit</a>
								<a class="btn btn-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?booking_id=<?php echo $fetch['booking_id']?>">Cancel</a></td>
						</tr>
						<?php
							}

						}

						$db->close();
						?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
	<script src="../js/show.js"></script>    
	<script src="../js/nav.js"></script>
</body>
</html>