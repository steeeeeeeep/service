<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$username = "";
$email    = "";
$phone_num = "";
$gender = "";
$address = "";
$birth_date = "";
$employment_stat = "";
$id_card = "";
$errors = array(); 

// connect to the database
$host = "localhost";
$db_uname = "root";
$db_pass = "ijsf-u_w]Lzsep]z";
$database = "home_service_user";
$db = new mysqli($host, $db_uname, $db_pass, $database);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phone_num = mysqli_real_escape_string($db, $_POST['phone_num']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  // $address = mysqli_real_escape_string($db, $_POST['location']);
  $birth_date = date('Y-m-d', strtotime($_POST['birth_date']));
  $employment_stat = mysqli_real_escape_string($db, $_POST['employment_stat']);



  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($phone_num)) { array_push($errors, "Phone number is required");}
  if (is_numeric($phone_num) == false) {
      array_push($errors, "You entered wrong input in phone number");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM client_list WHERE user_name='$username' OR email='$email' OR phone_num='$phone_num' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       array_push($errors, "Invalid email format");
      }
    }
    if ($user['phone_num'] === $phone_num) {
      array_push($errors, "phone number already exists");
      
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO client_list (firstname, lastname, user_name, email, password, phone_num, gender, birth_date, employment_stat, id_card) 
          VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$phone_num','$gender', '$birth_date', '$employment_stat', '$id_card')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}




// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM client_list WHERE user_name='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>