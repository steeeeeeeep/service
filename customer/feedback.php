<?php
require_once '../scripts/session.php';
require_once '../scripts/db_conn.php';
if(isset($_POST['send-fb'])){
    $rating = mysqli_real_escape_string($db_home_service_111,$_POST['rate']);
    $feedback = mysqli_real_escape_string($db_home_service_111,$_POST['feedback']);
    $customer = mysqli_real_escape_string($db_home_service_111,$_SESSION['customer_id']);
    $date = date('Y-m-d');

    $provider = $_POST['provider'];
        $query = "INSERT INTO feedback(provider_id, customer_id, rating, feedback, `date`)VALUES('$provider', '$customer', '$rating', '$feedback', '$date')" or die(mysqli_error());
        if(mysqli_query($db_home_service_111, $query)){

            $rating1 = $db_home_service_111->query("SELECT * FROM `feedback` WHERE `provider_id`='$provider'") or die(mysqli_error());
            $total = 0;
            $count = $rating1->num_rows;
            while ($fetch = $rating1->fetch_array()) {
            $total += $fetch['rating'];
            }
            $average = $total / $count;

            
            // Format the average rating
            $formatted_average = number_format($average, 1);

            mysqli_query($db_home_service_111,("UPDATE `workers` SET `rating`='$formatted_average' WHERE `provider_id`='$provider'"));
            header('Location: checkout.php');

        }
    mysqli_close($db_home_service_111);
}