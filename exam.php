<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwsome -->
    <link rel="stylesheet" href="assets/lib/fontawsome/css/brands.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/solid.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/regular.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/fontawesome.css">
    <!--daterangepicker  -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <div class="container mt-5 ">
        <h1>สร้างห้องสอบ</h1>
        <div class="row">
            <div class="col ">
                <div class="btn btn-success" onclick="window.location.href='form.php'">
                <i class="fas fa-plus"></i> สร้างชุดข้อสอบ
                </div>
            </div>
        </div>
    </div>

    <?php
require_once("connection.php");

$connection = new MyConnection();
$pdo = $connection->getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $form_code = trim($_POST['text']); // ตรงกับชื่อฟิลด์ในฟอร์ม
    $category = trim($_POST['category']);
    $exam_date = trim($_POST['date']);
    $description = trim($_POST['description']);

    try {
        // ตรวจสอบห้องสอบซ้ำ
        $check_form = "SELECT * FROM tbl_form WHERE form_name = :name AND form_code = :form_code";
        $stmt = $pdo->prepare($check_form);
        $stmt->execute([
            ':name' => $name,
            ':form_code' => $form_code,
        ]);

        if ($stmt->rowCount() > 0) {
            echo "ห้องสอบนี้มีอยู่แล้ว!";
        } else {
            // เพิ่มข้อมูลใหม่
            $insert_sql = "INSERT INTO tbl_form (form_name, form_category, form_description, form_date, form_code)
                           VALUES (:name, :category, :description, :form_date, :form_code)";
            $stmt = $pdo->prepare($insert_sql);
            $stmt->execute([
                ':name' => $name,
                ':category' => $category,
                ':description' => $description,
                ':form_date' => $exam_date,
                ':form_code' => $form_code,
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


</body>

</html>