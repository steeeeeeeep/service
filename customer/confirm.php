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
	if(!ISSET($_SESSION['customer_id']))
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
        <script src="../js/navs.js"></script>
        <link rel="stylesheet" href="../css/main.css">

        <link rel="stylesheet" href="../css/navi.css">
		<link rel="stylesheet" href="../css/request.css">
	</head>
<body>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default" style="background-color: rgb(241, 241, 241); margin: 50px;">
			<div class = "panel-body">
				<div class = "alert alert-info">
					<button onclick="history.back()"><i class="fa fa-arrow-left" style="border:none;"></i></button>
					Fill up form</div>
				<?php
					$query = $db_home_service_111->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN `service_info` WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<form method = "POST" enctype = "multipart/form-data" action = "../scripts/bookhall.php?booking_id=<?php echo $fetch['booking_id']?>">
					<div class="date-today">
						<span><?php echo $fetch['booking_date']?></span>
					</div>
					<div class="info" style="color: black;">
						<div class="review">
							<span>Service Provider<strong><?php echo $fetch['firstname']." ".$fetch['lastname']?></strong></span>
						</div>
						<div class="review">
							<span>Requested Service<strong><?php echo $fetch['service_type']?></strong></span>
						</div>
						<div class="review">
							<span>Service Fee<strong><?php echo $fetch['service_fee']?></strong></span>
						</div>
						<div class="review">
							<span>Service Date<strong><?php echo $fetch['sched_date']?></strong></span>
						</div>
						<div class="review">
							<span></span>
						</div>
					</div>
					<br style = "clear:both;"/>
					<br />
					<button name = "book" class = "btn btn-primary"><i class = "glyphicon glyphicon-save"></i>Confirm</button>
				</form>
			</div>
		</div>
	</div>
	<?php
    $db_home_service_111->close();
	?>
	<br />
	<br />
</body>	
</html>