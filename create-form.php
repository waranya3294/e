<?php
require_once("connection.php");

$connection = new MyConnection();
$pdo = $connection->getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exam_name = $_POST['exam_form_name'];
    $exam_description = $_POST['exam_description'];
    $exam_category = $_POST['exam_category'];
    $exam_code = $_POST['exam_code'];
    $form_date = $_POST['form_date'];
    $exam_passed = $_POST['exam_passed'];
    $exam_number = $_POST['exam_number'];

    try {
        // ตรวจสอบห้องสอบซ้ำ
        $check_form = "SELECT * FROM tbl_exam_form WHERE exam_name = :name AND exam_code = :exam_code";
        $stmt = $pdo->prepare($check_form);
        $stmt->execute([
            ':name' => $name,
            ':exam_code' => $exam_code,
        ]);

        if ($stmt->rowCount() > 0) {
            echo "ห้องสอบนี้มีอยู่แล้ว!";
        } else {
            // เพิ่มข้อมูลใหม่
            $insert_sql = "INSERT INTO tbl_exam_form (exam_name, exam_category, exam_description, exam_date, exam_code)
                           VALUES (:name, :category, :description, :exam_date, :exam_code)";
            $stmt = $pdo->prepare($insert_sql);
            $stmt->execute([
                ':name' => $name,
                ':category' => $category,
                ':description' => $description,
                ':exam_date' => $exam_date,
                ':exam_code' => $exam_code,
            ]);

            if ($stmt->rowCount() > 0) {
                $new_form_id = $pdo->lastInsertId();

                echo "สร้างห้องสอบสำเร็จ! ID: " . $new_form_id;
            } else {
                echo "ไม่สามารถบันทึกข้อมูลได้!";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
