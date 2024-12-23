
    
    <div class="container mt-5">
        <h1 contenteditable="true" class="mb-3">ตั้งชื่อหัวข้อสอบ</h1>
        <p contenteditable="true" class="mb-4">คำอธิบาย/คำชี้แจง</p>

        <div class="question-box mb-4">
            <div class="row ">
                <div class="col-md-6 mb-3">
                    <input type="text" name="question" class="form-control" placeholder="เพิ่มคำถาม ?">
                </div>
                <div class="col text-end">
                    <label for="image-input" class="btn btn-outline-primary">
                        <i class="bi bi-image" title="แทรกรูปภาพ"></i>
                    </label>
                    <input type="file" id="image-input" class="d-none">
                </div>
                <div class="col">
                    <select name="question-type" class="form-select">
                        <option value="">กรุณาเลือกประเภท</option>
                        <option value="">หลายตัวเลือก</option>
                        <option value="">คำตอบสั้นๆ</option>
                    </select>
                </div>
            </div>

            <div id="options-container" class="mb-3">
                <div class="d-flex align-items-center mb-2">
                    <input type="text" class="form-control me-2" placeholder="ตัวเลือกที่ 1">
                    <button class="btn " onclick="removeOption(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label class="" onclick="addOption()">
                <i class="fas fa-plus"></i><u> เพิ่มตัวเลือก</u>
                </label>
            </div>

            <div class="">
                <button class="btn btn-outline-primary" onclick="duplicateQuestion(this)">
                    <i class="bi bi-copy"></i>
                </button>
                <button class="btn btn-warning" onclick="addNewQuestion()">
                    <i class="bi bi-plus-circle"></i> เพิ่มคำถามใหม่
                </button>
            </div>

            <hr>
        </div>

        <div class="text-end mb-3">
            <button class="btn btn-success">
                <i class="fas fa-save"></i> บันทึก
            </button>
            <button class="btn btn-secondary" onclick="window.location.href='exam.php'">
                <i class="fas fa-times"></i> ยกเลิก
            </button>
        </div>
    </div>


    <script>
        function addOption() {
            const optionsContainer = document.getElementById('options-container');
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('d-flex', 'align-items-center', 'mb-3');
            optionDiv.innerHTML = `
                <input type="text" class="form-control me-2" placeholder="ตัวเลือกที่ ${optionsContainer.children.length + 1}">
                <button class="btn " onclick="removeOption(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>`;
            optionsContainer.appendChild(optionDiv);
        }

        function removeOption(button) {
            button.parentElement.remove();
        }

        function duplicateQuestion(button) {
            const questionBox = button.closest('.question-box');
            const clone = questionBox.cloneNode(true);
            questionBox.parentElement.insertBefore(clone, questionBox.nextSibling);
        }

        function addNewQuestion() {
            const container = document.querySelector('.container');
            const questionBox = document.querySelector('.question-box');
            const clone = questionBox.cloneNode(true);
            clone.querySelectorAll('input, select').forEach(input => input.value = '');
            container.insertBefore(clone, container.lastElementChild);
        }
    </script>
