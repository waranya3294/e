<?php
require_once("connection.php");
$conn = new MyConnection();
$pdo = $conn->getPdo();
$response = array();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dept = !empty($_POST['dept']) ? $_POST['dept'] :'';
    $exam_code = !empty($_POST['exam_code']) ? $_POST['exam_code'] :'';

    $check_user = "SELECT test_dept,test_invite_code FROM tbl_test WHERE test_dept = :dept AND test_invite_code = :exam_code";
    $stmt = $pdo->prepare($check_user);
    $stmt->execute([
        ':dept' => $dept,':exam_code' => $exam_code]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   
    //ตรวจสอบว่าข้อมูล
    if(!$result){
        $response = array('icon' => 'warning','title' => 'เกิดข้อผิดพลาด','text' => 'ไม่พบผู้ใช้งานนี้','btnColor' => 'yellow');
    }else{
        $response = array('icon'=> 'success',);
    }

}else{
$response = array('icon' => 'error','title' => 'เกิดข้อผิดพลาด','text' => 'การร้องขอผิดพลาด','btnColor' => 'red');
}
echo json_encode($response);



?>