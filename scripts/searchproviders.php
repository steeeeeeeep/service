<?php

require_once 'helpers.php';
include "DB.php";


if (isset($_POST['barangay']) && isset($_POST['service_type']) && isset($_POST['sched_date'])) {
    $input = clean($_POST);
    
$barangay = $input['barangay'];
$service_type = $input['service_type'];
$date = date('Y-m-d', strtotime($input['sched_date']));

$sql = "SELECT * , CASE WHEN provider_id IN (SELECT provider_id FROM bookings WHERE sched_date=? AND booking_status='accepted') THEN 'unavailable' ELSE 'available' END AS availability FROM workers natural join provider_info natural join service_info where barangay=? AND service_type=? ORDER BY availability";

$stmt = DB::query($sql, [
    $date, $barangay,$service_type
]);

$providers = $stmt->fetchAll(PDO::FETCH_OBJ);

if (count($providers) > 0) {
    echo json_encode($providers);
        
} else {
    echo '{"failed": true }';
}
}


