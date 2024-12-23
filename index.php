<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>เริ่มต้น</title>
    <style>
        body {
            background-image: url('images/3.png');
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color:rgba(255, 255, 255, 0.7);
            padding: 40px 40px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .button-container button {
            width: 200px;
            padding: 15px;
            margin: 10px;
            background: linear-gradient(to right, #28a745, #218838);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .button-container button:hover {
            transform: scale(1.1);
            background: linear-gradient(to right, #218838, #28a745);
        }
        @media (max-width: 768px){
            body {
                padding: 10px;
            }
            .container{
                max-width: 90%; 
                padding: 15px 20px;  /*กว้างขึ้นในหน้าจอแคบ*/
            }
            .button-container button {
                font-size: 16px; /* ลดขนาดปุ่ม */
                padding: 10px; /* ลด padding ในปุ่ม */
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Kobelco Construction Machinery Southeast Asia Co., Ltd.</div>
        <div class="button-container">
            <button onclick="window.location.href='login.php'">ผู้ใช้งาน</button>
            <button onclick="window.location.href='homepage.php'">ผู้ลงข้อสอบ</button>
        </div>
    </div>
</body>

</html>
