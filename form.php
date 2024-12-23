<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สร้างชุุดข้อสอบ</title>
    <!-- Bootstrap 5.3 -->
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

    <style>
        @font-face {
            font-family: "Sarabun";
            font-weight: 400;
            font-style: normal;
            src: url(assets/font/sarabun/Sarabun-Regular.ttf);
        }

        * {
            font-family: "Sarabun", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>

</head>

<body>
    <form action="create-form.php" method="POST">
        <div class="container mt-5">
            <div class="" style="color:#18B0BD">
                <h1 class="display-4"><i class="fa-regular fa-file"></i> สร้างชุดข้อสอบใหม่</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-12 mb-3 mb-lg-0">
                    <div class="mb-3">
                        <label for="name">ชื่อหัวข้อ:<spen class="text-danger">*</spen></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <label for="description">รายละเอียด:<spen class="text-danger">*</spen></label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="card border-0" style="background-color: rgba(104, 103, 103, 0.1)">
                        <div class="card-body">

                            <div class="mb-3 ">
                                <label for="category">เลือกหมวดหมู่</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="">กรุณาเลือกรายการ</option>
                                    <option value="">สี</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exam_code">ตั้งรหัสเข้าห้องสอบ:<spen class="text-danger">*</spen></label>
                                <input type="text" class="form-control">

                            </div>

                            <label for="datetimes">วันที่เปิดห้องสอบ:<spen class="text-danger">*</spen></label>
                            <div class="input-group mb-3">
                                <input type="text" id="datetimes" name="datetimes" class="form-control" aria-describedby="exam_starttime_endtime">
                                <span class="input-group-text" id="exam_starttime_endtime">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6 ">
                                    <label for="number">จำนวนข้อสอบ:<spen class="text-danger">*</spen></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="exam_passed" aria-describedby="exam_passed">
                                        <span class="input-group-text" id="exam_passed">ข้อ</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="exam_passed">ข้อที่สอบผ่าน:<spen class="text-danger">*</spen></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="exam_passed" aria-describedby="exam_passed">
                                        <span class="input-group-text" id="exam_passed">ข้อ</span>

                                    </div>
                                </div>
                            </div>
                            <label for="exam_time">เวลาในการทำข้อสอบ:<spen class="text-danger">*</spen></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="exam_time" aria-describedby="exam_time">
                                <span class="input-group-text" id="exam_time">นาที</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="divider">
            <div class="row">
                <div class="col text-end">
                    <div type="submit" class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i> บันทึก
                    </div>
                    <div class="btn btn-secondary" onclick="window.location.href='exam.php'">ยกเลิก</div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker24Hour: true,
                timePicker: true,
                autoUpdateInput: false, // ป้องกันการอัปเดตค่าอัตโนมัติในอินพุต
                locale: {
                    format: 'DD MMM YYYY HH:mm ',
                    cancelLabel: 'Clear'
                }
            });

            // เพิ่มการตั้งค่า event เพื่ออัปเดตค่าหลังจากที่ผู้ใช้เลือก
            $('input[name="datetimes"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD MMM YYYY HH:mm') + ' - ' + picker.endDate.format('DD MMM YYYY HH:mm'));
            });

            $('input[name="datetimes"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val(''); // เคลียร์ค่าถ้าผู้ใช้กดปุ่ม Clear
            });

        });
    </script>
</body>

</html>