<?php
 include('../../connect.php');
 include('../../functions.php');

 $agent = filter($_POST['agent']);
 $address = filter($_POST['address']);
 $state = filter($_POST['state']);
 $area = filter($_POST['area']);
 $garages = filter($_POST['garages']);
 $bedrooms = filter($_POST['bedrooms']);
 $bathrooms = filter($_POST['bathrooms']);
 $purpose = filter($_POST['purpose']);

 if (
     $agent == "" || $address == "" || $state == "" || $area == "" || $garages == ""
     || $bedrooms == "" || $bathrooms == "" || $purpose == ""
     )
    {
    echo jsonResponse([
        'status' => 'error',
        'message' => 'all fields are required'
    ]);
    return false;
    }
    
    $insert = insertInto('properties', [
        'agent_id' => $agent,
        'address' => $address,
        'state' => $state,
        'area' => $area,
        'garages' => $garages,
        'bedrooms' => $bedrooms,
        'bathrooms' => $bathrooms,
        'purpose' => $purpose
    ]);
    
    if ($insert) {
        echo jsonResponse([
            'status' => 'success',
            'message' => 'Property was successfully added!',
            'data' => $insert,
        ]);
        return false;
    }

    echo jsonResponse([
        'status' => 'error',
        'message' => 'something went wrong! Try again'
    ]);



