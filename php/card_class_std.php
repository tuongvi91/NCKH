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
        <?php
        require 'connect.php';
        //xử lý hiển thị danh sách lớp học        
        $userid = $_SESSION['manguoidung'];
        if (isset($_GET['OK']) && !empty($_GET['OK']))
        {
            $key = $_GET['search'];                  
            $laythongtin = "SELECT * FROM class_details cd JOIN course c 
            ON cd.course_id = c.course_id WHERE ((cd.user_id = '".$userid."') and (course.name like '%key%' or course.course_id like '%key%'))";
            $kq = mysqli_query($conn, $laythongtin); 
        }
        else 
        {
            $laythongtin = "SELECT * FROM class_details cd JOIN course c 
            ON cd.course_id = c.course_id WHERE cd.user_id = '".$userid."'";
            $kq = mysqli_query($conn, $laythongtin); 
        }
        
        while  ($r = mysqli_fetch_array($kq)) 
        {       
    ?>
        <div class="card-container">
            <a href="exercise_std.php?id=<?php echo $r['course_id']; ?>" class="card card-1">
                <div class="card-info">
                    <div class="card-time">7:00-8:30</div>
                    <h1 class="card-title"><?php echo $r['name'] ?></h1>
                </div>
            </a>
        </div>
        <?php }?>

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