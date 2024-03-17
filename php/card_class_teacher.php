<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <?php include("../php/sidebar_teacher.php"); ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .search-container {
            margin-top: 40px;
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input::placeholder {
            color: #69b4fa;
        }

        .search-input {
            padding: 8px;
            width: 300px;
            border: 1px solid #69b4fa;
            border-radius: 5px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 300px;
            background-color: #ffffff;
            border: 1px solid #69b4fa;
            border-radius: 20px;
            margin: 10px;
            text-decoration: none;
            color: #69b4fa;
            transition: box-shadow 0.3s ease;
        }

      
    </style>
</head>

<body>
    <section class="home-section">
        <form action="" method="get">
            <div class="search-container">
                <input type="search" name="search" class="search-input" placeholder="Nhập lớp cần tìm ...">
            </div>
        </form>

        <div class="add-class-button-container">
            <a href="add_class_teacher.php">
            <button class="add-class-button" id="show-add-class">Thêm lớp học</button>
            </a>
        </div>

        <?php
        require 'connect.php';
        $userid = $_SESSION['manguoidung'];

        $maLop = array();
        $ma = array();

        // Hiển thị các lớp
        $laymalop = "SELECT * FROM teaching_schedule WHERE user_id = '" . $userid . "'";
        $rs = mysqli_query($conn, $laymalop);

        while ($row = mysqli_fetch_assoc($rs)) {
            $maLop[] = $row['course_id'];
        }

        // Loại bỏ các lớp trùng lặp
        $ma = array_unique($maLop);

        foreach ($ma as $malop) {
            // Lấy các lớp có mã do giáo viên này dạy
            if (isset($_GET['OK']) && !empty($_GET['OK'])) {
                $key = $_GET['search'];
                $laythongtin = "SELECT * FROM course WHERE course_id = '" . $malop . "' AND name LIKE '%$key%'";
                $kq = mysqli_query($conn, $laythongtin);
            } else {
                $laythongtin = "SELECT * FROM course WHERE course_id = '" . $malop . "'";
                $kq = mysqli_query($conn, $laythongtin);
            }

            while ($r = mysqli_fetch_array($kq)) {
        ?>
                <div class="card-container">
                    <a href="list_class_teacher.php?id=<?php echo $r['course_id']; ?>" class="card card-1">
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
    

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.querySelector('.search-input');
                const cards = document.querySelectorAll('.card');

                searchInput.addEventListener('input', function() {
                    const searchTerm = searchInput.value.toLowerCase();

                    cards.forEach(function(card) {
                        const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
                        if (cardTitle.includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </section>



</body>

</html>
