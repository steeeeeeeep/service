<?php
require_once "../scripts/session.php";
require_once "../scripts/db_conn.php";
require_once "../scripts/helpers.php";

$name ='';
$username = '';
$password_1 = '';
$password_2 = '';
$errors = array();

if(isset($_POST['register_admin'])){
    $name = mysqli_real_escape_string($db_home_service_111, $_POST['name']);
    $username = mysqli_real_escape_string($db_home_service_111, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db_home_service_111, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db_home_service_111, $_POST['password_2']);

    if(empty($username)){
        array_push($errors, "Please Input username.");
    }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
    if(empty($username && $password_1 || $password_2)){
        array_push($errors, "Please put some inputs.");
    }

    $admin_user_check = $db_home_service_111->query("SELECT * FROM `admin` WHERE `username`='$username' OR `password`='$password_1' LIMIT 1") or die(mysqli_error());
    $user_admin = $admin_user_check->fetch_assoc();

    if($user_admin['username'] === $username){
        array_push($errors, "Username already exist");
    }
    if(password_verify($password_1, $user_admin['password'] == $password_1)){
        array_push($erros, "Password already used, try another combination.");
    }

    if(count($errors) == 0){
        $password = password_hash($password_1, PASSWORD_BCRYPT);

        $query = $db_home_service_111->query("INSERT INTO `admin` (`name`,`username`, `password`) VALUES('$name', '$username', '$password')");

    
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
        echo "<script type='text/javascript'>document.location='index.php';</script>";
    } else {
        array_push($errros, "something went wrong");
    }

}

//admin login

if(isset($_POST['login_admin'])){
    $username = mysqli_real_escape_string($db_home_service_111, $_POST['username']);
    $password = mysqli_real_escape_string($db_home_service_111, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Please input your username.");
    }

    if(empty($password)){
        aray_push($errors, "Please input your password");
    }

    if(count($errors) == 0){
        $query = $db_home_service_111->query("SELECT * FROM `admin` WHERE  `username`='$username'");
        $fetch = $query->fetch_array();
        
        if (mysqli_num_rows($query) == 1) {
            if (password_verify($password, $fetch['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['admin_id'] = $fetch['admin_id'];
                $_SESSION['success'] = "You are now logged in";
                header('location: ./dashboard.php');
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
    