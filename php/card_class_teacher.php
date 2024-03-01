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

        <script src="../js/card_class_teacher.js"></script>
    </section>
</body>
</html>
