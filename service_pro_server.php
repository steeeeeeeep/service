<?php
require_once "scripts/session.php";
require_once 'scripts/helpers.php';
include_once "scripts/db_conn.php";
  

// initializing variables
$firstname = "";
$lastname = "";
$username = "";
$email    = "";
$contact = "";
$gender = "";
$barangay = "";
$street = "";
$age = "";
$employment_stat = "";
$gender = "";
$id_type = "";
$id_card = "";
$service = "";
$est_fee = "";
$profile_photo = "";
$certificate = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_serPro'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db_home_service_111, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db_home_service_111, $_POST['lastname']);
  $username = mysqli_real_escape_string($db_home_service_111, $_POST['username']);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password_1 = mysqli_real_escape_string($db_home_service_111, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db_home_service_111, $_POST['password_2']);
  $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_NUMBER_INT);
  $gender = mysqli_real_escape_string($db_home_service_111,$_POST['gender']);
  $barangay = mysqli_real_escape_string($db_home_service_111,$_POST['barangay']);
  $street = mysqli_real_escape_string($db_home_service_111,$_POST['street']);
  $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
  $employment_stat = mysqli_real_escape_string($db_home_service_111,$_POST['employment_stat']);
  $id_type = mysqli_real_escape_string($db_home_service_111,$_POST['id_type']);
  $id_card = $_FILES['id_card'];
  $service_type = mysqli_real_escape_string($db_home_service_111,$_POST['service_type']);
  $service_fee = mysqli_real_escape_string($db_home_service_111,$_POST['service_fee']);
  $profile_photo = $_FILES['photo'];
  $certificate = $_FILES['certificate'];
  $service_id = mysqli_real_escape_string($db_home_service_111,$_POST['service_id']);
  $cat_id = mysqli_real_escape_string($db_home_service_111,$_POST['cat_id']);

  $file1 = upload($profile_photo);

    if ($file1 === false) {
        header('Location', '../register.php?msg=file');
        exit();
    }

  $file2 = upload($id_card);

    if ($file2 === false) {
        header('Location', '../register.php?msg=file');
        exit();
    }


  $file3 = upload($certificate);

    if ($file3 === false) {
        header('Location', '../register.php?msg=file');
        exit();
    }

 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if ($age < 18){array_push($errors, 'You must be 18 years old or above to register');}
  if (empty($contact)) { array_push($errors, "Phone number is required");}
  if (is_numeric($contact) == false) {
      array_push($errors, "You entered wrong input in phone number");
  }
  if(empty($barangay)){ array_push($errors, "Barangay is required"); } 
  if(empty($street)){ array_push($errors, "Street is required"); } 
  if(empty($id_card)){ array_push($errors, "Id picture is required"); } 
  if(empty($gender)){ array_push($errors, "Gender is required"); }
  if(empty($service)){ array_push($errors, "Choose your service"); } 
  if(empty($est_fee)){ array_push($errors, "Please input Estimated Fee"); } 
  if(empty($profile_photo)){ array_push($errors, "Please upload your photo/selfie"); } 
  if(empty($certificate)){ array_push($errors, "Certificate is required"); } 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM workers WHERE username='$username' OR email='$email' OR contact='$contact'LIMIT 1";
  $result = mysqli_query($db_home_service_111, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       array_push($errors, "Invalid email format");
      }
    }
  }

  $contact_check = $db_home_service_111->query("SELECT * FROM workers WHERE contact='$contact' LIMIT 1");
  $contact_check_list = $contact_check->fetch_array();

  if($contact_check_list){
    if($contact_check_list['contact'] === $contact){
      array_push($errors, "Contact Number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
    $password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

  	$query = "INSERT INTO workers (firstname, lastname, username, email, password, contact, photo,status) 
          VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$contact','$file1','toReview')";

    if(mysqli_query($db_home_service_111, $query)){

      $provider_id = $db_home_service_111->insert_id;
      $query2 = "INSERT INTO provider_info (provider_id, gender,age,id_type,id_card,employment_stat,certificate,barangay,street)
              VALUES('$provider_id','$gender','$age','$id_type','$file2','$employment_stat','$file3','$barangay','$street');";
      $query2 .= "INSERT INTO service_info (provider_id,service_type,service_fee, service_id, cat_id)
              VALUES('$provider_id','$service_type','$service_fee', '$service_id', '$cat_id');";

      mysqli_multi_query($db_home_service_111, $query2);
    }

  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
    echo "<script type='text/javascript'>document.location='index.php';</script>";
  }
}




// ... 

// LOGIN USER
if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db_home_service_111, $_POST['username']);
  $password = mysqli_real_escape_string($db_home_service_111, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM workers WHERE username='$username'";
    $results = mysqli_query($db_home_service_111, $query);
    $fetch = $results->fetch_array();
    if (mysqli_num_rows($results) == 1) {
        if (password_verify($password, $fetch['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['provider_id'] = $fetch['provider_id'];
            $_SESSION['success'] = "You are now logged in";
            header('location: serviceProvider/WorkGo-service_provider.php');
        } else {
            array_push($errors, "Wrong username/password combination!");
        }
    } else {
        array_push($errors, "Username not found!");
    }
  } else {
    array_push($errors, "Sorry, something went wrong.");
  }
}

  ?>