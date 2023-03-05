<!DOCTYPE html>
<?php
	require_once '../scripts/session.php';
	require_once '../scripts/db_conn.php';
	
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
	if(!ISSET($_SESSION['provider_id']))
		{
			header('location:index.php');
		}
?>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WorkGo.ph</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="icon" type="image/x-icon" href=
                "../images/Logo-Title.png">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/navi.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/request.css">

		<style>
			.service-info {
				display: grid;
				align-content: space-evenly;
				justify-content: center;
				align-items: start;
				justify-items: start;
			}
			body{
				background: #212529
			}
			.container-fluid{
				display: flex;
				justify-content: center;
				background: #212529;
			}
			.panel.panel-default {
				width: 60%;
				padding: 20px;
			}
			.back{
				background: none;
				border: none;
				color: #08f8f0;
			}
			.form-inline{
				gap: 5px;
				display: flex;
				align-items: flex-end;
				flex-wrap: wrap;
			}
		</style>
	</head>
<body>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "back-button">
					<button onclick="history.back()" class="back"><i class="fa fa-arrow-left" style="border:none;"></i></button>
					<span>back</span></div>
				<?php
					$query = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `customer` NATURAL JOIN `service_info` WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<form method = "POST" enctype = "multipart/form-data" action = "save_form.php?booking_id=<?php echo $fetch['booking_id']?>">
					<div class="service-info">
						<div class = "form-inline" style = "float:left;">
							<label>Customer Name: </label>
							<br />
							<span><strong><?php echo $fetch['firstname'].' '.$fetch['lastname']?></strong></span>
						</div>
						<div class="form-inline">
							<label>Address: </label>
							<br />
							<span><strong><?php echo $fetch['adder']?></strong></span></div>
						<br style = "clear:both;"/>
						<br />
						<div class = "form-inline" style = "float:left;">
							<label>Type of Service:  </label>
							<br />
							<span><strong><?php echo $fetch['service_type']?></strong></span>
						</div>
						<div class = "form-inline" >
							<label>Service Fee: </label>
							<br />
							<span><strong><?php echo '₱ '.number_format($fetch['service_fee']).'.00'?></strong></span>
						</div>
						<div class = "form-inline" >
							<label>Service Schedule: </label>
							<br />
							<span><strong><?php echo date('l, F j, Y H:i A', strtotime($fetch['sched_date']))?></strong></span>
						</div>
					</div>
					<br style = "clear:both;"/>
					<br />
					<center><button name = "add_form" class = "btn btn-primary"><i class = "glyphicon glyphicon-save"></i> Submit</button></center>
				</form>
			</div>
		</div>
	</div>
	<br />
	<br />
	<?php
	
	$db_home_service_111->close();
	?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
<script src="../js/nav.js"></script>
</html>