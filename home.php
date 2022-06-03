
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WorkGo.ph/Customer/</title>
        <link rel="icon" type="image/x-icon" href="images/Logo-Title.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/Homepage.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

    </script>

    </head>
    
    <body>
    <header>
		
	<!-- Top header menu containing
		logo and Navigation bar -->
	    <div class="topnav" id="myTopnav">
	        <nav>
		    <div class="navtexts">
  		        <a href="#Home" hidden >Home</a>
		        <a href="#Settings" hidden>Settings</a>
		        <a href="#Profile" hidden>Profile</a>
                <a href="logout.php"><i class="fa fa-sign-out"></i></a>
  		        <a href="#News">News</a>
    		    <a href="#About">About</a>
  		        <a href="#Contact">Contact</a>
		        <a href="logout.php" hidden>Logout</a>
  	            <a href="javascript:void(0);" class="icon" onclick="myFunction(), panel()">
    		    <i class="fa fa-bars"></i>
  	  	        </a>
		
		    <div id="icons">
		   	    <a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-bell"></i></a>
  	  	   	    <a href="javascript:void(0);" class="icons">
    		   	<i class="fas fa-sms"></i></a>
  	  	   	    <a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-plus-circle"></i></a>
  	  	   	    <a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-home"></i></a>
		   </div>
		</div>

		<div id="logo">
		   <img src="images/Logo-1.png" >
		</div>
		
	    </nav>

	    </div>
	    <script>
		    window.onscroll = function() {stickyFunction()};

		    var header = document.getElementById("myTopnav");
		    var sticky = header.offsetTop;

		    function stickyFunction() {
		        if (window.pageYOffset > sticky) {
		            header.classList.add("sticky");
		        } else {
		            header.classList.remove("sticky");
		        }
		    }
	    </script>

	<!-- Image menu in Header to contain an Image and
		a sample text over that image -->
	    <div id="header-image-menu">
		    <img src="images/Dashboardpic.png">
		    <h2 id="image-text">
		        <div class="search">
    	   		    <form action="#">
      			        <input type="text" placeholder="What Service do you need?" name="search">
       	   		        <button type="submit" style="background-color:#088F8F;">
				        <i class="fa fa-search"></i>
			            </button>
    	   		    </form>
	
	  	        </div>
		    </h2>
	    </div>
    </header>
    <main>
        <section>

	    <div id="welcome">
            <h1 class="title">Welcome to our website</h1>

	    <div class="slideshow-container">

	    <div class="mySlides fade">
	  	    <img src="images/img1.jpg">
	  	<div class="text">Home Service</div>
	    </div>

	    <div class="mySlides fade">
	  	    <img src="images/img2.jpg"  >
	   	<div class="text">Events</div>
	    </div>

	    <div class="mySlides fade">
	  	    <img src="images/img3.jpg"  >
	  	    <div class="text">Automotive</div>
	    </div>

	    <div class="mySlides fade">
	        <img src="images/img4.jpg"  >
	        <div class="text">Office</div>
	    </div>

	    <div class="mySlides fade">
	        <img src="images/img5.jpg"  >
	        <div class="text">Health Care</div>
	    </div>

	    <div class="mySlides fade">
	        <img src="images/img6.jpg"  >
	        <div class="text">Personal Grooming</div>
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
    <section class="container" id="section-1">
          <h1>Service Category</h1>
          <div id="myDIV">
		<div class="icon_middle"><a href="#home_service"><i class="fa fa-home"  ></i><span>Home</span></a></div>
		<div class="icon_middle"><a href="#office"><i class="fa fa-building"  ></i><span>Office</span></a></div>
		<div class="icon_middle"><a href="#repair"><i class="fas fa-tools"  ></i><span>Repair/<br>Maintenance</span></a></div>
		<div class="icon_middle"><a href="#health"><i class="fa fa-heartbeat"  ></i><span>Health Care</span></a></div>
		<div class="icon_middle"><a href="#grooming"><i class="fa fa-cut"  ></i><span>Personal Grooming</span></a></div>
		<div class="icon_middle"><a href="#events_service"><i class="fa fa-calendar"  ></i><span>Events</span></a></div>
      	  </div>
    </section>

    <section class="container" id="section-2">
	<span><h1>How to do it?</h1><br></span>
	<div class="row">
	    <ul>
		<li><img src="images/select_services.svg"><span><h4>1. Request Services</h4><span>Search for a service you need and where do you need them. Using your mobile phone or desktop, you
		can find service instantly!</span></li><br>
		
		<li><img src="images/choose_provider.svg"><span><h4>2. Choose a Service Provider</h4><span>Select the service provider that offers the service you need.</span></li><br>
		
		<li><img src="images/hire.svg"><span><h4>3. Hire & Pay Hire</h4>The service provider will be notified and accept your request. 
		You can pay directly to the vendor once the job is completed.</span></li>
		
	    </ul>
	</div>
    </section>

   
    </main>
    <hr>
    <!-- Footer Menu -->
	<footer id="footer">

		<!-- Company Details -->
		<!-- 1. Address
		2. Contact Number
		3. Enquiry Mail
	-->
		<div class="company-details">
			<div class="row">
				<div id="col1">
					<span id="icon" class="fa fa-map-marker"></span>

					<span>
					710-B, Advant Navis Business Park,
					<br />Sector-142, Noida
					</span>
				</div>

				<div id="col2">
					<span id="icon" class="fa fa-phone"></span>

					<span>
					Telephone: +91-890 * * * * * * *
				</span>
				</div>

				<div id="col3">
					<span id="icon" class="fa fa-envelope"></span>
					<span>workgo.org</span>
				</div>
			</div>
		</div>

		<!-- Copyright Section -->
		<div class="copyright">
			

    <p>© All rights reserved | WorkGO.ph.</p>



			<ul class="contact">
				<li>
					<a href="#" class="fa fa-twitter">

					</a>
				</li>

				<li>
					<a href="#" class="fa fa-facebook">

					</a>
				</li>

				<li>
					<a href="#" class="fa fa-pinterest-p">

					</a>
				</li>
			</ul>
		</div>
	</footer>

    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
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
        setTimeout(showSlides, 6000); // Change image every 2 seconds
        }
    </script>
    <script>
        var header = document.getElementById("myTopnav");
        var btns = header.getElementsByClassName("navtexts");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
                });
        }
    </script>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
    </body>
    </html> 
    
<?php
