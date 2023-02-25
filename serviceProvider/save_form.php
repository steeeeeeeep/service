<?php
	require_once '../scripts/db_conn.php';
	require_once '../session.php';

	if(ISSET($_POST['add_form'])){
		$time = date("H:i:s", strtotime("+8 HOURS"));

		
			$query2 = $db->query("SELECT * FROM `bookings` NATURAL JOIN `transactions` NATURAL JOIN `customer` NATURAL JOIN `service_info` WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$service_fee = $fetch2['service_fee'];
			$checkout = date("Y-m-d", strtotime($fetch2['sched_date']."+".$fetch2['days']."DAYS"));
			$db->query("UPDATE `bookings` SET `booking_status` = 'Accepted', `bill` = '$service_fee' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
			$db->query("UPDATE `transactions` SET `booking_time` = '$time', `checkout_date` = '$checkout' WHERE `booking_id` = '$_REQUEST[booking_id]'") or die(mysqli_error());
			header("location:request.php?");
		
	}
?>