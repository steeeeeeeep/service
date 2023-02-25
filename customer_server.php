<?php
require_once "session.php";
require_once "scripts/helpers.php";
include_once "scripts/db_conn.php";

// initializing variables
$firstname = "";
$lastname = "";
$username = "";
$email    = "";
$contact = "";
$gender = "";
$errors = array(); 


// REGISTER USER
if (isset($_POST['reg_customer'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $barangay = $_POST['barangay'];
  $street = $_POST['street'];
  $age = $_POST['age'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($contact)) { array_push($errors, "Phone number is required");}
  if (is_numeric($contact) == false) {
      array_push($errors, "You entered wrong input in phone number");
  }
  if ($age < 18){array_push($errors, 'You must be 18 years old or above to register');}
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' OR contact='$contact' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
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
    if ($user['contact'] === $contact) {
      array_push($errors, "phone number already exists");
      
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

    $query = "INSERT INTO customer (firstname, lastname, username, email, password, contact, photo) 
          VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$contact','$file1')";
    
  	if(mysqli_query($db, $query)){

      $customer_id = $db->insert_id;
      $query2 = "INSERT INTO customer_info (customer_id, gender,age, barangay, street)
              VALUES('$customer_id','$gender','$age', '$barangay', '$street');";

      mysqli_multi_query($db, $query2);
    }


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
    $query = "SELECT * FROM customer WHERE username='$username'";
    $results = mysqli_query($db, $query);
    $fetch = $results->fetch_array();
    if (mysqli_num_rows($results) == 1) {
        if (password_verify($password, $fetch['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['customer_id'] = $fetch['customer_id'];
            $_SESSION['success'] = "You are now logged in";
            header('location: customer/WorkGO_customer.php');
        } else {
            array_push($errors, "Wrong username/password combination!");
        }
    } else {
        array_push($errors, "Username not found!");
    }
}
}

  ?>