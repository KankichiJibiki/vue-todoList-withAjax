<?php
include_once('Database.php');
$db = new Database();

$recieved_data = json_decode(file_get_contents('php://input'));
$action = $recieved_data->action;
$message = "";

switch($action){
    case "insert":
        $title = $recieved_data->title;
        if($title == null){
            $message = "Title is empty";
        } else {
            $sql = "INSERT INTO todoLists(title) VALUES('$title')";
            $result  = $db->conn->query($sql);
            
            if($result) $message = 'success';
            else $message = 'Invalid';
        }
        break;
    case "delete":
        $id = $recieved_data->id;
        if($id == null){
            $message = "ID is empty";
        } else {
            $sql = "DELETE FROM todoLists WHERE id = $id";
            $result = $db->conn->query($sql);
            
            if($result){
                $message = "success";
            } else {
                $message = "Invalid";
            }
        }

        break;
}

$output = [
    'message' => $message,
];

echo json_encode($output);