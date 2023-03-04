<?php require_once '../scripts/session.php';?>
<?php require '../scripts/db_conn.php';?>
<?php

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending'  && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
$req = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
$notif = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Completed' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
$done = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Rejected' && `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
$rej = $query->fetch_array();


?>