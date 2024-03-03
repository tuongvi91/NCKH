<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/card_class_teacher.css">
    <title>Danh sách lớp học</title>
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <section class="home-section">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Nhập lớp cần tìm ...">
        </div>
         <div class="add-class-button-container">
            <button class="add-class-button">Thêm lớp học</button>
        </div>
        <div class="card-container">
            <a href="link-to-your-page-1" class="card card-1">
                <div class="card-info">
                    <div class="card-time">6/11/2024</div>
                    <h1 class="card-title">Lập trình WEB</h1>
                </div>
            </a>
            <a href="link-to-your-page-2" class="card card-2">
                <div class="card-info">   
                    <div class="card-time">10/07/2023</div>
                    <h1 class="card-title">Tin học cơ bản</h1>
                </div>
            </a>

        </div>
        <!-- Form thêm lớp học -->
        <div class="add-class">

            <header>
                <h1 class="modalTitle">Thêm người dùng </h1>
            </header>
             <div class="form-group">
                <label for="lesson_content">Chủ đề</label>
                <input type="text" name="" id="lesson_content" required>
            </div>
            
            <div class="form-group">
                <label for="room" class="form-label">Phòng học </label>
                <input id="room" name="room" type="text" class="form-control">
            </div>

            <div class="form-group">
                        <label for="lesson" class="form-label">Tiết học</label>
                            <div class="select-wrapper">
                                <select name="time" id="table_size">
                                    <option value="1">1-2</option>
                                    <option value="2">3-5</option>
                                    <option value="3">6-7</option>
                                    <option value="4">8-10</option>
                                </select>
                            </div>
            </div>

            <div class="form-group">
                <label for="faculty" class="form-label">Khoa </label>
                <input id="faculty" name="faculty" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="batch" class="form-label">Khoá </label>
                <input id="batch" name="batch" type="text" class="form-control">
            </div>

            <div class="end">
                <button id="add-class-submit">Thêm</button>
                <button id="cancel-add-class">Hủy</button>
            </div>

        </div>

        <script src="../js/card_class_teacher.js"></script>
    </section>
</body>
</html>
