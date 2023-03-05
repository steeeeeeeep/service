<?php require_once '../scripts/session.php';?>
<?php include '../include/config.php';
  require '../scripts/db_conn.php';?>
<?php
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    if(!ISSET($_SESSION['provider_id']))
        {
            header('location:index.php');
        }
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset= "utf=8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WorkGo.ph</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="icon" type="image/x-icon" href=
                "../images/Logo-Title.png">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
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
        <?php require_once '../include/sp_header.php';?><br>
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
				<h1>PENDING REQUEST</h1><br>
				<div class="dashboard">
					<div id="box" class="success"><a href='request.php'><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div></span>Request</a></div>
					<div id="box" class="info1"><a href="accepted_req.php"><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div></span> Accepted</a></div>
					<div id="box" class="warning"><a href = "checkout.php"><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
					<div id="box" class="danger"><a ><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
				</div>
				<br>
				<br>
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Contact No</th>
							<th>Service Type</th>
							<th>Booking Date</th>
							<th>Service Request Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN service_info WHERE `booking_status` = 'Rejected' && `provider_id`='$_SESSION[provider_id]' ORDER BY sched_date DESC") or die(mysqli_error());
							$count = $query->num_rows;

							if($count < 1 ){
						?>
							<tr>
								<td colspan="7">No Rejected Request</td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){
						
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['contact']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td><?php echo date('M d, Y @ h:i A', strtotime($fetch['booking_date']))?></td>
							<td><strong><?php 
							if($fetch['sched_date'] <= date("Y-m-d ", strtotime("+7 HOURS"))){
								echo date("M d, Y @ h:i A", strtotime($fetch['sched_date']))."<td style = 'color:#ff0000; font-size: 12pt;'>Outdated</td>";}
							else{
								echo "<label style = 'color:#00ff00;'>".date("M d, Y @ h:i A", strtotime($fetch['sched_date']))."</label>
								<td style = 'color:#00ff00; font-size: 12pt;'>" . $fetch['booking_status'] . "</td>";}?></strong></td>
							<td><center>
								
							<?php if($fetch['sched_date'] <= date("Y-m-d ", strtotime("+7 HOURS"))){?>
								<div class=""><a class="btn btn-secondary">Accept</a>
							<?php }
							else{ ?>
								<div ><a class="btn btn-primary" href = "confirm_reserve.php?booking_id=<?php echo $fetch['booking_id']?>" >Accept</a>
								<?php }?><a class="btn btn-danger" onclick = "showMsg()" >Decline</a></td>
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
	</div>
	<br />
	<br />
</body>
<script src = "../js/jquery.js"></script>
<script src="../js/show.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to Cancel this request?");
	} 
</script>
<script src="../js/nav.js"></script>