<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="Logo-Title.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/
	bootstrap.min.css" rel="stylesheet" integrity=
	"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="index_css/dashboard.css" rel="stylesheet"/>
<link href="index_css/login.css" rel="stylesheet"/>
<link href="index_css/navbar.css" rel="stylesheet"/>
<title>WorkGo.ph/Dashboard</title>
<script>
window.onscroll = function() {myFunction1()};

var header = document.getElementById("topnav");
var sticky = topnav.offsetTop;

function myFunction1() {
  if (window.pageYOffset >= sticky) {
    topnav.classList.add("sticky")
  } else {
    topnav.classList.remove("sticky");
  }
}
</script>
</head>

<header>
<div class="topnav" id="myTopnav">
  <a href="#help">Help?</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <a href="javascript:void(0);" class="icon" onclick="openNav()">
    <i class="fa fa-bars"></i>
  </a>
  

  <img src="images/Logo-1.png" style="height: auto; width: 200px; max-width: 100%; 
  display: inline; position: absolute; contain;" alt="logo" />
  
</div>

<div id="myNav" class="overlay">
  		
	<div class="overlay-content">
    	<ul>
			<!--menu bar section-->
		    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a></li><hr>
  		    <li><a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'">
			  Log-in</a></li><hr>
  		    <li><a href="#settings">Settings</a></li><hr>
  		    <li><a href="#contact">Contact</a></li><hr>
  		    <li><a href="#about">About</a></li><hr>
  			<li><a href="#help">Help?</a><li>
		   
		</ul>
    </div>
</div>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "50%";
	
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
	
}

</script>
</header

<!-- ------------------------------------------------------------------------------ -->

   <div id="home" class="center">
	<button onclick="document.getElementById('id01').style.display='block'" 
	style="width:auto;" class="btn">Login or Sign-up</button>
	<img src="images/Dashboardpic.png" />
	<div class="search">
    	   <form action="#">
      		<input type="text" placeholder="What Service do you need?" name="search">
       	   	<button type="submit"><i class="fa fa-search"></i></button>
    	   </form>
	
	   <p1>Top Service:</p1>
  	</div>
	
   </div>
   <div class="container">
      <h1 align="center">Service Category:</h1>
      <div id="myDIV" class="container">
	<div class="icon_middle"><a href="#home_service"><i class="fa fa-home" style="font-size: 36px;"></i><span>Home</span></a></div>
	<div class="icon_middle"><a href="#office"><i class="fa fa-building" style="font-size: 36px;"></i><span>Office</span></a></div>
	<div class="icon_middle"><a href="#repair"><i class="fas fa-tools" style="font-size: 36px;"></i><span>Repair/Maintenance</span></a></div>
	<div class="icon_middle"><a href="#health"><i class="fa fa-heartbeat" style="font-size: 36px;"></i><span>Health Care</span></a></div>
	<div class="icon_middle"><a href="#shopping"><i class="fa fa-store" style="font-size: 36px;"></i><span>PersonalGrooming</span></a></div>
	<div class="icon_middle"><a href="#events_service"><i class="fa fa-calendar" style="font-size: 36px;"></i><span>Events</span></a></div>
      </div>
   </div>  

<!----------------------------------------------------------------------------------------->

	<div id="id01" class="modal">

   <form class="modal-content animate" action="index.php" method="post">
  	<?php include('errors.php'); ?>
	   <div class="container">
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
		</div> 
	
      	   
		<div class="center">
    	   <button class="submit" type="submit" name="login_user">Log in</button><br/>
		</div>

		<p><span>or</span></p><br/>
		
		<button class="btn btn-1 btn-1a"><a href="https://www.facebook.com/login/" 
		style="width: 100%; color: white;" target="_blank">
		Login with facebook</a></button><br/>
		
		<span>Don't have an account? Signup as</span><br/>
		
		<p3><a href="register_service-provider.php"
		target="_self">Service provider</a> or 
		<a href="https://www.WorkGo.ph/dashboard/customer/signup" 
		target="_self">Customer</a></p3>
		<span class="psw">Forgot <a href="#">password?</a></span>

    </form>

	</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

