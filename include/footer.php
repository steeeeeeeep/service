<style>
#footer{
	margin-left: 240px;
}
</style>
<!-- Footer Menu -->
<footer id="footer">

<!-- Company Details -->
<!-- 1. Address
2. Contact Number
3. Enquiry Mail
-->
<div class="company-details">
    <div class="row" id="contact">
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

</div>
</body>
</html> 
    
<?php
