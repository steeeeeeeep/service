<?php
    include_once '../session.php';
    include_once '../scripts/db_conn.php';

    $booking_id = $_GET['booking_id'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, intial-scale=1" >
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .col{
            background: #233241;
            border-radius: 10px;
        }
        .col img {
            margin: 10px;
            padding: 5px;
            border: 5px solid white;
        }
        .table{
            border: 1px solid rgb(152 169 179);
        }
        td{
            border: 1px solid rgb(152 169 179);
            background: rgb(229, 244, 253);
            color: #000;
        }
        th{
            border: 1px solid rgb(152 169 179);
            background: #088F8F;
        }
        button:hover {
            background: #000;
            color: black;
        }
    </style>
</head>
<body>
        
            <?php
                $query = $db->query("SELECT * FROM `bookings` LEFT JOIN  `sp_list` ON sp_list.provider_id=bookings.provider_id WHERE `booking_id`='$booking_id'") or die(mysqli_error());
                while($fetch = $query->fetch_array()){
            ?>


    <div class="container" style="margin-bottom: 60px;margin-top: 20px;">
        <div class="card">
            <div class="card-body">
            <div class="panel-body">
            <form method="post" action="../scripts/edit_bookhall.php?booking_id=<?php $_REQUEST['booking_id']?>" class="form-horizontal" enctype="multipart/form-data">
            <?php
                
            ?>
            
            <div class="card-title">
                <h3 class="text-center">Service Request for <strong><?php echo $fetch['firstname'], " ",$fetch['lastname']?></strong>
                </h3>
            </div>
            <hr>
                    <input type="int" name="id" value="<?php echo $fetch['booking_id']?>" hidden>

                    <div class="form-group">
                        <label for="">Your Current Location</label>
                        <input class="form-control" type="text" name='address' id="location" value="Barangay <?php echo $fetch['adder'];?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Edit Schedule</label>
                        <?php 
                            $p_id = $fetch['provider_id'];

                            $num_sched = [];
                            $query1 = $db->query("SELECT * FROM `bookings` WHERE `booking_status`='Accepted' && `provider_id`='$p_id'") or die(mysqli_error());
                            while($fetch1 = $query1->fetch_array()){
                                $num_sched[] = date('Y-m-d', strtotime($fetch1['sched_date']));
                            }
                        ?>
                        <input type="datetime-local" id="sched_date" name="sched_date">
                        <input type="text" name="now" id="" value="<?php echo date('y-m-d H:i')?>" hidden>
                        <script src="../js/date.js"></script>
                        <script>
                            $(document).ready(function() {
                                var num_sched = <?php echo json_encode($num_sched); ?>;
                                $("#sched_date").on("input", function() {
                                    var entered_input = $(this).val();
                                    var entered_date = entered_input.split('T')[0];
                                    if ($.inArray(entered_date, num_sched) !== -1) {
                                        alert("This date is already occupied. Please choose another date.");
                                        $(this).val("");
                                    }
                                });
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="">Payment Mode</label>
                        <select class="form-control" name="payment" id="payment" required>
                            <option value="Cash">Cash</option>
                            <option value="Gcash">Gcash</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Your Concern here</label>
                        <textarea id="queries" name="queries" class="form-control" maxlength="255"
                            placeholder="Any queries..?" value="<?php echo $fetch['queries'] ?>"></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="status" value="Pending" hidden>
                    </div>

                    <button style="margin-top: 30px" class="btn btn-block btn-primary" type="submit" name="book" id="book">Book</button>
                </form>
                <?php
                
                $db-> close();}?>

</body>
 
 <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script> 
  <script type="text/javascript" src="../js/jquery-ui.js"></script>
</html>