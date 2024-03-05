<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập trên lớp</title>
    <link rel="stylesheet" href="../css/exercise_teacher.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <section class="home-section">
    <header>
        <div class="decentralization">
            <ul class="menu">
                <li><a href="#">Bài tập</a></li>
                <li><a href="#">Danh sách lớp học</a></li>
            </ul>
        </div>

        <div class="filterEntries">
            <div class="filter">
                <form action="" method = "get">
                
                    <input type="search" name="search" id="search" placeholder="Tìm kiếm" >
                    <input type = "submit" name = "OK" value="OK">
                </form>
            </div>
        </div>
        
        <div class="upload-section">
                <button class="create-new-task-btn" >Thêm bài tập mới!</button>
                <form id="task-form" class="upload-form" enctype="multipart/form-data" action="upload.php" method="post" style="display: none;">
                    <label for="task-name">Tên bài tập:</label>
                    <input type="text" id="task-name" name="task-name">
                    <label for="task-deadline">Ngày hết hạn:</label>
                    <input type="date" id="task-deadline" name="task-deadline">
                    <input type="file" name="file-upload" id="file-upload" class="file-upload-field">
                    <input type="submit" value="Tải lên" class="upload-button">
                    <button type="button" onclick="toggleTaskForm()">Đóng</button>
                </form>
        </div>
        
    </header>


    <!-- Hiển thị danh sách bài tập -->
    <div class="exercise-list">
            <h2>Danh sách bài tập</h2>
            <ul>
                <li>
                    <span class="exercise-name">Bài tập 1:</span>
                    <span class="exercise-time">Ngày tạo: 2024-03-05</span>
                    <span class="exercise-time">Hết hạn: 2024-03-12</span>
                </li>

            </ul>
    </div>
    <script src="../js/exercise_teacher.js"></script>
    </section>
</body>
</html>