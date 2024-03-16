<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link rel="stylesheet" href="../css/class_details_admin.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>

<body>
    <section class="home-section">
        <header>
            <h1>Danh sách lớp học</h1>
        </header>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Tìm kiếm...">
        </div>


        <section class="teachers">
            <h2>Giảng viên:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã giảng viên</th>
                        <th>Tên giảng viên</th>
                        <th>Khoa</th>
                        <th>Mã học phần </th>
                        <th>Tên học phần</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>GV001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Khoa CNTT</td>
                        <td>112</td>
                        <td>Lập trình web</td>
                    </tr>

                </tbody>
            </table>
        </section>


        <section class="students">
            <h2>Danh sách sinh viên:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Khoa</th>
                        <th>Khóa</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>SV001</td>
                        <td>Nguyễn Thị B</td>
                        <td>Khoa Kinh tế</td>
                        <td>K48</td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>Minh</td>
                        <td>Khoa Kinh tế</td>
                        <td>K48</td>
                    </tr> <tr>
                        <td>04</td>
                        <td>Hà</td>
                        <td>Khoa Kinh tế</td>
                        <td>K48</td>
                    </tr> <tr>
                        <td>02</td>
                        <td>Đức</td>
                        <td>Khoa Kinh tế</td>
                        <td>K48</td>
                    </tr>

                </tbody>
            </table>
        </section>
        <script src="../js/class_details_admin.js"></script>

    </section>

</body>

</html>