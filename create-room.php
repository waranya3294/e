<?php
require_once("connection.php");

$connection = new MyConnection(); // สร้าง instance ของ MyConnection
$pdo = $connection->getPdo(); // ดึง PDO object สำหรับใช้งาน

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = ($_POST['name']);
    $room_code = trim($_POST['text']);
    $category = trim($_POST['category']);
    $exam_date = trim($_POST['date']);
    $description = trim($_POST['description']);
    $creator = "Admin"; // สมมุติว่าผู้สร้างห้องสอบคือ Admin

    try {
        // ตรวจสอบห้องสอบที่ซ้ำกัน
        $check_rooms = "SELECT * FROM tbl_exam_rooms_new WHERE exam_rooms_name = :name AND room_code = :room_code";
        $stmt = $pdo->prepare($check_rooms);
        $stmt->execute([
            ':name' => $name,
            ':room_code' => $room_code,
        ]);

        if ($stmt->rowCount() > 0) {
            echo "มีห้องสอบนี้อยู่ในระบบแล้ว!";
        } else {
            // บันทึกข้อมูลใหม่
            $insert_sql = "INSERT INTO tbl_exam_rooms_new (exam_rooms_name, exam_rooms_category, exam_rooms_description, room_code, exam_date)
                           VALUES (:name, :category, :description, :room_code, :exam_date)";
            $stmt = $pdo->prepare($insert_sql);
            $stmt->execute([
                ':name' => $name,
                ':category' => $category,
                ':description' => $description,
                ':exam_date' => $exam_date,
            ]);

            if ($stmt->rowCount() > 0) {
                $new_room_id = $pdo->lastInsertId(); // ดึง ID ห้องสอบที่เพิ่งสร้าง

                // บันทึกประวัติการสร้างห้องสอบใน tbl_created_exam_logs
                $log_sql = "INSERT INTO tbl_created_exam_logs (exam_rooms_id, creator_name, created_at)
                            VALUES (:exam_rooms_id, :creator_name, NOW())";
                $log_stmt = $pdo->prepare($log_sql);
                $log_stmt->execute([
                    ':exam_rooms_id' => $new_room_id,
                    ':creator_name' => $creator,
                ]);

                // Redirect ไปที่หน้ารายละเอียดของห้องสอบ
                header("Location:  room.php?room_id=" . $new_room_id);
                exit;
            } else {
                echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล!";
            }
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>