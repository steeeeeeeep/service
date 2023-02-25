<!DOCTYPE html>
<html>
<head>
<body>
<script>
function openNav() {
  document.getElementById("myNav").style.width = "50%";
	
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
	
}
</script>
	<div id="myNav" class="overlay">
  		
  		<div class="overlay-content">
    		<ul>
			<!--menu bar section-->
		    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a></li><hr>
  		    <li><a href="#home">Home</a></li><hr>
  		    <li><a href="#settings">Settings</a></li><hr>
  		    <li><a href="#contact">Contact</a></li><hr>
  		    <li><a href="#about">About</a></li><hr>
			<li><a href="logout.php">Log out  <i class="fa fa-sign-out"></i></a></li>
		   
		</ul>
  	        </div>
	    </div>


	     <div class="topnav" id="myTopnav">
	     <nav>
		<div class="navtexts">		   
  		   <div class="dropdown">
    			<button class="dropbtn">
    			  <i class="fa fa-gear"></i>
    			</button>
    			<div class="dropdown-content">
			  <a style="color: black; ">Dark Mode
			  <button class="light-mode-button" 
    			  aria-label="Toggle Light Mode" 
		      	  onclick="toggle_light_mode()">
	                <span></span>
	    		<span></span>
			</button></a>
				<!-- javacript code for darkmode/lightmode button-->
			    <script>
				function toggle_light_mode() {
				    var app = document.getElementsByTagName("BODY")[0];
				    if (localStorage.lightMode == "dark") {
					localStorage.lightMode = "light";
					app.setAttribute("light-mode", "light");
				    } else {
					localStorage.lightMode = "dark";
					app.setAttribute("light-mode", "dark");
				    }		
				}
			    </script>
    			  <a href="/help">Help<i  class="fa fa-question-circle" 
			  style="float: right;"></i></a>
    			  <a href="logout.php">Log out<i  class="fa fa-sign-out" 
			  style="float: right;"></i></a>
    			</div>
  		   </div> 
    		   <a href="#about">About</a>
  		   <a href="#contact">Contact</a>
  	           <a href="javascript:void(0);" class="icon" onclick="openNav()">
    		   <i class="fa fa-bars"></i>
  	  	   </a>
		   <div id="icons">
		   	<a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-bell"></i>
		   	</a>
  	  	   	<a href="javascript:void(0);" class="icons">
    		   	<i class="fas fa-sms"></i>
		   	</a>
  	  	   	<a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-plus-circle"></i>
		   	</a>
  	  	   	<a href="javascript:void(0);" class="icons">
    		   	<i class="fa fa-home"></i>
  	  	   	</a>
		   </div>
		</div>
		
		<div id="logo">
		   <img src="images/Logo-1.png" >
		</div>
	    </nav>
	</div>

    </header>
	
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
	</script>

    </body>
    </html>
