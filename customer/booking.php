<?php
    include_once '../session.php';
    include_once '../logincheck.php';
    include_once '../scripts/db_conn.php';
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

    <div class="container" style="margin-top: 30px;">
        <div class="card text-center">
            <?php include_once '../scripts/provider_user.php';?>
            <div class="card-header">
                <button onclick="history.back()" style="float:left;background:#088F8F; border: none; color: #fff">
                <i class="fa fa-arrow-left" ></i></button>
                <h3>Details about <h2 style="font-weight: bold;"><?= $provider->firstname; ?> <?= $provider->lastname; ?><h2></h3>
            </div>
            <div class="container" style="margin-top: 30px;">
                <div class="row">
                    <div class="col">
                        <img style="height: 250px;width: 250px; border-radius: 100%;"
                            src="../user_images/<?= $provider->photo; ?>">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>
                            <?= $provider->firstname; ?>
                            <?= $provider->lastname; ?>
                        </td>
                        <th>Service</th>
                        <td >
                            <?= $provider->service_type;?>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            Barangay <?= $provider->barangay; ?>, 
                            <?= $provider->street; ?>
                        </td>
                        <th>Service fee</th>
                        <td>
                            ₱ <?= $provider->service_fee; ?>.00
                        </td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td>
                            <?= $provider->rating; ?>/5
                        </td>
                        <th>Contact No.</th>
                        <td>
                            <?= $provider->contact?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>


    <div class="container" style="margin-bottom: 60px;margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <?php
                $query = $db->query("SELECT * FROM `customer` WHERE `customer_id`='$_SESSION[customer_id]'") or die(mysqli_error());
                while($fetch = $query->fetch_array()){
            ?>
            
            <?php
            $sched_date = $_GET['sched_date'];
            $barangay = $_GET['barangay'];

            $formatted_date = date("l, F j, Y  h:i A", strtotime($sched_date));
            $now = date('Y-m-d h:i a', strtotime('+7 HOURS'));
            
            ?>
            <div class="panel-body">
            <form method="post" action="../scripts/bookhall.php" class="form-horizontal" enctype="multipart/form-data">
            <?php
                
            ?>
            
            <div class="card-title">
                <h3 class="text-center">Service Request for <strong><?php echo $provider->firstname, " ",$provider->lastname?></strong>
                </h3>
            </div>
            <hr>
                    <input name="provider" type="hidden" value="<?= $provider->provider_id; ?>">
                    <input name="service_type" type="hidden" value="<?= $provider->service_type; ?>">
                    <input name="customer" type="hidden" value="<?php echo $fetch['customer_id'];?>">
                    <input name="contact" type="hidden" value="<?php echo $fetch['contact'];?>">

                    <div class="form-group">
                        <label for="">Your Current Location</label>
                        <input class="form-control" type="text" id="location" value="Barangay <?php echo $barangay;?>" disabled>
                        <input class="form-control" type="text" name="barangay" id="location" value="Barangay <?php echo $barangay;?>" hidden><br>
                        <input type="text" class="form-control" name="zone" id="location" placeholder="Please input Zone and Lot/House Number" required>
                    </div>

                    <div class="form-group">
                        <label for="">Schedule</label>
                        <input class="form-control" type="text" value="<?php echo $formatted_date; ?>" disabled>
                        <input type="datetime-local" id="sched_date" name="sched_date" value="<?php echo $sched_date; ?>"  hidden>
                        <input type="text" name="now" id="" value="<?php echo $now?>" hidden>
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
                            placeholder="Any queries..?"></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="status" value="Pending" hidden>
                    </div>

                    <button style="margin-top: 30px" class="btn btn-block btn-primary" type="submit" name="book" id="book">Book</button>
                </form>
                <?php
            
                $db-> close();
                }?>

</body>
 
 <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script> 
    <script src="../js/main1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
</html>