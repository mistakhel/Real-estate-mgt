<?php
include '../../connect.php';
include '../../functions.php';

$first_name = filter($_POST['first_name']);
$last_name = filter($_POST['last_name']);
$gender = filter($_POST['gender']);
$email = strtolower(filter($_POST['email']));
$address = filter($_POST['address']);
$phone = filter($_POST['phone']);
$is_admin = null;
$is_agent = null;

// if any of the mandatory field is missing...
if ($first_name == '' || $last_name == '' || $gender == '' || $email == '' || $phone == '') {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'fill all required fields',
    ]);
    return false;
}

// check if email already exist...
$email_sql = "SELECT *  FROM `users` WHERE `email` = '$email'";
$email_query = mysqli_query($connect, $email_sql);
$email_count = mysqli_num_rows($email_query);

if ($email_count > 0 ) {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'email, '.$email.' is already taken',
    ]);
    return false;
}

if (array_key_exists('is_admin', $_POST)) {
    $is_admin = 1;
}

if (array_key_exists('is_agent', $_POST)) {
    $is_agent = 1;
}

$default_password = md5('password');


$sql = "INSERT INTO `users` 
(`first_name`, `last_name`, `gender`, `phone`, `email`, `address`, `password`, `is_admin`, `is_agent`, `created_at`, `updated_at`)
 VALUES 
 ('$first_name', '$last_name', '$gender', '$phone', '$email', '$address', '$default_password', '$is_admin', '$is_agent', NOW(), NOW())";



if (mysqli_query($connect, $sql)) {
    $last_id = mysqli_insert_id($connect);
    echo jsonResponse([
        'status' => 'success',
        'message' => 'user, '.$first_name.' '.$last_name.' successfully added to database ',
        'id' => $last_id,
    ]);
} else {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'something went wrong! try again',
    ]);
}
