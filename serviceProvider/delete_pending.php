<?php
	require_once '../scripts/db_conn.php';
	require_once '../scripts/session.php';
	
	if(isset($_GET['booking_id']) && isset($_GET['message'])) {
        $booking_id = $_GET['booking_id'];
        $message = $_GET['message'];
        //update booking status in the database
        $update_query = "UPDATE `bookings` SET `booking_status` = 'Rejected', `response`='$message' WHERE `booking_id` = '$booking_id'";
        $result = mysqli_query($db_home_service_111, $update_query);
        if($result){
            //if the query is successful, redirect the user to the appropriate page
            header("Location: request.php");
        }
        else{
            //if the query fails, show an error message
            echo "Error updating booking status: " . mysqli_error($db_home_service_111);
        }
    }
    else{
        //if the query parameters are not set, show an error message
        echo "Invalid request. Booking id and message not found.";
    }
	
    $db_home_service_111->close();
?>