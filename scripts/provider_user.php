<?php
include_once "../scripts/DB.php";

if (!isset($_GET['provider'])) {
    header('Location: index.php');
    exit();
}


$provider = DB::query("SELECT * FROM sp_list NATURAL JOIN provider_info NATURAL JOIN service_info WHERE provider_id=?", [$_GET['provider']])->fetch(PDO::FETCH_OBJ);

if ($provider === false) {
    header('Location: index.php');
    exit();
}

include_once "msg/booking.php";

