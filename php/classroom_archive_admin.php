<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link rel="stylesheet" href="../css/classroom_archive_admin.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>

<body>
    <section class="home-section">
        <div class="container">
            <header>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="filterEntries">
                        <div class="entries">
                            Học kì <select name="hky" id="table_size">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="entries">
                            Năm học<select name="namhoc" id="table_size">
                                <?php
                                $current_year = date('Y');
                                for ($year = $current_year; $year <= $current_year + 5; $year++) {
                                    $next_year = $year + 1;
                                    echo "<option value=\"$year-$next_year\">$year-$next_year</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="filter">
                            <label for="search">Tìm kiếm</label>
                            <input type="search" name="keyword" id="search" placeholder="Tìm kiếm">
                            <input type="submit" name="timkiem" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
                <div class="addMemberBtn">
                    <button>Thêm mới </button>
                </div>
            </header>
            <table>
                <thead>
                    <tr class="heading">
                        <th>Mã giáo viên</th>
                        <th>Giáo viên</th>
                        <th>Khoa</th>
                        <th>Khóa học</th>
                        <th>Tiết học</th>
                        <th>Ngày dạy</th>
                        <th>Phòng học</th>
                        <th>Chủ đề</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody class="userInfo">
                    <tr>
                        <?php
                        require 'connect.php';

                        $query = "SELECT * FROM teaching_schedule";

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";

                                echo "<td>" . $row['user_id'] . "</td>";

                                $query_user = "SELECT * FROM users WHERE user_id = " . $row['user_id'];
                                $result_user = mysqli_query($conn, $query_user);
                                $user_info = mysqli_fetch_assoc($result_user);

                                echo "<td>" . $user_info['fullname'] . "</td>";

                                $query_faculty = "SELECT faculty_name FROM faculty WHERE faculty_id = '" . $user_info['faculty_id'] . "'";
                                $result_faculty = mysqli_query($conn, $query_faculty);
                                $faculty_info = mysqli_fetch_assoc($result_faculty);

                                echo "<td>" . $faculty_info['faculty_name'] . "</td>";


                                $query_batch = "SELECT batch_name FROM batch WHERE batch_id = '" . $user_info['batch_id'] . "'";
                                $result_batch = mysqli_query($conn, $query_batch);
                                $batch_info = mysqli_fetch_assoc($result_batch);

                                echo "<td>" . $batch_info['batch_name'] . "</td>";

                                $start_time =  substr((string)$row['start_time'], 11, 14);
                                $end_time =  substr((string)$row['end_time'], 11, 14);
                                $tiet_hoc = "";

                                if (str_contains($start_time, "07:00")) {
                                    $tiet_hoc = "1-2";
                                } else if (str_contains($start_time, "09:00")) {
                                    if (str_contains($end_time, "11:30")) {
                                        $tiet_hoc = "3-4-5";
                                    } else {
                                        $tiet_hoc = "3-4";
                                    }
                                }

                                echo "<td>" . $tiet_hoc . "</td>";
                                echo "<td>" . substr($row['start_time'], 0, 11) . "</td>";
                                echo "<td>" . $row['room'] . "</td>";

                                $query_lectures = "SELECT * FROM lectures WHERE schedule_id = '" . $row['schedule_id'] . "'";
                                $result_lectures = mysqli_query($conn, $query_lectures);
                                $lectures_info = mysqli_fetch_assoc($result_lectures);

                                echo "<td>" . $lectures_info['lecture_content'] . "</td>";
                                echo "<td>" . substr($start_time, 0, 5) . "</td>";
                                echo "<td>" . substr($end_time, 0, 5) . "</td>";
                                echo "<td>
                                        <button><i class='fa-solid fa-eye'></i></button>
                                        <button><i class='fa-solid fa-pen'></i></button>
                                        <button><i class='fa-solid fa-trash-can'></i></button>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='empty' align='center'>Không có dữ liệu trong bảng</td></tr>";
                        }
                        ?>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dark_bg">
            <div class="popup">
                <header>
                    <h2 class="modalTitle">Điền thông tin</h2>
                    <button class="closeBtn">&times;</button>
                </header>

                <div class="body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <div class="form-group">
                            <label for="fullname" class="form-label">Giáo viên</label>
                            <input id="fullname" name="fullname" type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="faculty" class="form-label">Khoa</label>
                            <input id="faculty" name="faculty" type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="batch" class="form-label">Khoá học</label>
                            <input id="batch" name="batch" type="text" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="lesson" class="form-label">Tiết học</label>
                            <div class="select-wrapper">
                                <select name="time" id="table_size">
                                    <option value="1-2">1-2</option>
                                    <option value="3-5">3-5</option>
                                    <option value="6-7">6-7</option>
                                    <option value="8-10">8-10</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="room" class="form-label">Phòng học </label>
                            <input id="room" name="room" type="text" class="form-control">
                            <span class="form-message">Chú ý khi xếp phòng</span>
                        </div>

                        <div class="form-group">
                            <label for="teaching_day" class="form-label">Ngày dạy </label>
                            <input type="date" name="date" id="date_of_birth" required>
                        </div>

                        <div class="form-group">
                            <label for="lesson_content" class="form-label">Chủ đề </label>
                            <input id="lesson_content" name="lesson_content" type="text" class="form-control">

                        </div>

                        <footer class="popupFooter">

                            <input type="submit" class="submitBtn" value="Submit" name="submit">
                        </footer>
                    </form>
                </div>


            </div>
        </div>
        <script src="../js/classroom_archive_admin.js"></script>
    </section>
</body>

</html>
