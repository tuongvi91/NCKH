<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/card_class_std.css">
    <title>Danh sách lớp học</title>
    <?php
    include("../php/sidebar_std.php");
    ?>
</head>

<body>

    <section class="home-section">
        <form action="" method="get">
            <div class="search-container">
                <input type="search" name="search" class="search-input" placeholder="Nhập lớp cần tìm ...">
                <input type="submit" name="OK" value="OK" style="display: none" ;>
            </div>
        </form>
        <div class="add-class-button-container">
            <button class="add-class-button">Tham gia lớp học</button>
        </div>
        <div class="card-container">
            <a href="#" class="card card-1">
                <div class="card-info">
                    <div class="card-time">7:00-8:30</div>
                    <h1 class="card-title">Tư tưởng Hồ Chí Minh</h1>
                </div>
            </a>

            <a href="#" class="card card-2">
                <div class="card-info">
                    <div class="card-time">9:00-1130</div>
                    <h1 class="card-title">Mác-Lenin</h1>
                </div>
            </a>
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Nhập mã lớp học</h2>
                <input type="text" id="class-code-input" placeholder="Nhập mã lớp học...">
                <button id="submit-class-code">Xác nhận</button>
            </div>
        </div>
        <script src="../js/card_class_std.js"></script>
    </section>
</body>

</html>