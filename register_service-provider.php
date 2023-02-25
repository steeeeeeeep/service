<?php include_once('service_pro_server.php') ;
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
    <meta name="viewport" content="width=device-width, intial-scale=1" 
    meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="css/reg.css" rel="stylesheet">
    <script src="js/nav.js"></script>
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
                    <div class="input-box" id="1">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your first name" 
                        name="firstname" >
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" placeholder="Enter your last name" 
                        name="lastname" >
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" 
                        name="username"  value="<?php echo $username; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email"
                        name="email"  value="<?php echo $email; ?>">
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
                        name="contact" minlength="10" maxlength="11"  value="<?php echo $contact; ?>" >
                    </div><br>
                    <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="Male">
                    <input type="radio" name="gender" id="dot-2" value="Female">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender" >Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two" ></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>

                    <!----------------------------------------------------->
                    <h2 style="text-align: center;">Other Details</h2>
                    <!----------------------------------------------------->

                    <div id="address">

                        <div class="input-box">
                            <label for="barangay">Barangay</label>
                            <select name="barangay" id="barangay">
                                <option disabled selected>Select Barangay</option>
                                <?php foreach ($brgy as $barangay) : ?>
                                <option value="<?= $barangay ?>"> <?= $barangay ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <label for="street">Street<label>
                            <input type="location" name="street" id="street" 
                            >
                        </div>

                        <div class="input-box">
                            <label for="b_date">Age</label>
                            <input type="age" name="age" id="b_date" 
                            ><br>
                        </div>
                        
                        <div class="input-box">
                            <label for ="employment_stat">Employment Status</label>
                            <select name="employment_stat" id="employment_stat" >
                                <option disabled selected>Select
                                </option>
                                <option class="employment_stat" value="Unemployed">
                                    Unemployed</option>
                                <option class="employment_stat" value="Self-Employed">
                                    Self-Employed</option>
                                <option class="employment_stat" value="Employed">
                                    Employed</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <label for="id_list">Valid Ids</label>
                            <select id="id_list" name="id_type" >
                                <option value="id" disabled selected>Choose ID</option>
                                <option value="id" class="id_type">e-Card / UMID</option>
                                <option value="id" class="id_type">Employee’s ID / Office Id</option>
                                <option value="id" class="id_type">Driver’s License*</option>
                                <option value="id" class="id_type">Professional Regulation Commission (PRC) ID *</option>
                                <option value="id" class="id_type">Passport *</option>
                                <option value="id" class="id_type">Senior Citizen ID</option>
                                <option value="id" class="id_type">SSS ID</option>
                                <option value="id" class="id_type">COMELEC / Voter’s ID / COMELEC Registration Form</option>
                                <option value="id" class="id_type">Philippine Identification (PhilID)</option>
                                <option value="id" class="id_type">NBI Clearance *</option>
                                <option value="id" class="id_type">Integrated Bar of the Philippines (IBP) ID</option>
                                <option value="id" class="id_type">Firearms License *</option>
                                <option value="id" class="id_type">AFPSLAI ID *</option>
                                <option value="id" class="id_type">PVAO ID</option>
                                <option value="id" class="id_type">AFP Beneficiary ID</option>
                                <option value="id" class="id_type">BIR (TIN)</option>
                                <option value="id" class="id_type">Pag-ibig ID</option>
                                <option value="id" class="id_type">Person’s With Disability (PWD) ID</option>
                                <option value="id" class="id_type">Solo Parent ID</option>
                                <option value="id" class="id_type">Pantawid Pamilya Pilipino Program (4Ps) ID *</option>
                                <option value="id" class="id_type">Barangay ID *</option>
                                <option value="id" class="id_type">Philippine Postal ID *</option>
                                <option value="id" class="id_type">Phil-health ID</option>
                                <option value="id" class="id_type">School ID **</option>
                                <option value="id" class="id_type">Other valid government-issued IDs</option>
                            </select>
                            </div>

                            <div class="input-box" id="id_card">
                                <label for="id-card">Identification card</label>
                                <input type="file" name="id_card" id="id-card" style="background: transparent;">
                            </div>

                            <div class="input-box" style="width: 40%; margin: 20px auto">
                                <label for="fee">Upload Profile Photo/Selfie</label>
                                <input type="file" name="photo" 
                                id="Selfie"/>
                            </div>
                        
                        </div>
                        
                        <h2>Service Details</h2><br>
                        <div id="service-info">
                            <div class="input-box">
                                <label for="serv-cat"> Service Category</label><br>
                                <div class="dropdown-service">
                                    <ul id="service-category" name="service-category">
                                        <li id="service-name">
                                            <div class="drp">Home Services
      </div>                                      <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Home%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Home" value="Home" id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name">
                                            <div class="drp">Repair and Maintenance Services</div>
                                            <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Repair%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Repair&Maintenance" id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name">
                                            <div class="drp">Events Services</div>                                        <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Event%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Events" id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name">
                                            <div class="drp">Personal Grooming Services</div>
                                            <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Personal Grooming%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Personal Grooming"id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name">
                                            <div class="drp">Automotive Services</div>
                                            <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Automotive%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Health care"id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name">
                                            <div class="drp">Office Services
    </div>                                        <div class="carret">
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="sub-list2">
                                            <?php 
                                                $query = $db->query("SELECT * FROM `services`,service_category WHERE services.cat_id=service_category.cat_id AND service_cat LIKE '%Office%'") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                            <ul name="Office"id="Service_id">
                                                <li><?php echo $fetch['service_name']?></li>
                                                <input type="hidden" value="<?php echo $fetch['cat_id']?>" name="cat_id">
                                                <input type="hidden" value="<?php echo $fetch['service_id']?>" name="service_id">
                                            </ul>
                                            <?php }?>
                                        </div>
                                        </li>
                                        <li id="service-name" style="display: block">
                                            <button type="button" onclick="showMsg()"><i class="fa fa-plus"></i></button>
                                        </li>
                                        <script src="js/show.js"></script>

                                        <div class="input-box" id="container1">
                                            <h2 style="text-align: center">Add Service <i style="color: red; text-align:">*</i></h2><br><br>
                                            <label for="">For</label>
                                            <select type="text" name="cat_id" id="service_cat" >
                                            <?php 
                                                $query = $db->query("SELECT * FROM service_category") or die(mysqli_query());
                                                while($fetch = $query->fetch_array()){
                                            ?>
                                                <option value="<?php echo $fetch['cat_id']?>"><?php echo $fetch['service_cat']?></option>
                                            <?php } ?>
                                            </select><br>
                                        </div>

                                        <div class="input-box" id="container" style="width: 40%; margin: 20px auto">
                                            <label for="txt">Type of Service</label>
                                            <input type="text" id="txt" name="service_type">
                                        </div>
                                        
                                        <div class="input-box" style="width: 40%; margin: 20px auto">
                                            <label for="fee">Estimated Service Fee</label>
                                            <input type="text-area" name="service_fee" 
                                            id="fee" placeholder="ex. P1000"/>
                                        </div>

                                        <div class="input-box" style="width: 40%; margin: 20px auto">
                                            <label for="fee">Upload Certificate</label>
                                            <input type="file" name="certificate" 
                                            id="Certificate">
                                        </div>

                                        <script>
                                            var items = document.querySelectorAll("#service-name li");
                                                for (var i=0; i<items.length; i++){
                                                items[i].onclick = function()
                                                {
                                                    document.getElementById('txt').value = this.innerHTML;
                                                };
                                                }
                                        </script>
                                    </ul>
                                  </div>
                            </div>
                            <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the field input has no value
    if (empty($_POST['firstname'])) {
        // Redirect the user back to the input field
        header('Location: register_service-provider.php#1');
        exit;
    } else {
        // Field input has a value, process the form submission
        // ...
    }
}
?>

                            
                        </div>
                    
                    <div class="button">
                        <input type="submit" value="Register"  name="reg_serPro">  
                    </div>
                    </div>
                    </div>
            </form>
        </div>         
    </div>
    <?php
    $db->close();
    ?>
</div>
</body>
</html>