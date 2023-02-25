<?php

function clean($data = array())
{
    foreach ($data as $key => $val) {
        $data[$key] = trim($val);
        $data[$key] = stripslashes($val);
        $data[$key] = htmlspecialchars($val);
    }
    return $data;
}

function upload($file, $allowed = ['png', 'jpg', 'jpeg', 'gif'])
{
    $a = explode('.', $file['name']) ?: '';
    $ext = end($a);
    if (array_search($ext, $allowed) === false) {
        return false;
    }
    $dest = uniqid().'.'.$ext;

    if (move_uploaded_file($file['tmp_name'], 'user_images/'.$dest)) {
        return $dest;
    }
    return false;
    
    $file_size = $_FILES['file']['size'];
    if($file_size > 5000000) {
        echo 'File size too large';
        exit();
    }
}