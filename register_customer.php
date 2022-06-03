<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta name="viewport" content="width=width-device, intial-scale=1" meta charset="UTF-8">
        <link href="register_file/register.css" rel="stylesheet">
        <title>Register</title>
    </head>

    <body>

        <div class="user_data">
            <!-- Created By CodingLab - www.codinglabweb.com -->
            <div class="container">
            <h1> Welcome to <span>WorkGo.ph</span></h1>
                <div class="title">Registration</div>
                <div class="content">
                <form action="#">
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="text" placeholder="Confirm your password" required>
                    </div><br>
                    </div>
                    <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
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
                    </div>
                    <div class="button">
                    <input type="submit" value="Register">
                    </div>
                    
                    <h2>Other Details</h2>
                    <div id="address">
                    <p>Address</p>

                    <div class="input-box">
                        <label for="street">Street Address</label>
                        <input type="location" name="street" id="street" required>
                    </div>

                    <div class="input-box">
                        <label for="city">City / Municipality</label>
                        <input type="location" name="city" id="city" required>
                    </div>
                    
                    <div class="input-box">
                        <label for="province">Province</label>
                        <input type="location" name="province" id="province" required>
                    </div>
                    
                    <div class="input-box">
                        <label for="postal_code">Postal / Zip Code</label>
                        <input type="location" name="postal_code" id="postal_code" required>
                    </div>

                     
                </form>
            
    </div>

    </body>
</html>