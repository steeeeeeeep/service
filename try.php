<?php 
    if(isset($_POST['search'])){
        $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
        $service = mysqli_rearl_escape_strinig($db, $_POST['service_type']);
        $date = date('Y-m-d',strtotime($db, $_POST['sched_date']));

        $query = $db->query("SELECT * FROM `bookings`, `transactions`, `service_info`, `sp_list`, `provider_info` WHERE sp_list.provider_id=bookings.provider_id AND sp_list.provider_id=service_info.provider_id and sp_list.provider_id=provider_info.provider_id AND transactions.service=service_info.service_type AND bookings.booking_id=transactions.booking_id AND barangay LIKE '%".$barangay."%' AND service_type LIKE '%".$service."%' AND sched_date LIKE '%".$date."%' ") or die(mysqli_error());
        $result = mysqli_num_rows($query);

        if($result > 0){
            while($row = mysqli_fetch_assoc($query)){
                echo "<div>
                <p>". $row['firstname']."</p>
                <p>". $row['lastname']."</p>
                <p>". $row['service_type']."</p>
                <p>". $row['sched_date']."</p>
                <p>". $row['adder']."</p>
                <p>". $row['service_fee']."</p>
                <p>". $row['photo']."</p>
            </div>";
            }
        }
        else{
            echo "<div>
                <p>" kjshdjfh "</p>
            </div>"
        }
    }
        ?>

