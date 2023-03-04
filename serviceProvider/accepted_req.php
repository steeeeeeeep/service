<?php require_once '../scripts/session.php';?>
<?php include '../include/config.php';
  require '../scripts/db_conn.php';?>

<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>WorkGO.ph</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/x-icon" href=
                "../images/Logo-Title.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
		.table th, .table td{
			width: 100px;
		}
	</style>
        <?php require_once '../include/sp_header.php';?>
	<br />
	<div class = "container-fluid">	
		<div class = "panel panel-default">
			<?php
				$q_p = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_r = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
			?>
			<div class = "panel-body">
				<h1>ACCEPTED REQUEST</h1><br>
				<div class="dashboard">
					<div id="box" class="success"><a href="request.php"><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div></span>Request</a></div>
					<div id="box" class="info1"><a ><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div></span> Accepted</a></div>
					<div id="box" class="warning"><a href = "checkout.php"><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
					<div id="box" class="danger"><a href = "rejected.php"><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
				</div>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Service Type</th>
							<th>Accepted</th>
							<th>Status</th>
							<th>Bill</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
							$query = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN `service_info` WHERE `booking_status` = 'Accepted' && `provider_id` = '$_SESSION[provider_id]' order by sched_date DESC") or die(mysqli_query());
							$count = $query->num_rows;

							if($count < 1 ){
						?>
							<tr>
								<td colspan="6">No Request Accepted yet!</td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){// Check if sched_date has passed
								$sched_date = $fetch['sched_date'];
								$booking_id = $fetch['booking_id'];
								$booking_status = $fetch['booking_status'];
							  
								if (strtotime($sched_date) < strtotime(date('Y-m-d'))) {
								  // Update booking_status to 'Completed'
								  $update_query = "UPDATE bookings SET booking_status='Done' WHERE booking_id=$booking_id";
								  $db_home_service_111->query($update_query);
								  $booking_status = 'Completed';
								}
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td style = 'color:#00ff00;'><?php echo date("d M, Y", strtotime($fetch['sched_date']))." @ ".date("h:i a", strtotime($fetch['booking_time']))?></td>
							<td><?php echo $fetch['booking_status']?></td>
							<td><?php echo "₱ ".number_format($fetch['bill']).".00"?></td>
							<?php if($fetch['sched_date'] == date('Y-m-d')){
								echo '<td><center><div><a  class="btn warning1" href = "checkout_query.php?booking_id='.$fetch['booking_id'].'" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> Check Out</a></center></td>';
							}
							else{
								echo '<td><center><div><a  class="btn warning1"><i class = "glyphicon glyphicon-check"></i> Check Out</a></center></td>';
							}?>
						</tr>
						<?php
							}
							$db_home_service_111->close();
						}
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />
</body>
	<script src = "../js/jquery.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
	<script type = "text/javascript">
		function confirmationCheckin(anchor){
			var conf = confirm("Are you sure you want to check out?");
			if(conf){
				window.location = anchor.attr("href");
			}
		}
	</script>
    <script src="../js/navs.js"></script>
</html>