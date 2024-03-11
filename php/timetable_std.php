<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời khóa biểu sinh viên</title>
    <link rel="stylesheet" href="../css/timetable_std.css">
    <?php
    include("../php/sidebar_std.php");
    ?>
</head>

<body>
    <section class="home-section">
        <div class="scheduler">
            <h3>Thời khóa biểu sinh viên</h3>

            <div class="options">
                <label for="year">Năm học:</label>
                <select name="cboNamHocLoc" class="form-control" id="cboNamHocLoc" style="margin: 5px 0;">
                    <option value="">--Chọn năm học--</option>
                    <?php
                    $date = getdate();
                    $nammoi = $date['year'] + 2;
                    $namcu = $date['year'] - 3;
                    while ($namcu < $nammoi) {
                        $nam1 = ($namcu) . "-" . ($namcu + 1);
                        echo "<option value='$nam1'>$nam1</option>";
                        $namcu++;
                    }
                    ?>
                </select>

                <label for="semester">Học kỳ:</label>
                <select name="semester" id="semester">
                    <option value="1">Học kỳ 1</option>
                    <option value="2">Học kỳ 2</option>
                    <option value="3">Học kỳ 3</option>
                </select>

                <label for="week">Tuần học:</label>
                <select name="week" id="week">
                    <?php
                    $numWeeks = 10;

                    for ($i = 1; $i <= $numWeeks; $i++) {
                        echo '<option value="' . $i . '">Tuần ' . $i . '</option>';
                    }
                    ?>
                </select>

               
                <input type="text" id="subject" name="subject" placeholder="Nhập tên môn học">

                <button id="addSubjectButton">Thêm môn học</button>



            </div>
            <div class="week-scheduler">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7:00 - 8:40</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9:00-11:30</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>13:00-14:40</td>
                            <td>
                                <div class="lesson_content">Nguyên lí hệ điều hành</div>
                                <div class="room">A2.03</div>
                                 <div class="username">Lê Đình Luyện</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>15:00-17:30</td>
                            <td></td>
                            <td>
                                <div class="lesson_content">Lập trình cơ bản</div>
                                <div class="room">A8.51</div>
                                 <div class="username">Phan Đình Sinh</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="print-button-container">
                <button id="printButton">In thời khóa biểu</button>
            </div>

        </div>


        </div>


        <script src="../js/timetable_std.js"></script>
    </section>
</body>

</html>
