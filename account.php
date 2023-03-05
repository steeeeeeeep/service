<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkGo.ph</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reqs.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    body{
    background-color: #282828;
    }
    .container {
    margin: 2% auto;
    }
    img{
        width: 200px;
    }
    .card {
    width: 50%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: center;
    align-content: center;
    padding: 10px;
    box-shadow: 2px 1px 19px 4px;
    }
    .customer {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    }
    .service_provider{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    }
    .button{
    display:flex;
    justify-content: center;
    margin-top: 10px;
    }
</style>

<body>

    <div class="container">
        <div class="card">
            <div class="back">

            </div>
            <form action="register_customer.php" method="post">
            <div class="customer">
                <div class="img"><img src="images\user.jpg" alt="customer image"></div>
                <h4>Sign up as Customer</h4>
                <input type="checkbox" name="check" id="check1" value="Agree">
            </div><br>
            </form>

            <form action="register_service-provider.php" method="post">
            <div class="service_provider">
                <div class="img"><img src="images\service_provider.jpg" alt="service provider image"></div>
                <h4>Sign up as Service Provider</h4>
                <input type="checkbox" name="check" id="check2" value="Agree">
            </div>
            <div class="button">
                <a class="btn btn-primary disabled" href="">Next</a>
            </div><br>
            </form>
            
            <div class="agree">
                <span>By clicking the button you agree to our <br><a href="terms&condition" style="color: #3367d6;">Terms and Condition </a><span>and</span><a href="terms&condition" style="color: #3367d6;"> Privacy Policy</a></span>
            </div>
            <script>
                $(document).ready(function(){
                    $("input[name='check']").click(function(){
                        if ($("#check1").is(':checked')) {
                            $('.button a').removeClass('disabled').css('cursor', 'pointer');
                            $('.button a').attr('href', 'register_customer.php');
                            $("#check2").prop("checked", false);
                        } else if ($("#check2").is(':checked')) {
                            $('.button a').removeClass('disabled').css('cursor', 'pointer');
                            $('.button a').attr('href', 'register_service-provider.php');
                            $("#check1").prop("checked", false);
                        } else {
                            $('.button a').addClass('disabled').css('cursor', 'not-allowed');
                            $('.button a').removeAttr('href');
                        }
                    });
                });
            </script>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js.jquery.min.jd"></script>
    <script src="jquery-ui.js"></script>
</body>
</html>