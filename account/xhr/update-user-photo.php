<?php
include '../../connect.php';
include '../../functions.php';

$file_name = $_FILES['img']['name'];
$file_type = $_FILES['img']['type'];
$file_tmp = $_FILES['img']['tmp_name'];
$file_size = $_FILES['img']['size'];

$file_end = explode('.', trim($file_name));
$file_end = strtolower(end($file_end));

$id = $_POST['id'];

// print_r($file_end);

$limit_size = 204800;

$allowed_ends = ['png','jpeg','jpg','gif'];


if ($file_size > $limit_size) {
   echo  jsonResponse([
        'status' => 'error',
        'message' => 'file size is greater than 200kb'
    ]);
} else if (!in_array($file_end, $allowed_ends)) {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'file size must be either '.implode(' or ', $allowed_ends)
    ]);
} else {
    $target = '../../uploads/profiles/img-'.$id.'.'.$file_end;
    $dest_target = 'uploads/profiles/img-'.$id.'.'.$file_end;
    if (move_uploaded_file($file_tmp, $target)) {
        $u = updateUserData([
            'photo' => $dest_target,
        ], $id);
        echo jsonResponse([
            'status' => 'success',
            'message' => 'user photo updated successfully',
            'data' => $u
        ]);
    }
}


