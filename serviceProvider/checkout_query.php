<?php
	require_once '../scripts/db_conn.php';
	require_once '../scripts/session.php';

	$time = date("H:i:s", strtotime("+7 HOURS"));
	$db_home_service_111->query("UPDATE `bookings` SET `booking_status` = 'Completed' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	$db_home_service_111->query("UPDATE `transactions` SET `checkout_time` = '$time' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
	$db_home_service_111->query("UPDATE `provider_info` SET `status` = 'Available' WHERE `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
	header("location:checkout.php");

	
    $db_home_service_111->close();
?>