<?php require_once '../scripts/session.php';?>
<?php require '../scripts/db_conn.php';?>
<?php

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Pending' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
$req = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Accepted' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
$notif = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `bookings` WHERE `booking_status` = 'Completed' && `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
$done = $query->fetch_array();

$query = $db_home_service_111->query(" SELECT COUNT(*) as total FROM `feedback` WHERE `provider_id` = '$_SESSION[provider_id]'") or die(mysqli_error());
$fff = $query->fetch_array();



?>