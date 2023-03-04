<?php
require_once 'session.php';
require_once 'scripts/DB.php';
require_once 'scripts/helpers.php';

if (isset($_POST['login_user'])) {
    $input = clean($_POST);

    $username = $input['username'];
    $password = $input['password'];

    if ($contact == "7070808080" && $password == "admin123") {
        $s = new stdClass();
        $s->name = "admin";
        $_SESSION['user'] = $s;

        header('Location: ../admin.php');
        exit();
    } 
	
	else{
        $stmt = DB::query(
            "SELECT * FROM workers WHERE username=? AND password=?",
            [$username , $password]
        );
        $provider = $stmt->fetch(PDO::FETCH_OBJ);

        if (isset($provider->username)) {
            $_SESSION['user'] = $provider;
            header('Location: ../WorkGo-service_provider.php');
            exit();
        } else {
            header('Location: ../login.php?msg=failed');
            exit();
        }
    }
}
