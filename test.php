<?php 

require_once("connection.php");
$conn = new MyConnection();
$pdo = $conn->getPdo();

$response = array();

$ID_Emp = !empty($_POST["ID_Emp"]) ? $_POST["ID_Emp"] :"";
$password = !empty($_POST["password"]) ? $_POST["password"] :"";

// //echo "ID_Emp : ".$ID_Emp." Pass: ".$password."";

// $response = array('ID_Emp'=> $ID_Emp,'pass'=> $password);


// if($type === "user"){
//     $response = array("user_type"=>"เป็นผู้ใช้จ้าาาา");
// }else {
//     $response = array("user_type"=>"เป็นผู้ใช้อื่น");
// }

echo json_encode($response);


// //ID_Emp : 1234 Pass: 1234

// 

?>