<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link rel="stylesheet" href="../css/list_class_teacher.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <?php

        //get id course 
        $courseid = $_GET['id'];
        require 'connect.php';

        //lấy các người học học môn này 
        /*$arr_userid = array(); 
        if (isset($_GET['OK']) && !empty($_GET['OK']))
        {
            $key = $_GET['search'];
            $findcmd = "select*from teaching_schedule where course_id = $courseid ";
            $layMastd = mysqli_query ($conn, $findcmd);
            while ($row = mysqli_fetch_array($layMastd))
            {
                $arr_userid = $row['user_id'];
            }
        }
            else $layDS = mysqli_query($conn, "");*/
    ?>
    <section class="home-section">
    <header>
        <div class="decentralization">
            <ul class="menu">
                <li><a href="list_class_teacher.php?id=<?php echo $courseid; ?>">Danh sách lớp học</a></li>
                <li><a href="exercise_teacher.php?id=<?php echo $courseid; ?>">Bài tập</a></li>
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


        <div class="join-class">
            <a href="#">
                <button class="join-class-btn">Tham gia lớp học</button>
            </a>
        </div>

        <div class="attendance">
            <a href="#">
                <button class="attendance-btn">Điểm danh</button>
            </a>
        </div>
    </header>

    <h2>Danh sách lớp học</h2>
        <table>
            <thead>
                <tr class="heading">
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Khoa</th>
                    <th>Khóa học</th>
                    <th>Hành động</th>  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nguyễn Hà Nhân</td>
                    <td>K44E</td>
                    <td>Công nghệ thông tin</td>
                    <td>K44</td>   
                    <td>
                        <button><i class="fa-solid fa-pen"></i></button>
                        <button><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

       
        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <textarea id="noteTextarea" rows="4" cols="50"></textarea>
            <button id="saveNoteBtn">Lưu</button>
        </div>
        </div>
        <script src="../js/list_class_teacher.js"></script>
    </section>
</body>
</html>
