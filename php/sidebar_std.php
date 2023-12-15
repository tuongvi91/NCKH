<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="../css/sidebar_std.css"> 
    <title>Sidebar</title>
</head>
<body>
    <div class="sidebar ">
        <div class="logo-details">
            <img class="item" src="../img/logo.png" alt="">
            <div class="logo_name">Study</div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
    <ul class="nav-list scroll">
        <li>
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Tìm kiếm...">
            <span class="tooltip">Tìm kiếm</span>
        </li>
        <li>
            <a href="#">
            <i class="fa-solid fa-house"></i>
                <span class="links_name">Màn hình chính</span>
            </a>
                <span class="tooltip">Màn hình chính</span>
        </li>
        <li>
            <a href="#">
            <i class="fa-solid fa-graduation-cap"></i>
                <span class="links_name"> Danh sách lớp học</span>
            </a>
            <span class="tooltip">Danh sách lớp học</span>
        </li>
        <li>
            <a href="#">
                <i class="fa-regular fa-folder"></i>
                <span class="links_name">Lớp học lưu trữ</span>
            </a>
                <span class="tooltip">Lớp học lưu trữ</span>
        </li>
        <li>
            <a href="#">
                <i class="fa-regular fa-calendar"></i>
                <span class="links_name">Lịch </span>
            </a>
                <span class="tooltip">Lịch</span>
        </li>
        
        <li>
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                <span class="links_name">Cài đặt</span>
            </a>
                <span class="tooltip">Cài đặt</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <!--<img src="profile.jpg" alt="profileImg">-->
                <div class="name_job">
                    <div class="name">Tên</div>
                    <div class="job">Vai trò</div>
                </div>
            </div>
                <i class="fa-solid fa-arrow-right-from-bracket" id="log_out"></i>
        </li>
    </ul>
    </div>
    <section class="home-section">
      <div class="text"></div>
    </section>
    <script src="../js/sidebar_std.js"></script>
</body>
</html>