<?php require_once '../session.php';?>
<?php include '../include/config.php';
  require '../scripts/db_conn.php';?>
<?php
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    if(!ISSET($_SESSION['customer_id']))
        {
            header('location:index.php');
        }
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WorkGo.ph</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="js/nav.js"></script>
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

	<div class = "container-fluid">	
		<div class = "panel panel-default">
			<?php
				$q_p = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_r = $db->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
			?>
			<div class = "panel-body">
				<h1>COMPLETED SERVICE</h1><br>
				<div class="dashboard">
					<div id="box" class="success"><a href="request.php"><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div></span>Pendings</a></div>
					<div id="box" class="info1"><a href="accepted_req.php"><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div></span> Accepted</a></div>
					<div id="box" class="warning"><a><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
					<div id="box" class="danger"><a href = "rejected.php"><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
				</div>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Service Type</th>
							<th>Accepted Time</th>
							<th>Check Out</th>
							<th>Status</th>
							<th>Bill</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = $db->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `service_info` LEFT JOIN sp_list ON sp_list.provider_id=bookings.provider_id WHERE `booking_status` = 'Completed'") or die(mysqli_query());
							$count = $query->num_rows;

							if($count < 1 ){
						?>
							<tr>
								<td colspan="8">No task completed yet!</td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td style = 'color:#00ff00;'><?php echo date("d M, Y", strtotime($fetch['booking_date']))." @ ".date("h:i a", strtotime($fetch['booking_time']))?></td>
							<td style = 'color:#ff0000;'><?php echo date("d M, Y", strtotime($fetch['booking_date']."+".$fetch['days']."DAYS"))." @ ".date("h:i A", strtotime($fetch['checkout_time']))?></td>
							<td><?php echo $fetch['booking_status']?></td>
							<td><?php echo "₱ ".number_format($fetch['bill']).".00"?></td>
							<td><span>Paid</span></td>
							<td><a class="btn btn-success" href="sp_profile_info.php?provider_id=<?php echo $fetch['provider_id']?>"><i></i>Rate</a></td>
						</tr>
						<?php
							}
							$db->close();
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>