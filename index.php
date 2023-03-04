<?php 
require_once "service_pro_server.php";
require_once "customer_server.php";
include_once "scripts/db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="images/Logo-Title.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/
	bootstrap.min.css" rel="stylesheet" integrity=
	"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="index_css/dashboard.css" rel="stylesheet"/>
<link href="index_css/login.css" rel="stylesheet"/>
<link href="index_css/nav.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/nav.css">
<title>WorkGo.ph/Dashboard</title>

<style>

	#ps-visible{
		display: none;
	}

	div#eye.selected{
    	color: #088F8F;	
	}
	div#eye {
		position: absolute;
		right: 40px;
		top: 50%;
		transform: translateY(-50%);
	}
	.modal.active{
    	color: #088F8F;	
	}

</style>

</head>

<header>

<?php require_once 'include/index_header.php'; ?>

</header>

<main id="main" class="page-main">
	<section class="home1">
		<div id="home" class="center">
			<div class="log-in-btn">
				<button onclick="document.getElementById('id01').style.display='block'" class="btn">Login or Sign-up</button><br>
			</div>
			<div class="db-pic">
			<img src="images/Dashboardpic.png" class="dashboard-image" />
			</div>
			<?php 
			
				$query = $db_home_service_111->query("SELECT * FROM `service_info` NATURAL JOIN `services` NATURAL JOIN `provider_info`") or die(mysqli_error());
				

			?>
			<div class="search">
					<form action="#">
					<input type="text" placeholder="What Service do you need?" name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				<p1>Top Service:</p1>
			</div>
   		</div>
	  </section>
	  <section class="home1">
		<div id="home" class="center">
			<div id="about" class="about">
				<h3>About us</h3><br>
				<span>Welcome to <strong>WorkGO.ph</strong>, where we take pride in providing top-notch home services to our customers. From plumbing and electrical work to painting and landscaping, we have a team of experts who are ready to tackle any project you have in mind. Our goal is to make your home a better place, one task at a time. Let us take care of your to-do list and experience the peace of mind that comes with knowing your home is in good hands. <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" style="color:blue">Log in or Signup</a> today to schedule your appointment.</span>
			</div>
		</div>
	  </section>
	<section class="home3">
		<div class="container" id="contain">
			<div id="services" class="container-contain">
					<div class="title">
						<h1 style="color: #000">Services Offered</h1>
					</div>
				<div class="right-pic" id="home-service">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Home Service</h3>	
						<span>Get professional and reliable home services from WorkGO.ph. Our team of skilled worke use only the best products to make sure your home is looking its best. And, with our easy online scheduling, you can book an appointment at a time that works for you.</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
					</div>
					<div class="image">
						<img src="images/Build your home-amico.svg" alt="homeService-photo">
					</div>
				</div>
				<div class="left-pic" id="office">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Office Service</h3>	
						<span>Boost your business with the efficient and high-quality services offered by WorkGO.ph. Our team of experts use the latest technologies and techniques to keep your office running smoothly. And, with our easy online scheduling, you can book an appointment at a time that works for you.</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
					</div>
					<div class="image">
						<img src="images/office.svg" alt="officeService-photo">
					</div>
				</div>
				<div class="right-pic" id="repair">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Repair and Maintenance Service</h3>	
						<span>Say goodbye to the hassle of finding a reliable repair and maintenance provider. WorkGO.ph offers top-notch repair and maintenance services for all your needs. Our team of highly trained technicians use only the best parts and technology to get the job done right. Plus, with our convenient online scheduling, you can book an appointment anytime, anywhere. Don't let a broken appliance or vehicle disrupt your life - trust the experts at WorkGO.ph to get it fixed fast</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
					</div>
					<div class="image">
						<img src="images/Maintenance-cuate.svg" alt="repairAndService-photo">
					</div>
				</div>
				<div class="left-pic" id="auto">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Auto-repair Service</h3>	
						<span>Experience top-notch auto repair and maintenance from the experts at WorkGO.ph. Our team of highly skilled technicians use only the best parts and technology to keep your vehicle running smoothly. Plus, with our convenient online scheduling, you can book your appointment anytime, anywhere.</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
					</div>
					<div class="image">
						<img src="images/Car.svg" alt="AutoRepairService-photo">
					</div>
				</div>
				<div class="right-pic" id="personal-groom">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Personal Grooming Service</h3>	
						<span>Look your best with the expert grooming services offered by WorkGO.ph. Our team of highly skilled specialists use only the best products to give you the look you want. And, with our convenient online scheduling, you can book an appointment anytime, anywhere.</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
					</div>
					<div class="image">
						<img src="images/Beauty salon-bro.svg" alt="PersonalGroomingService-photo">
					</div>
				</div>
				<div class="left-pic" id="event">
					<div class="text">
						<h3 style="color: #000; font-weight: bold">Event Service</h3>	
						<span>Make your next event unforgettable with WorkGO.ph. Our team of expert event planners will work with you to create the perfect event, no matter what your budget or timeline. And, with our convenient online scheduling, you can book your event anytime, anywhere.</span>
						<a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" id="book">Book Now ></a>
						
					</div>
					<div class="image">
						<img src="images/Events-amico.svg" alt="EventService-photo">
					</div>
				</div>
			</div>
		</div>  
   </section>
   <div class="modal" id="help1">
	<div id="help-con">
		<div class="title">
			<h3>How To Do It?</h3>
		</div>
		<div id="close" class="close">
			<a href="javascript:void(0);" onclick="document.getElementById('help1').style.display = 'none'"><i class="fa fa-times"></i></a>
		</div>
		<div class="right-pic">
			<p></p>
		</div>
	</div>
   </div>

	<div id="id01" class="modal">

		<form class="modal-content animate" action="index.php" method="post">
			<br><div class="warning"><span style="color: #ff7c7c; font-size:light;"><?php include('scripts/errors.php');?></span>
		</div>
				<div class="modal-container" style="background: none">
				<img src="images/Logo-1.png" />
				</div>

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput" 
					placeholder="Username" name="username" required>
					<label for="floatingInput">Username</label>
				</div>

				<div class="form-floating">
					<input type="password" class="form-control" name="password"
					id="floatingPassword" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
							<input type="checkbox" id="ps-visible" >
							<div id="eye"><i class="fa fa-eye" onclick="PSvisible()"></i></div>
				</div> 
				<script>
					document.getElementById("eye").addEventListener("click", function() {
						var radio = document.getElementById("ps-visible");
						radio.checked = !radio.checked;
						if (radio.checked) {
							this.classList.add("selected");
						} else {
							this.classList.remove("selected");
						}
					});
				</script>
			
				<div class="center">
				<button class="submit" type="submit" name="login_user">Log in</button><br/>
				</div>

				<p3><span>or</span></p3>

				<div class="other-option">
					
					<div class="center">
					<a class="submit" type="submit" href="account.php" style="width: 120px">Create account</a>
					</div><br/>
					
					<span>Don't have an account? Signup as</span><br/>
					
					<a href="register_service-provider.php"
					target="_self" style="color: #0d6efd;">Service provider</a> <span>or</span>
					<a href="register_customer.php" 
					target="_self" style="color: #0d6efd;">Customer</a></div>
					<br>
				<center><span class="psw">Forgot <a href="#"  style="color: #0d6efd;">password?</a></span></center>

			</form>
	</div>
	</div>
</main>

<script>
// Get the modal
var modal = document.getElementById('id01');
var help1 = document.getElementById('help1');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == help1) {
        help1.style.display = "none";
    }
}
</script>
<script src="../js/navs.js"></script>
<?php require_once 'include/footer.php'?>
</body>
</html>

