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
$id = $_POST['id'];

// if any of the mandatory field is missing...
if ($first_name == '' || $last_name == '' || $gender == '' || $email == '' || $phone == '') {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'fill all required fields',
    ]);
    return false;
}

// check if email already exist except for current user...
$email_sql = "SELECT *  FROM `users` WHERE `email` = '$email' AND `id` <> '$id'";
$email_query = mysqli_query($connect, $email_sql);
$email_count = mysqli_num_rows($email_query);

if ($email_count > 0) {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'email, ' . $email . ' is already taken',
    ]);
    return false;
}

if (array_key_exists('is_admin', $_POST)) {
    $is_admin = 1;
}

if (array_key_exists('is_agent', $_POST)) {
    $is_agent = 1;
}

$sql = "UPDATE `users` SET 
    `first_name` = '$first_name',
    `last_name` = '$last_name',
    `gender` = '$gender',
    `email` = '$email',
    `phone` = '$phone',
    `address` = '$address',
    `is_admin` = '$is_admin',
    `is_agent` = '$is_agent',
    `updated_at` = NOW()
 WHERE `id`='$id'";

if (mysqli_query($connect, $sql)) {
    echo jsonResponse([
        'status' => 'success',
        'message' => 'user data updated successfully'
    ]);
} else {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'something went wrong! Try again!',
    ]);
}

