<?php

include_once('Database.php');

$db = new Database();

$received_data = json_decode(file_get_contents("php://input"));
$title = $received_data->title;
$message = "";

if($title != null){
    $sql = "INSERT INTO todoLists(title) VALUES('$title')";
    $result = $db->conn->query($sql);

    if($result) $message = 'success';
    else $message = 'Your input is invalid';
} else {
    $message = 'Please enter your title';
}

$output = array(
    'message'=>$message,
);

echo json_encode($output);


