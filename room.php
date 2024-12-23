<!DOCTYPE html>
<html lang="th">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สร้างห้องสอบ</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .logo-img {
      width: 120px;
      height: auto;
    }

    .menu li {
      padding: 15px;
      color: white;
      text-align: center;
      cursor: pointer;
    }

    .main-content {
      padding: 10px;
    }

    button {
      padding: 10px 20px;
      font-size: 20px;
      color: white;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    button i {
      margin-right: 8PX;
    }

    table {
      margin-top: 20px;
    }

    table th,
    table td {
      text-align: center;
      vertical-align: middle;
    }

    .navbar {
      background-color: #f8f9fa;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
      color: #495057;
      font-size: 1.1rem;
      padding: 10px 15px;
      transition: color 0.3s ease, background-color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #007bff;
      background-color: #f1f1f1;
    }

    .navbar-nav .nav-link.active {
      color: rgb(0, 0, 0);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.3rem;
      color: #007bff;
    }

    .navbar-nav {
      margin-left: auto;
    }

  </style>
</head>

<body>
  
  <div class="container mt-3">
    <h1 class="text-center">สร้างห้องสอบ</h1>
    <button onclick="window.location.href='exam_room_maincontent.php'" title="สร้างห้องสอบ">
      <i class="bi bi-plus-circle"></i>สร้างห้องสอบ
    </button>

    <?php
    try {
      require_once("connection.php");
      $conn = new MyConnection();
      $pdo = $conn->getPdo();

      $selectdata = "SELECT exam_rooms_id, exam_rooms_name, exam_rooms_category, exam_rooms_description, exam_date FROM tbl_exam_rooms_new";
      $stmt = $pdo->prepare($selectdata);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      echo "<p class='text-danger'>Error: " . $th->getMessage() . "</p>";
    }
    ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ลำดับ</th>
            <th>ชื่อห้องสอบ</th>
            <th>รายละเอียด</th>
            <th>วันที่และเวลา</th>
            <th>เข้าห้องสอบ</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($result)) : ?>
            <?php foreach ($result as $row) : ?>
              <tr>
                <td><?= htmlspecialchars($row['exam_rooms_id']) ?></td>
                <td><?= htmlspecialchars($row['exam_rooms_name']) ?></td>
                <td><?= htmlspecialchars($row['exam_rooms_description']) ?></td>
                <td><?= htmlspecialchars($row['exam_date']) ?></td>
                <td>
                  <!-- ปุ่มเข้าห้องสอบ -->
                  <a href="exam.php?room_id=<?= urlencode($row['exam_rooms_id']) ?>" class="btn btn-primary btn-sm" title="เข้าห้องสอบ">
                    เข้าห้องสอบ
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6" class="text-center text-muted">ไม่มีข้อมูล</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <script>
      function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');

        var toggleBtn = document.querySelector('.toggle-btn');
        if (sidebar.classList.contains('collapsed')) {
          toggleBtn.innerHTML = '&#x2192;';
        } else {
          toggleBtn.innerHTML = '&#x2190;';
        }
      }
    </script>
</body>

</html>