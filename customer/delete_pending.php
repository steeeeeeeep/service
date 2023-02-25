<?php
	require_once '../scripts/db_conn.php';
	require_once '../session.php';
	$db->query("UPDATE `bookings` SET `booking_status`='Cancelled' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	echo '<script>alert("successfully deleted");</script>';
	echo '<script>window.location="request.php";</script>';

	
    $db->close();
?>