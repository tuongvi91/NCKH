<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link rel="stylesheet" href="../css/attendance_admin.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>

<body>
    <section class="home-section">

        <header>


            <div class="filterEntries">
                <div class="filter">
                    <label for="search">Tìm kiếm</label>
                    <input type="search" name="" id="search" placeholder="Tìm kiếm">
                </div>
            </div>


        </header>
        <section class="cards">
            <article class="card card--1">

                <div class="card__info">
                    <span class="card__category">Khoa công nghệ thông tin</span>
                    <a href="#" class="card_link">
                        <h3 class="card__title">Nhập môn công nghệ phần mềm</h3>
                    </a>
                    <span class="card__by">by <a href="#" class="card__author" title="author">Nguyễn Hà Nhân</a></span>
                </div>
                
            </article>


            <article class="card card--2">

                <div class="card__info">
                    <span class="card__category">Khoa công nghệ thông tin</span>
                    <a href="#" class="card_link">
                        <h3 class="card__title">Kỹ năng giao tiếp</h3>
                    </a>
                    <span class="card__by">by <a href="#" class="card__author" title="author">Hồ Quang Nguyên</a></span>
                </div>
                
            </article>
            


          
        </section>
        <script src="../js/attendance_admin.js"></script>
    </section>

</body>

</html>
