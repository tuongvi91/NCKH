<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
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
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
    <ul class="nav-list scroll">
      
        <li>
            <a href="card_class_std.php">
            <i class="fa-solid fa-graduation-cap"></i>
                <span class="links_name"> Danh sách lớp học</span>
            </a>
            <span class="tooltip">Danh sách lớp học</span>
        </li>
     
        <li>
           <a href="timetable_std.php">
                <i class="fa-regular fa-calendar"></i>
                <span class="links_name">Lịch </span>
            </a>
                <span class="tooltip">Lịch</span>
        </li>
        <li>
            <a href="profile_std.php">
            <i class="fa-solid fa-user"></i>
                <span class="links_name">Thông tin cá nhân</span>
            </a>
                <span class="tooltip">Thông tin cá nhân</span>
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
                    <div class="job">Sinh viên</div>
                </div>
            </div>
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" id="log_out"></i></a>
        </li>
    </ul>
    </div>
    
    <script src="../js/sidebar_std.js"></script>
</body>
</html>
