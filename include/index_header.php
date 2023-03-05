
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav>
    <div class="topnav" id="myTopnav">
        <div id="logo">
            <img src="images/Logo-1.png" ></div>
            <div class="menu"><button id="menu_btn" class="fa fa-bars"></button></div>
        </div>
    </div>
    <div class="side-bar" id="side-bar">
        <div class="navigation">
            <div id="link" class="home"><a href="#home"><span>Dashboard<i class="fa fa-home"></i></span></a></div>
            <div id="link"><a href="#about" id="ab"><span>About<i class="fa fa-exclamation-circle" ></i></span></a></div>
            <div id="link" class="service"><a href="#services"><span>Services<i class="fa fa-gears"></i></span><span class="notif"></span></a></div>
            <div id="link" class="contact"><a href="#contact"><span>Contact<i class="fa fa-phone" ></i></span></a></div>
            <div id="link" class="help"><a href="javascript:void(0)" onclick="document.getElementById('help1').style.display='flex'"><span>Help<i class="fa fa-question" ></i></span></a></div>
            <div id="link"><a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'" ><span>Login or Sign Up<i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>
        </div>
    </div>
</nav>
    
<script>
    $(function(){
        $('#menu_btn').on('click', function(){
            $('#side-bar').toggle();
        })
    })
</script>