<header>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php 
		$query = $db_home_service_111->query("SELECT * FROM customer WHERE `customer_id`='$_SESSION[customer_id]'") or die(mysqli_error());
		while($fetch = $query->fetch_array()){
?>
		<nav>
			<?php require_once 'count.php'?>
			

			<div class="topnav" id="myTopnav">
				<div class="menu">
					<button class="fa fa-bars" id="menu_btn"></button>
				</div>
				<div id="logo">
					<a href="dashboard.php"><img src="../images/Logo-1.png"></a>
				</div>
			</div>

			<div class="side-bar" id="side-bar">
				<div class="info">
					<span><i class="fa fa-user-circle"></i><span style="display: inline;margin: 0 10px ; cursor: pointer;"><strong><?php echo $fetch['firstname'] ." ". $fetch['lastname']?></strong></span></span>
				</div><hr>
				<div class="navigation">
					<div id="link" class="home"><a href="WorkGO_customer.php"><span>Dashboard<i class="fa fa-home"></i></span></a></div>
					<div id="link" class="service"><a onclick="show1()"><span>Services<i class="fa fa-gears"></i></span><span class="notif"><i class="fa fa-chevron-down" style="color: #fff"></i></span></a>
					<div class="service1"  id="services">
						<a href="../Services/home_service.php">Home Services</a>
						<a href="../Services/office.php">Office Services</a>
						<a href="../Services/repair_maintenance.php">Repair and Maintenance</a>
						<a href="../Services/auto.php">Automotive Services</a>
						<a href="../Services/personal_grooming.php">Personal Grooming Services</a>
						<a href="../Services/events.php">Event Services</a>
					</div></div>
					<div id="link" class="req"><a href="request.php"><span>Request<i class="fa fa-plus-circle"></i></span><span class='notif'><?php echo $req['total']?></span></a></div>
					<div id="link" class="help"><a href="WorkGO_customer.php#help"><span>Help<i class="fa fa-question-circle" ></i></span></a></div>
					<div id="link" class="contact"><a href="WorkGO_customer.php#contact"><span>Contact<i class="fa fa-phone" ></i></span></a></div>
				</div><hr>
				
				<div class="logout">
					<div id="link"><a href="../about.php" id="ab"><span>About<i class="fa fa-exclamation-circle" ></i></span></a></div>
					<div id="link"><a href="../logout.php?logout='1'"><span>Logout<i class="fa fa-sign-out" ></i></span></a></div>
				</div>
			</div>
		</nav>
		
        <script>
			$(document).ready(function(){
				$('#menu_btn').on('click', function(){
					$('#side-bar').toggle();
				})
			})

			function show1(){
			const ser = document.getElementById('services');
			if(ser.style.display === "flex"){
				ser.style.display = "none";
			}
			else{
				ser.style.display = "flex";
			}
			}

			var service = document.getElementById('services');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == service) {
					service.style.display = "none";
				}
			}

		</script>

<?php }

?>
    </header>
