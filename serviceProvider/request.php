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
<link rel="stylesheet" href="../css/loader.css">
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
		#container1 {
			z-index: 4;
			width: 50%;
			position: fixed;
			display: none;
			gap: 10px;
			-webkit-animation: animatezoom 0.6s;
			animation: animatezoom 0.6s;
			left: 380px;
			top: 200px;
		}
    </style>
	<?php 

        require_once '../include/sp_header.php';
	
	?>
	
	<br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
			<?php
				$q_p = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_r = $db_home_service_111->query("SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
			?>
			
				<h1>PENDING REQUEST</h1><br>
				<div class="dashboard">
					<div id="box" class="success"><a><div><i class="fa fa-clock-o">		<?php echo $f_p['total']?></i></div></span>Request</a></div>
					<div id="box" class="info1"><a href="accepted_req.php"><div><i class="fa fa-check-circle">		<?php echo $f_a['total']?></i></div></span> Accepted</a></div>
					<div id="box" class="warning"><a href = "checkout.php"><div class="icon"><i class = "fa fa-eye"></i></div><div><span>Completed Task</span></div></a></div>
					<div id="box" class="danger"><a href = "rejected.php"><div class="icon"><i class = "fa fa-trash">		<?php echo $f_r['total']?></i></div><div><span>Rejected</span></div></a></div>
				</div>
				<br>
				<br>
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Contact No</th>
							<th>Service Type</th>
							<th>Query</th>
							<th>Booking Date</th>
							<th>Service Request Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN service_info WHERE `booking_status` = 'Pending' && `provider_id`='$_SESSION[provider_id]' ORDER BY sched_date DESC") or die(mysqli_error());
							$count = $query->num_rows;

							$query2 = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN service_info WHERE `booking_status` = 'Accepted' && `provider_id`='$_SESSION[provider_id]' ORDER BY sched_date DESC") or die(mysqli_error());
							$sched = [];

							while($fetch2 = $query2->fetch_array()){
								$sched[]= date('Y-m-d', strtotime($fetch2['sched_date']));
								echo '<script>console.log('.json_encode($sched).');</script>';
								if (!$query2) {
									die(mysqli_error($db_home_service_111));
								}
							}
		
							if($count < 1 ){
						?>
							<tr>
								<td colspan="7">No Request yet!</td>
							</tr>
						<?php
							} else{
							while($fetch = $query->fetch_array()){
						
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['contact']?></td>
							<td><?php echo $fetch['service_type']?></td>
							<td><?php 
							if ($fetch['queries'] ==null){
								echo "<span style='color: gray;'>None</span>";}
							else{
								echo $fetch['queries'];
							}
							?></td>
							<td><?php echo date('M d, Y @ h:i A', strtotime($fetch['booking_date']))?></td>
							<td style='color:#ff0000;'><strong><?php 
							if($fetch['sched_date'] <= date("Y-m-d ")){
								echo date("M d, Y @ h:i A", strtotime($fetch['sched_date']))."<td style = 'color:#ff0000; font-size: 12pt;'>Outdated</td>";}
							else{
								echo "<label style = 'color:#00ff00;'>".date("M d, Y @ h:i A", strtotime($fetch['sched_date']))."</label>
								<td style = 'color:#00ff00; font-size: 12pt;'>" . $fetch['booking_status'] . "</td>";}?></strong>
							</td>
							<td>
							<center>
							<?php 
								if($fetch['sched_date'] <= date("Y-m-d ") || in_array(date('Y-m-d', strtotime($fetch['sched_date'])), $sched)){?>
									<div class=""><a class="btn btn-secondary">Accept</a>
								<?php }
								else{ ?>
									<div ><a class="btn btn-primary" href = "confirm_reserve.php?booking_id=<?php echo $fetch['booking_id']?>" >Accept</a>
									<?php }?><a type="button" class="btn btn-danger" id='id' onclick = "showMsg()">Decline</a>
									
	<div id="container1">
			<div class="con">
				<span><strong>Select atleast one message to proceed.</strong></span>
				<div class="mess">
					<div class="list">
					<label for="1">Sorry, I am busy at this period of time.</label>
					<input type="radio" name="message" id="1" value="Sorry, I am busy at this period of time." required>
					</div>
					<div class="list">
					<label for="2">Sorry, I have another customer.</label>
					<input type="radio" name="message" id="2" value="Sorry, I have another customer." required>
					</div>
					<div class="list">
					<label for="3">Your location is unclear. Please change or enter you complete address clearly.</label>
					<input type="radio" name="message" id="3" value="Your location is unclear. Please change or enter you complete address clearly." required>
					</div>
					<div class="list">
					<label for="4">Lorem ipsum dolor sit amet.</label>
					<input type="radio" name="message" id="4" value="" required>
					</div>
					<div class="list">
					<label for="5">Lorem ipsum dolor sit amet consectetur.</label>
					<input type="radio" name="message" id="5" value="" required>
					</div>
					<div class="list">
					<label for="6">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</label>
					<input type="radio" name="message" id="6" value="" required>
					</div>
				</div>
				<a class="btn btn-primary" id='msg' onclick="confirmationDelete(); return false;" href = "delete_pending.php?booking_id=<?php echo $fetch['booking_id']?>">Confirm</a>
			</div>
		</div>
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
			<p>*Note: If request is not accepted it will be marked as 'Outdated'.</p>
		</div>
    </div>
    </div>
		
<script src = "../js/jquery.js"></script>
<script src="../js/show.js"></script>
<script>
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to Cancel this request?")
			// code to get the selected radio button value
			var message = document.querySelector('input[name="message"]:checked').value;
			// code to update the href attribute
			var link = document.getElementById('msg').href;
			link += "&message=" + message;
			document.getElementById('msg').href = link;
			console.log(link);
		if(conf){
			window.location = anchor.attr("href");
		}
	}
</script>
<script src="../js/nav.js"></script>
</body>
</html>