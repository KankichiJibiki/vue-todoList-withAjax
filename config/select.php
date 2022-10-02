<?php

include_once('Database.php');

$db = new Database();
$sql = "SELECT * FROM todoLists ORDER BY id DESC ";
$result = $db->conn->query($sql);
$data = [];

if($result->num_rows == 0){
    // echo 'No record found';
    // echo json_encode($result);
    return;
}
while($result_record = $result->fetch_assoc()){
    $data[] = $result_record;
}
echo json_encode($data);


// class Connect extends Database{

//     // public $data = [];

//     public function selectData(){
//         $data = [];
//         $sql = "SELECT * FROM 'todoLists' ORDER BY 'id' DESC ";

//         $result = $this->conn->query($sql);

//         if($result->num_rows == 0){
//             echo 'No record found';
//         }

//         while($result_record = $result->fetch_assoc()){
//             $data[] = $result_record;
//         }

//         echo json_encode($data);
//     }
// }