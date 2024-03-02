<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lớp học lưu trữ</title>
    <link rel="stylesheet" href="../css/classroom _archive_admin.css">
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>
<body>
    <section class="home-section">
        <div class="container">
        <header>
            <div class="filterEntries">
                <div class="entries">
                    Hiển thị <select name="" id="table_size">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                            </select> mục
                </div>
                <div class="entries">
                    Học kì <select name="" id="table_size">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                            </select>
                </div>
                <div class="entries">
                    Năm học<select name="" id="table_size">
                        <option value="1">2020-2021</option>
                        <option value="2">2021-2022</option>
                        <option value="3">2022-2023</option>
                        <option value="4">2023-2024</option>
                        <option value="5">2024-2025</option>
                            </select>
                </div>
                <div class="filter">
                <form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <label for="search">Tìm kiếm</label>
                    <input type="search" name="keyword" id="search" placeholder="Tìm kiếm">
                    <input type="submit" value="Tìm kiếm">
                </form>                    
                </div>
            </div>
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
                    <th>Phòng học</th>
                    <th>Ngày dạy</th>
                    <th>Chủ đề</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Hành động</th>   
                </tr>
            </thead>

            <tbody class="userInfo">
               <tr><td class="empty" colspan="11" align="center">Không có dữ liệu trong bảng</td></tr>
               <tr>
                    <?php
                    "<td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>
                    <td><?php echo $?> </td>
                    <td><?php echo $?></td>
                    <td><?php echo $?></td>"
                    ?>
                    <td>
                        <button><i class="fa-solid fa-eye"></i></button>
                        <button><i class="fa-solid fa-pen"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></button>
                    </td>
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
             <?php
                if (isset($_POST['submit']))
                {
                    $conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
                    $ten = $_POST['fullname'];
                    $khoa = $_POST['faculty'];
                    $khoahoc = $_POST['course_id'];
                    $tiet = $_POST['time'];
                    $phong = $_POST['room'];
                    $ngay = $_POST['date'];
                    $chude =$_POST['lesson_content'];
                    if ($tiet == "1")
                    {   
                        $batdau = "07:00:00";
                        $ketthuc = "08:40:00";
                    } else 
                    if ($tiet == "2")
                    {
                        $batdau = "09:00:00";
                        $ketthuc = "11:30:00";
                    } else 
                    if ($tiet == "3")
                    {
                        $batdau = "13:00:00";
                        $ketthuc = "14:40:00";
                    } else 
                    if ($tiet == "4")
                    {
                        $batdau = "15:00:00";
                        $ketthuc = "17:30:00";
                    }
                    $realbd = $batdau;
                    $realkt = $ketthuc;
                    $realphong = $phong;
                    $sqlTimTen = "SELECT*FROM users WHERE fullname = '".$ten."'";
                    $result = mysqli_query($conn, $sqlTimTen);
			        if ($row = (mysqli_fetch_array($result))) 
			        {
                        $id = $row['user_id'];
                        echo $id."++++++";
                    
                    $sqlcmd= "insert into teaching_schedule (user_id , course_id, start_time, end_time, room, lesson_content) 
                    values ('".$id."', '".$khoahoc."', '".$batdau."',  '".$ketthuc."',  '".$phong."', '".$chude."')";
                    if ($rs = mysqli_query($conn, $sqlcmd))
                    {
                        echo "<script> 
                            alert('Thêm thành công');
                            window.history.back();
                            </script>";	
                    }}
                    else echo "<script> 
                        alert('Không có tên này');
                        window.history.back();
                        </script>";	
                }
                
             ?>
             <div class="body">
                <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    
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
                                    <option value="1">1-2</option>
                                    <option value="2">3-5</option>
                                    <option value="3">6-7</option>
                                    <option value="4">8-10</option>
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
                   
                    <input type="submit" class= "submitBtn" value ="Submit" name ="submit">
                </footer>
                </form>
             </div>

             
            </div>
        </div>
        <script src="../js/classroom _archive_admin.js"></script>
    </section>
    <?php
        //xu ly tim kiem
        $keyword = $_GET['keyword'];
        require 'connect.php';
        $sql = "SELECT * FROM teaching_schedule WHERE user_id = $keyword";
        $rs = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($rs))
        {


        }
    ?>
</body>
</html>
