<?php
include_once('Database.php');

$db = new Database();

$received_data = json_decode(file_get_contents("php://input"));
$id = $received_data->id;
$message = "";



if($id == null){
    $message = 'id is null';
} else {
    $sql = "DELETE FROM todoLists WHERE id = $id";
    $result = $db->conn->query($sql);

    if($result){
        $message = "success";
    } else {
        $message = "Invalid";
    }
}

$output = array(
    'message'=>$message,
);

echo json_encode($output);