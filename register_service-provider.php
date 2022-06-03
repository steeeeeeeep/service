<?php include_once('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-wid, intial-scale=1" 
        meta charset="UTF-8">
        <link href="register_file/3.css" rel="stylesheet">
        <title>Register</title>
    </head>

    <body>
        <div class="user_data">
            <!-- Created By CodingLab - www.codinglabweb.com -->
            <div class="container">
            <h1> Welcome to <span>WorkGo.ph</span></h1>
                <div class="title">Registration</div>
                <div class="content">
                <form method="post" action="register_service-provider.php" 
                enctype="multipart/form-data">
                    <?php include('errors.php'); ?>
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your name" 
                        name="firstname" ><span class="error">*</span>
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
                        <span class="details">Phone Number</span>
                        <input type="tel" placeholder="Enter your number ex.(09123456789)" 
                        name="phone_num" minlength="10" maxlength="11" value="<?php echo $phone_num; ?>" >
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
                    </div><br>
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
                    <h2>Other Details</h2>
                    <p>Address</p>
                    <div id="address">

                    <div class="input-box">
                        <label for="street">Street Address</label>
                        <input type="location" name="street" id="street" 
                        >
                    </div>

                    <div class="input-box">
                        <label for="city">City / Municipality</label>
                        <input type="location" name="city" id="city" 
                        >
                    </div>
                    
                    <div class="input-box">
                        <label for="province">Province</label>
                        <input type="location" name="province" id="province" 
                        >
                    </div>
                    
                    <div class="input-box">
                        <label for="postal_code">Postal / Zip Code</label>
                        <input type="location" name="postal_code" 
                        id="postal_code">
                    </div>

                    <div class="input-box">
                        <label for="b_date">Birthdate</label>
                        <input type="date" date="YYYY-mm-dd" name="birth_date" id="b_date" 
                        ><br>
                    </div>
                    
                    <div class="input-box">
                        <label for ="employment_stat">Employment Status</label>
                        <select name="employment_stat" id="employment_stat">
                            <option disabled selected>Select
                            </option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Employed">Employed</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="id_list">Valid Ids</label>
                        <select id="id_list">
                            <option value="id" disabled selected>Choose ID</option>
                            <option value="id">e-Card / UMID</option>
                            <option value="id">Employee’s ID / Office Id</option>
                            <option value="id">Driver’s License*</option>
                            <option value="id">Professional Regulation Commission (PRC) ID *</option>
                            <option value="id">Passport *</option>
                            <option value="id">Senior Citizen ID</option>
                            <option value="id">SSS ID</option>
                            <option value="id">COMELEC / Voter’s ID / COMELEC Registration Form</option>
                            <option value="id">Philippine Identification (PhilID)</option>
                            <option value="id">NBI Clearance *</option>
                            <option value="id">Integrated Bar of the Philippines (IBP) ID</option>
                            <option value="id">Firearms License *</option>
                            <option value="id">AFPSLAI ID *</option>
                            <option value="id">PVAO ID</option>
                            <option value="id">AFP Beneficiary ID</option>
                            <option value="id">BIR (TIN)</option>
                            <option value="id">Pag-ibig ID</option>
                            <option value="id">Person’s With Disability (PWD) ID</option>
                            <option value="id">Solo Parent ID</option>
                            <option value="id">Pantawid Pamilya Pilipino Program (4Ps) ID *</option>
                            <option value="id">Barangay ID *</option>
                            <option value="id">Philippine Postal ID *</option>
                            <option value="id">Phil-health ID</option>
                            <option value="id">School ID **</option>
                            <option value="id">Other valid government-issued IDs or</option>
                            <option value="id">Documents with picture and signature</option>
                        </select>
                        </div>

                        <div class="input-box" id="id_card">
                            <label for="id-card">Identification card</label>
                            <input type="file" name="id_card" id="id-card" >
                        </div>
                        
                    </div>
                    <div class="button">
                    <input type="submit" value="Register" name="reg_user">
                    </div>
                    
                   
                </form>
            
    </div>

    </body>
</html>