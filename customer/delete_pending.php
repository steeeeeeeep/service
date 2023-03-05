<?php
	require_once '../scripts/db_conn.php';
	require_once '../scripts/session.php';
	$db_home_service_111->query("UPDATE `bookings` SET `booking_status`='Cancelled' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	echo '<script>alert("successfully deleted");</script>';
	echo '<script>window.location="request.php";</script>';

	
    $db_home_service_111->close();
?>