<?php

require_once 'helpers.php';
require_once 'db_conn.php';

if (isset($_POST['book'])) {
    $input = clean($_POST);
 
    $provider = mysqli_real_escape_string($db,$_POST['provider']);
    $customer = mysqli_real_escape_string($db,$_POST['customer']);
    $contact = mysqli_real_escape_string($db,$_POST['contact']);
    $barangay = mysqli_real_escape_string($db,$_POST['barangay']);
    $zone = mysqli_real_escape_string($db,$_POST['zone']);
    $date = date('Y-m-d H:i', strtotime($_POST['sched_date']));
    $queries = mysqli_real_escape_string($db,$_POST['queries']);
    $payment = mysqli_real_escape_string($db,$_POST['payment']);
    $service_type = mysqli_real_escape_string($db,$_POST['service_type']);
    $status =  mysqli_real_escape_string($db, $_POST['status']);
    $cur_date = date("Y-m-d H:i", strtotime($_POST['now']));

    $adder = $barangay.", ". $zone;
    $booking_id = $db->insert_id;
    $sql = "INSERT INTO `bookings` (booking_id,provider_id,customer_id,contact,adder,queries,payment,booking_status,sched_date)
        VALUES('$booking_id', '$provider','$customer', '$contact', '$adder', '$queries', '$payment', '$status','$date')";

    if(mysqli_query($db,$sql)){
        $booking_id = $db->insert_id;
        
        $sql2 ="INSERT INTO `transactions` (booking_id, service,booking_date)
        VALUES('$booking_id','$service_type','$cur_date');";

        $isBooked = mysqli_query($db, $sql2);    
    }

    if ($isBooked) {
        header("Location: ../customer/request.php?provider=$provider&msg=success");
        exit();
    } else {
        header("Location: ../customer/request.php?provider=$provider&msg=failed");
        exit();
    }
}

mysqli_close($db);