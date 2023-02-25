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