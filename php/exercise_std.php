<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exercise_std.css">
    <title>Bài tập</title>
    <?php
    include("../php/sidebar_std.php");
    ?>
</head>

<body>
    <?php 
        require 'connect.php';
        $courseid = $_GET['id']; 
    ?>
    <section class="home-section">
        <header>

            <nav>
                <ul>
                    <li><a href="attendance_std.php">Điểm danh</a></li>
                    <li><a href="exercise_std.php?id=<?php echo $courseid?>">Bài tập</a></li>
                </ul>
            </nav>
        </header>

        <main>
        <h2>Bài tập</h2>
        <?php
            //hiển thị bài tập: 
            $layBT = "SELECT* FROM users u
            INNER JOIN teaching_schedule c ON u.user_id = c.user_id
            INNER JOIN assignments a ON c.course_id = a.course_id
            WHERE c.course_id = $courseid";
            $kq = mysqli_query($conn, $layBT);
            while  ($r = mysqli_fetch_array($kq)) 
            {   
        ?>
            <section id="bai-tap">
                <div class="bai-tap-item">
                    <a href="submit_homeworks.php?aid=<?php echo $r['assignment_id']?>">
                        <h3>Tên bài tập: <?php echo $r['assignment_title'] ?></h3>
                    </a>
                    <p>Nội dung: <?php echo $r['assignment_content'] ?></p>
                    <p>Người dạy: <?php echo $r['fullname'] ?></p>
                    <p>Ngày hết hạn: <?php echo $r['deadline'] ?></p>
                    <p>Ngày tạo: <?php echo $r['create_at'] ?></p>
                </div>      
                        
            </section>
            <?php }?>
        </main>

    </section>
</body>

</html>