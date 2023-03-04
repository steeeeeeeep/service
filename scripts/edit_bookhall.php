<?php

require_once 'helpers.php';
require_once 'db_conn.php';

if (isset($_POST['book'])) {
    $input = clean($_POST);
    
    $id = mysqli_real_escape_string($db_home_service_111,$_POST['id']);
    $date = date('Y-m-d h:i', strtotime($_POST['sched_date']));
    $queries = mysqli_real_escape_string($db_home_service_111,$_POST['queries']);
    $cur_date = date("Y-m-d h:i", strtotime($_POST['now']));

    $sql = "UPDATE `bookings` SET queries = '$queries',  sched_date = '$date' WHERE booking_id = $id";

    if(mysqli_query($db_home_service_111,$sql)){
        
        $sql2 = "UPDATE `transactions` SET booking_date = '$cur_date' WHERE booking_id = $id";

        $isBooked = mysqli_query($db_home_service_111, $sql2);    
    }

    if ($isBooked) {
        header("Location: ../customer/request.php?provider=$provider&msg=success");
        exit();
    } else {
        header("Location: ../customer/request.php?provider=$provider&msg=failed");
        exit();
    }
}

mysqli_close($db_home_service_111);