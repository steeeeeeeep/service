<?php
require_once "customer_server.php";
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

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-wid, intial-scale=1" 
    meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/Logo-Title.png">
    <link href="css/register.css" rel="stylesheet">
    <title>Register</title>
</head>

<style>
    .gender-details {
    width: 100%;
}
</style>

<body>
    <div class="user_data">
        <!-- Created By CodingLab - www.codinglabweb.com -->
        <div class="container">
            <h1> Welcome to <span>WorkGo.ph</span></h1>
            <div class="title">Registration</div>
                <div class="content">
                    <form method="post" action="register_customer.php" 
                    enctype="multipart/form-data">
                        <?php include('scripts/errors.php'); ?>
                        <div class="error" style="color:red"></div>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" placeholder="Enter your name" 
                            name="firstname" >
                        </div>
                        <div class="input-box">
                            <span class="details">Last Name</span>
                            <input type="text" placeholder="Enter your name" 
                            name="lastname" >
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your username" 
                            name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" placeholder="Enter your email"
                            name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password_1" 
                            placeholder="Enter your password" 
                            name="password_1" minlength="8" maxlength="100">
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" name="password_2" 
                            placeholder="Confirm your password" 
                            name="password_2" >
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="tel" placeholder="Enter your number ex.(09123456789)" 
                            name="contact" minlength="10" maxlength="11" value="<?php echo $contact; ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details" for="b_date">Age</span>
                            <input type="age" name="age" id="b_date" 
                            ><br>
                        </div>
                    
        
                        <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="Male">
                        <input type="radio" name="gender" id="dot-2" value="Female">
                        <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
                        <span class="gender-title">Gender</span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span class="gender">Male</span>
                                </label>
                                <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span class="gender">Female</span>
                                </label>
                                <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span class="gender">Prefer not to say</span>
                                </label>
                            </div>
                        
                        <!------------------------------------->
                        <h2>Other Details</h2><br>
                        <p>Address</p>
                        <!------------------------------------->
                        <div id="address">

                            <div class="input-box">
                            <label for="address">Street</label>
                            <select name="barangay" id="barangay">
                                <option disabled selected>Select Barangay</option>
                                <?php foreach ($brgy as $barangay) : ?>
                                <option value="<?= $barangay ?>"> <?= $barangay ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            </div>

                            <div class="input-box">
                                <label for="street">Street</label>
                                <input type="location" name="street" id="street">
                            </div>
                            
                        </div>
                        <div class="button">
                        <input type="submit" value="Register" name="reg_customer">
                        </div>
                        </div>
                    </div>
                    </form>
                </div>                    
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select[name="barangay"]').change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === '') {
                    $('#error').text('Please select an option.').show();
                } else {
                    $('#error').text('').hide();
                }
            });
        });

    </script>

</body>
</html>