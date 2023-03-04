<?php require_once '../scripts/session.php';?>
<?php include '../include/config.php';
  require '../scripts/db_conn.php';?>
<?php
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    if(!ISSET($_SESSION['customer_id']))
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
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>WorkGo.ph</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>

<?php require_once '../include/c_header.php';?>  

<?php 
    $query = $db_home_service_111->query(" SELECT * FROM workers NATURAL JOIN service_info NATURAL JOIN provider_info WHERE `provider_id`='$_REQUEST[provider_id]'");
    $fetch = $query->fetch_array();
?>

<div class="center">
  <div class="card" id="fb1" style="display: block">
    <div class="profile-avatar">
        <?php echo 
        "<img style='height:100px; width:100px;border-radius:100%; border: 2px solid #fff' src=../user_images/".$fetch['photo'].'>'?>
      <h1><?php echo $fetch['firstname'] . " " .$fetch['lastname']?></h1>
      <p class="title"><?php echo $fetch['service_type']?></p>
    </div>
    <p class="address">Barangay <?php echo $fetch['barangay'] .', '. $fetch['street'] .', '?> General Santos City</p><br><br>
    <p><button>Contact</button></p>
    <p><button class="fb" onclick="show()">Send Feedback</button></p><br><br>
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
  </div>
  <form action="feedback.php?=<?php echo $fetch['provider_id']?> " method="POST">
  <input type="hidden" value="<?php echo $fetch['provider_id']?>" name="provider">
  <div class="card" id="fb2" data-status="unknown">
    <div class="btn">
      <a href="javascript:void(0)" onclick="show()">&larr;</a>
    </div>
      <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Enter your feedback here..." style="overflow-x: hidden; width: 400px; height: 300px;"></textarea>
      <div class="rating-star">
        <span>Rate</span>
      <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text">1 star</label>
      </div>
      </div>
        <button type="submit" name="send-fb" id="submit-button" onclick="checkSelection()"><span>Send</span></button>
  </div>
</form>
</div>

<?php
    $db_home_service_111->close();
    ?>
<script>

  function show(){
    var btn1 = document.getElementById('fb1');
    var btn2 = document.getElementById('fb2');
    if(btn1.style.display == 'block'){
      btn2.style.display = "block";
      btn1.style.display = "none";
    }
    else{
      btn2.style.display = "none";
      btn1.style.display = "block";

    }
  }

  function checkSelection() {


    var rating = document.querySelector('input[name="rate"]:checked').value;
    var feedb = document.querySelector('#feedback').value;
  if (!rating) {
    document.getElementById("submit-button").disabled = true;
    alert('Please rate at least 1 star');
    return false;
  } else {
    document.getElementById("submit-button").disabled = false;
    return true;
  }
}

</script>
</body>
</html>