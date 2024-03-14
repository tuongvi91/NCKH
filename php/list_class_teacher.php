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
                <form action="" method = "post">                
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm" >
                    <input type ="submit" name = "OK" value="OK" >
                </form>
            </div>
        </div>


        <div class="join-class">
            <a href="#">
                <button class="join-class-btn">Tham gia lớp học</button>
            </a>
        </div>

        <div class="attendance">
            <a href="createQRcode.php">
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
        <?php         
            if (isset($_POST['OK']) && !empty($_POST['OK']))
            {   
                $key = $_POST['search'];                  
                $laythongtin ="SELECT *  FROM users u
                INNER JOIN class_details cd ON u.user_id = cd.user_id
                WHERE ((u.username LIKE '%$key%' or u.user_id LIKE '%$key%' or u.fullname LIKE '%$key%' )
                AND cd.course_id = '".$courseid."')";
            } 
            else 
            {
                $laythongtin ="SELECT * FROM users, class_details 
                where (users.user_id = class_details.user_id and 
                class_details.course_id = '".$courseid."' )";
            }
            $kq = mysqli_query($conn, $laythongtin);
            while  ($r = mysqli_fetch_array($kq)) 
            {                 
        ?> 
            <tr>
                <td><?php echo $r["fullname"] ?></td>
                <td><?php echo $r["class"] ?></td>
                <td><?php echo $r["faculty_id"] ?></td> 
                <td><?php echo $r["batch_id"] ?></td>   
                <td>     
                    <a href="add_note.php?ma=<?php echo $r["user_id"] ?>&id=<?php echo $courseid?>"><button><i class="fa-solid fa-pen"></i></button></a>
                    <a href="delete_std.php?ma=<?php echo $r["user_id"] ?>&id=<?php echo $courseid?>"><button><i class="fa-solid fa-trash"></i></button></a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>            
    
        <script src="../js/list_class_teacher.js"></script>
    </section>
</body>
</html>
