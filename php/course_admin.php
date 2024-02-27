<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link rel="stylesheet" href="../css/course_admin.css">
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
                    <div class="card__img">
                        <img src="../img/sach1.jpg" alt="">
                    </div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category">Khoa công nghệ thông tin</span>
                            <h3 class="card__title">Nhập môn công nghệ phần mềm</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">Nguyễn Hà Nhân</a></span>
                    </div>
            </article>
  
  
            <article class="card card--2">
                    <div class="card__img">
                        <img src="../img/sach2.jpg" alt="">
                    </div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category">Khoa Sư phạm</span>
                        <h3 class="card__title">Toán cao cấp 1</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">Hồ Quang Nguyên</a></span>
                    </div>
            </article>  
        </section>
    </section>
    
</body>
</html>