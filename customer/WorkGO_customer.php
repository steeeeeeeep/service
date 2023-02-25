<?php 
  require_once '../session.php'; 
  require_once '../logincheck.php'; 
  require_once '../scripts/db_conn.php';

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
  if(!ISSET($_SESSION['customer_id']))
	  {
		  header('location:index.php');
	  }

  $brgy = ["Apopong",
  "Baluan",
  "Batomelong",
  "Buayan",
  "Bula",
  "Calumpang",
  "City Heights",
  "Conel",
  "Dadiangas East",
  "Dadiangas North",
  "Dadiangas South",
  "Dadiangas West",
  "Fatima",
  "Katangawan",
  "Labangal",
  "Lagao",
  "Ligaya",
  "Mabuhay",
  "Olympog",
  "San Isidro (Lagao 2nd)",
  "San Jose",
  "Siguel",
  "Sinawal",
  "Tambler",
  "Tinagacan",
  "Upper Labay"];

  $srvc = ["Plumbing","Auto Mechanic", "Cleaning", "Electrical"];
?>


<!DOCTYPE html>
<html>
<head>
	<!-- <meta http-equiv="refresh" content="0; url=WorkGo_customer.php"> for redirection-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WorkGo.ph</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/navs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<style>
	#search:hover{
		background: black;
	}
	.home {
		background: rgb(0,0,0,15%);
	}
	.home a{
		color: #088F8F;
	}
</style>
	<?php require_once '../include/c_header.php';?>
	<div class="main">
		<div class="main1">

				<!-- Image menu in Header to contain an Image and
				a sample text over that image -->
			<div class="bg">
				<div class="title1">
					<h2 class="title">Home Service</h2>
				</div>
				<div id="header-image-menu">
					<img src="../images/Dashboardpic.png"><br>
				</div>
			</div>	

			<div class="panel">
				<h1 class="title" style="text-align:center">Welcome <strong><?php echo $_SESSION['username']; ?>! </strong></h1><br>
				
				<section class="service-transaction">
					<form action="booking.php" method="post">
					<div class="services">
						<div class="form-group col-5">
							<label for="">Barangay</label><br>
							<select class="form-control" name="barangay" id="barangay">
								<option value="none">Select Barangay</option>
								<?php foreach ($brgy as $barangay) : ?>
								<option value="<?= $barangay ?>"> <?= $barangay ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
						
						<div class="form-group col-5">
							<label>Looking for</label><br>
								<div class="autocomplete" style="width:100%;">
									<select class="form-control" id="txt" type="text" name="service_type" placeholder="Services">
										<option disabled>Services</option>
										<?php 
										include_once 'scripts/db_conn.php';
										$query = $db->query("SELECT * FROM services");
										while($fetch = $query->fetch_array()){?>
										<option value="<?php echo $fetch['service_name'];?>"><?php echo $fetch['service_name'];?>
										</option>
										<?php } ?>
									</select>
								</div>
						</div>
						
						<div class="form-group">
							<label for="">Date</label><br>
							<input class="form-control" type="datetime-local" name="sched_date" id="sched_date" required>
							<script language="javascript" src="../js/date.js"></script>
						</div>
						
						<div class="form-group col-2">
							<span for="">Action</span><br>
							<button id="search" name="search" class="form-control btn btn-success" type="button" style="background: #088F8F;">Search</button>
						</div>
					</div>
					</form>
					<hr>

					<div class="table-responsive">
						<table id="table-head" class="table">
							<thead style="border: 1px solid white">
								<tr>
									<th>Photo</th>
									<th>Name</th>
									<th>Address</th>
									<th>Service</th>
									<th>Service Fee</th>
									<th>Rating</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="7">Choose your service provider here!</td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
				<?php
    				$db->close();
				?>
				
				<section>

					<div id="welcome">
						<div class="slideshow-container">

							<div class="mySlides fade">
								<img src="../images/img1.jpg">
								<div class="text">Home Service</div>
							</div>

							<div class="mySlides fade">
								<img src="../images/img2.jpg"  >
								<div class="text">Events</div>
							</div>

							<div class="mySlides fade">
								<img src="../images/img3.jpg"  >
								<div class="text">Automotive</div>
							</div>

							<div class="mySlides fade">
								<img src="../images/img4.jpg"  >
								<div class="text">Office</div>
							</div>

							<div class="mySlides fade">
								<img src="../images/img5.jpg"  >
								<div class="text">Health Care</div>
							</div>

							<div class="mySlides fade">
								<img src="../images/img6.jpg"  >
								<div class="text">Personal Grooming</div>
							</div>

						</div>
					</div>			
								
					<br>

					<div style="text-align:center">
						<span class="dot"></span> 
						<span class="dot"></span> 
						<span class="dot"></span>
						<span class="dot"></span> 
						<span class="dot"></span> 
						<span class="dot"></span>  
					</div>
				</section>


					
				<section class="container-hp" id="section-1">
					<h1>Service Category</h1>
					<div id="myDIV">
									<div class="icon_middle"><a href="../Services/home_service.php"><i class="fa fa-home" style="font-size:40pt;"></i></a><span>Home</span></div>
									<div class="icon_middle"><a href="../Services/office.php"><i class="fa fa-building" style="font-size:40pt;"></i></a><span>Office</span></div>
									<div class="icon_middle"><a href="../Services/repair_maintenance.php"><i class="fa fa-wrench" style="font-size:40pt;"></i></a><span>Repair/<br>Maintenance</span></div>
									<div class="icon_middle"><a href="../Services/health_care.php"><i class="fa fa-heartbeat" style="font-size:40pt;"></i></a><span>Health Care</span></div>
									<div class="icon_middle"><a href="../Services/personal_grooming.php"><i class="fa fa-cut" style="font-size:40pt;"></i></a><span>Personal Grooming</span></div>
									<div class="icon_middle"><a href="../Services/events.php"><i class="fa fa-calendar" style="font-size:40pt;"></i></a><span>Events</span></div>
					</div>
				</section>
			</div>

			<section class="container-hp" id="section-2">
					<div class="container-contains">
					<span><h1  id="help">How to do it?</h1><br></span>
							<ul>
								<li class="right-pic">
									<div class="image">
										<img src="../images/Review.gif">
									</div>
									<div class="para">
										<h4>Step 1. Find Services</h4>
										<span>Select your preferred location(Barangay), type of service, and the date you want to schedule the service.</span>
									</div>
								</li><br>
								
								<li class="right-pic">
									<div class="image">
										<img src="../images/Select.gif">
									</div>
									<div class="para">
										<h4>Step 2. Choose a Service Provider</h4>
										<span>Select the service provider that offers the service you need near you.</span>
									</div>
								</li><br>
								
								<li class="right-pic">
									<div class="image">
										<img src="../images/Business.gif">
									</div>
									<div class="para">
										<h4 >Step 3. Hire & Pay</h4>
									<span>The service provider will be notified and accept your request. Pay directly to the vendor once the job is completed.</span>
									</div>
								</li>
						
							</ul>
					</div>
			</section>

		</div>
	</div>
    <hr>
	<script>			
			var slideIndex = 0;
			showSlides();

			function showSlides() {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			let dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 1}    
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			setTimeout(showSlides, 2000); // Change image every 2 seconds
			}
	</script>
	<script src="../js/jquery.js"></script>
	<script src="../js/services.js"></script>
	<?php include_once '../include/footer.php'; 