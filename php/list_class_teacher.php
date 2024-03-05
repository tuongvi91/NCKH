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
    <section class="home-section">
    <header>
        <div class="decentralization">
            <ul class="menu">
                <li><a href="#">Bài tập</a></li>
                <li><a href="#">Danh sách lớp học</a></li>
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