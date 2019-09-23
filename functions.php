<?php
$connect = $GLOBALS['connect'];

function filter($input)
{
    $input  = addslashes(trim($input));
    return mysqli_real_escape_string($GLOBALS['connect'], $input);
}

function jsonResponse(array $data)
{
    header('Content-Type: application/json');
    return json_encode($data);
    die();
}

function getUser($id)
{
    $sql = "SELECT * FROM `users` WHERE `id`='$id'";
    $query = mysqli_query($GLOBALS['connect'], $sql);
    $row = mysqli_fetch_assoc($query);
    return (object)$row;
}

function defaultAvatar($id = '')
{
    $male = '../img/icons/man.png';
    $female = '../img/icons/girl.png';
    if (getUser($id)->gender == 'male') {
        return $male;
    } else {
        return $female;
    }

    return $male;

}

function getAvatar($id) 
{
    $user = getUser($id);
    if ($user->photo) {
        return '../'.$user->photo;
    } else {
        return defaultAvatar($id);
    }
}

function updateUserData(array $data, $id)
{
    // construct sql...
    $sql = null;
    $sql .= "UPDATE `users` SET ";
    foreach ($data as $key => $d) {
        $sql .= "`$key` = '$d',";
    }
    $sql = trim($sql,',');
    $sql .= " WHERE `id` = '$id' ";

    if (mysqli_query($GLOBALS['connect'], $sql)) {
        $query1 = mysqli_query($GLOBALS['connect'], "SELECT * FROM `users` WHERE `id`='$id'");
        return (object)mysqli_fetch_assoc($query1);
    }
    return false;
}

function agents() 
{
    $sql = "SELECT * FROM `users` WHERE `is_agent`='1'";
    $query = mysqli_query($GLOBALS['connect'], $sql);
    $agents = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $agents[] = (object)$row;
    }
    return $agents;
}

function properties()
{
    $sql = "SELECT * FROM `properties`";
    $query = mysqli_query($GLOBALS['connect'], $sql);
    $props = [];
    while($row = mysqli_fetch_assoc($query)) {
        $props[] = (object)$row;
    }
    return $props;
}

function prepTableField($value)
{
    return ("`$value`");
}

function insertInto($table, array $data)
{
    $fields_array = array_keys($data);
    array_push($fields_array, 'created_at','updated_at');
    $fields = array_map("prepTableField", $fields_array);

    $values_array = array_values($data);
   
    $sql = "INSERT INTO `$table` (";
    foreach ($fields as $f) {
        $sql .= "$f,";
    }

    $sql = trim($sql, ',').") VALUES (";

    foreach ($values_array as $val) {
        $sql .= "'$val',";
    }

    $sql = $sql." NOW(), NOW() )";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (mysqli_query($GLOBALS['connect'], $sql)) {
        return mysqli_insert_id($GLOBALS['connect']);
    }
    return false;
}

function searchProperties($search)
{
    $sql = "SELECT * FROM `properties` WHERE `address` LIKE '%$search%'
            OR `state` LIKE '%$search%'";
    $query = mysqli_query($GLOBALS['connect'], $sql);
    $res = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $res[] = (object)$row;
    }
    return $res;
}
