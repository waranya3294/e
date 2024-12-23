    <form action="create-room.php" method="POST">
        <div class="container mt-5">
            <div class="" style="color: #18B0BD;">
                <h1 class="display-4"> สร้างห้องเข้าสอบ</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="card border-0" style="background-color: rgba(104, 103, 103, 0.1)">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name">ชื่อห้องสอบ:<spen class="text-danger">*</spen></label>
                                <input type="text" name="text" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description">รายละเอียด:<spen class="text-danger mb-3">*</spen></label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <label for="datetimes">วันที่เปิดห้องสอบ:<spen class="text-danger">*</spen></label>
                            <div class="input-group mb-5">
                                <input type="text" id="datetimes" name="datetimes" class="form-control" aria-describedby="exam_starttime_endtime">
                                <span class="input-group-text" id="exam_starttime_endtime">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col text-center">
                    <div class="btn btn-success" onclick="showData()">
                        <i class="fa-solid fa-floppy-disk"></i> บันทึก
                    </div>
                    <div class="btn btn-secondary" onclick="window.location.href='room.php'">ยกเลิก</div>
                </div>
            </div>
        </div>
    </form>

    <script>
         function showData() {
        var name = $("#name").val();
        var description = $("#description").val();
        var date = $("#datetimes").val();

        var formData = new FormData();

        formData.append("name", name);
        formData.append("description", description);
        formData.append("date", date);

        $.ajax({
            type: 'POST',
            url: 'create-room.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

                }
            })
        }
    </script>
