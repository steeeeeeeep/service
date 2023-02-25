
<?php 
  require_once '../session.php';
  require '../scripts/db_conn.php';

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
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WorkGo.ph/</title>
        <link rel="icon" type="image/x-icon" href="images/Logo-Title.png">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/navs.css">
    	<link rel="stylesheet" href="../css/reqs.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--navigation bar-->
</head>
<body>
	<style>
        .home {
			background: rgb(0,0,0,15%);
        }
		.home a{
            color: #088F8F;
		}
		.container{
			margin-top: 20px;
		}
		.contains {
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			align-content: space-between;
			align-items: flex-start;
		}
		.contain1, .contain2 {
			margin: 5px;
			width: 100%;
			height: 80vh;
			border-radius: 2px;
			box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 25%);
			padding: 10px;
			background: linear-gradient(275deg, #282828, #373636a6);
			overflow: auto;
		}
		.contain1{
			width: 50%;
		}
		.main2 {
    		text-align-last: center;
		}
		.navs{
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			width: 100%;
		}
		.navs a{
			border: 1px solid #ffffffb6;
			height: 50px;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
	</style>
	<?php require '../include/sp_header.php';?>
	<div class="main">
		<section class="main1">
			<div class="container">
				<div class="contains">
					<div class="contain1">
						<div class="info">
						<?php 
							$query = $db->query(" SELECT * FROM sp_list NATURAL JOIN service_info NATURAL JOIN provider_info WHERE `provider_id`='$_SESSION[provider_id]'");
							$fetch = $query->fetch_array();
						?>
						<div class="main2">
							<div>
								<?php echo 
								"<img style='height:100px; width:100px;border-radius:100%; border: 2px solid #fff' src=../user_images/".$fetch['photo'].'>'?>
								<h1><?php echo $fetch['firstname'] . " " .$fetch['lastname']?></h1>
								<p style="color: gray;margin: -5px; font-size: 8pt"><?php echo $fetch['email']?></p>
								<p class="title"><?php echo $fetch['service_type']?></p>
								<p class="address" style="text-align: center;"><?php echo 'Barangay ' .$fetch['barangay'] .', ' . $fetch['street'] .', '?> General Santos City</p><br><br>
							</div>
							
						</div>
						<div class="navs">
							<div>
								<a href="">Photo</a>
								<a href="" class="fb" onclick="showMsg()">Feedbacks and Rating</a><br><br></div>
							</div>
						</div>
					</div>
					<div class="contain2">
						<div class="album">
							<h3 style="text-align: center">Photos</h3><br>
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<img src="../images/img1.jpg" alt="image" style="width: 32%; height: 32%">
							<input type="file"id="file_input" hidden>
							
							<div>
								<form action="add_photo.php" method="post">
									<i class="fa fa-plus-square" id="add_photo"></i>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
	</div>

	
	<!--javascript code for navigation bar-->
	<script>
		window.onscroll = function() {myFunction1()};

		var header = document.getElementById("myTopnav");
		var sticky = header.offsetTop;

		function myFunction1() {
		  if (window.pageYOffset > sticky) {
		    header.classList.add("sticky");
		  } else {
		    header.classList.remove("sticky");
		  }
		}

		$(document).ready(function() {
			$('#add_photo').on('click', function()	{
				$('#file_input').click();
			});
		});
	</script>
	<hr>

	<?php include_once '../include/footer.php'?>
