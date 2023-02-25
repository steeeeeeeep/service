<?php
	require_once '../scripts/db_conn.php';
	require_once '../session.php';

	$time = date("H:i:s", strtotime("+7 HOURS"));
	$db->query("UPDATE `bookings` SET `booking_status` = 'Completed' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	$db->query("UPDATE `transactions` SET `checkout_time` = '$time' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	$db->query("UPDATE `provider_info` SET `status` = 'Available' WHERE `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
	header("location:checkout.php");

	
    $db->close();
?>