<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="../css/sidebar_admin.css"> 
    <title>Sidebar</title>
</head>
<body>
    <div class="sidebar ">
        <div class="logo-details">
            <img class="item" src="../img/logo.png" alt="">
            <div class="logo_name">Study</div>
            <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="#">
            <i class="fa-solid fa-graduation-cap"></i>
                <span class="links_name"> Danh sách lớp học</span>
            </a>
            <span class="tooltip">Danh sách lớp học</span>
        </li>
        <li>
            <a href="teacher_admin.php">
            <i class="fa-solid fa-user"></i>
                <span class="links_name">Người dùng</span>
            </a>
                <span class="tooltip">Người dùng</span>
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
                <i class="fa-solid fa-clipboard-user"></i>
                <span class="links_name">Điểm danh</span>
            </a>
                <span class="tooltip">Điểm danh</span>
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
                <i class="fa-solid fa-book"></i>
                <span class="links_name">Khóa học</span>
            </a>
                <span class="tooltip">Khóa học</span>
        </li>
        <li>
            <a href="discussions.php">
                <i class="fa-solid fa-comment"></i>
                <span class="links_name">Phản hồi</span>
            </a>
                <span class="tooltip">Phản hồi</span>
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
                    <div class="name"><a href ="#"><?php if(isset($_SESSION['tennguoidung'])) echo $_SESSION['tennguoidung'] ?></a></div>
                    <div class="job">Admin</div>
                </div>
            </div>
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" id="log_out"></i></a>
        </li>
    </ul>
    </div>
    
    <script src="../js/sidebar_admin.js"></script>
</body>
</html>