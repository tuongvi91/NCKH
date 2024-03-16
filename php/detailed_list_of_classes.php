<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết lớp học</title>
    <link rel="stylesheet" href="../css/detailed_list_of_classes.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>

<body>
    <section class="home-section">
        <div class="header">
            <h1>Quản lý điểm danh</h1>
            <div class="search-container">
                <input type="text" placeholder="Tìm kiếm...">
                <button type="submit">Tìm</button>
            </div>
        </div>
        <div class="fluid-container">
            <h1>Thông tin điểm danh</h1>

            <!-- 
                Lấy bảng mà giảng viên thêm thời khóa biểu
                viết lệnh ssql count của bảng thời khóa biểu môn học đó
                Thay thế 16 (dòng 38 và dòng 46) bằng cái count vừa tính
                viết lệnh sql load thời khóa biểu giảng viên của môn học đó lên
                Thay thế echo "<th>Ngày " . $i . "</th>" bằng cái ngày môn học dó
             -->
            <table>
                <tr>
                    <th rowspan="3">Stt</th>
                    <th rowspan="3">Tên sinh viên</th>
                    <th rowspan="3">Lớp</th>
                    <th rowspan="3">Khóa</th>
                    <?php
                    for ($i = 1; $i < 16; $i++) {
                        echo "<th>Buổi " . $i . "</th>";
                    }
                    ?>
                </tr>

                <tr>
                    <?php
                    for ($i = 1; $i < 16; $i++) {
                        echo "<th>Ngày " . $i . "</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    for ($i = 1; $i < 16; $i++) {
                        echo "<th><button> Điểm danh " . $i . "</button></th>";
                    }
                    ?>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Hồ Quang Nguyên</td>
                    <td>Lớp A</td>
                    <td>2024</td>
                    <?php
                    for ($i = 1; $i < 16; $i++) {
                        echo "<td><input type='checkbox' checked></td>";
                    }
                    ?>

                </tr>
            </table>
        </div>

    </section>

</body>

</html>