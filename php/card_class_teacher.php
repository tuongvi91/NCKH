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
    <form action="" method = "get">
        <div class="search-container">
            <input type="search" name ="search" class="search-input" placeholder="Nhập lớp cần tìm ...">
            <input type = "submit" name = "OK" value="OK" style="display: none";>
        </div>        
    </form>       
         <div class="add-class-button-container">
            <button class="add-class-button">Thêm lớp học</button>
        </div>
    <?php
        require 'connect.php';
        $userid = $_SESSION['manguoidung'];
        
        $maLop = array(); 
        $ma = array();
        //hiển thị các lớp
        $laymalop = "select*from teaching_schedule where user_id = '".$userid."' ";
        $rs= mysqli_query($conn, $laymalop);
        while ($row= mysqli_fetch_assoc($rs))
        {
            $maLop[] = $row['course_id'];
        }
        //loại bỏ các lớp trùng lặp
        $ma = array_map(function($item) use (&$ma) {
            if (!in_array($item, $ma)) {
                $ma[] = $item;
                return $item;
            }
        }, $maLop);
        
        foreach ($ma as $malop)
        {
        //lấy các lớp có mã do gvien này dạy
        if (isset($_GET['OK']) && !empty($_GET['OK']))
        {
            $key = $_GET['search'];    
            $laythongtin = "select*from course where course_id = '".$malop."' and name like '%key%'";
            $kq = mysqli_query($conn, $laythongtin);            
        }
        else 
        {
            $laythongtin = "select*from course where course_id = '".$malop."'";
            $kq = mysqli_query($conn, $laythongtin);
        }
        while  ($r = mysqli_fetch_array($kq)) 
        {          

    ?>
    <section class="home-section">        
        <div class="card-container">
            <a href="#" class="card card-1">
                <div class="card-info">
                    <div class="card-time"><?php echo $r['start_time'] ?></div>
                    <h1 class="card-title"><?php echo $r['name'] ?></h1>
                </div>
            </a>
        </div>
    <?php 
        }
    }
    ?>
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
