<?php require '../scripts/db_conn.php';?>
<?php require_once '../scripts/session.php';?>
<?php
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
  if(!ISSET($_SESSION['provider_id']))
	  {
		  header('location:index.php');
	  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkGo.ph</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="icon" type="image/x-icon" href="images/Logo-Title.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/notify.css">

</head>
<body>
    <style>
        .notification {
			background: rgb(0,0,0,15%);
        }
		.notification a{
            color: #088F8F;
		}

        .notification-body{
            width: 80%;
            height: 90%;
            background: #363636;
            box-shadow: 0 4px 12px 4px #000;
            margin: 0 auto;
        }

    </style>
    
    <?php 
        require_once '../include/sp_header.php';
	
	?>
    
    <h1 style="margin-top: 100px; font-size: 20pt; text-align: center;">Notification</h1>
    
    <?php
        $query = $db_home_service_111->query("SELECT * FROM `feedback` NATURAL JOIN `customer` NATURAL JOIN `service_info` WHERE provider_id = '$_SESSION[provider_id]' ORDER BY date DESC") or die(mysqli_error());
        $count = $query->num_rows;
        while($fetch = $query->fetch_array()){
    ?>
    
    <div class="container-fluid">
        <div class="panel panel-default">
            <span style="font-size:8pt;color: gray;"><i>Date: <?php if($fetch['date'] <= date("Y-m-d", strtotime("+7 HOURS"))){echo "<label>".date("M d, Y", strtotime($fetch['date']))."</label>";}else{echo "<label>".date("M d, Y", strtotime($fetch['date']))."</label>";}?></i></span>
            <div class="panel-body">
            <br>
            <div class="notif">
                <div class="notif-drp">
                    <button class="droptn"><i class="fa fa-ellipsis-h"></i></button>
    			<div class="notif-drp-content">
    			  <a href="/help">View info<i  class="fa fa-info-circle" style="float: right;"></i></a>
    			  <a href="sp_profile_info.php?provider_id=<?php echo $fetch['provider_id']?>">View Profile<i  class="fa fa-user" style="float: right;"></i></a>
    			</div>
                </div>
                <div class="info">
                    <span>You have a feedback from </span><strong><?php echo $fetch['firstname']." ".$fetch['lastname']?></strong>
                </div><hr>
                <div class="content">
                    <div class="type"><?php echo "<img style='height:100px; width:100px;border-radius:100%; border: 2px solid #fff' src=../user_images/".$fetch['photo'].' alt="image" class="photo">'?></div>
                    <div class="type"><span>Service: <strong><?php echo $fetch['service_type'];?>
                   </strong></span></div>
                    <div class="type"><span>Feedback: <strong><?php $f = $fetch['feedback'];
                     if (strlen($f) > 20){
                        $trimstring = substr($f, 0 , 20). '<a href=""> readmore...</a>';
                    } else {
                        $trimstring = $f;
                    }
                    echo $trimstring;
                    ?></strong></span></div>
                    <div class="type"><span>Ratings: <strong><?php echo $fetch['rating']?>/5</strong></span></div>
                </div>
            </div><br>
            </div>
        </div>
    </div>
    <?php 
    }
$db_home_service_111->close();
?>
<script src="../js/nav.js"></script>
</body>
</html>