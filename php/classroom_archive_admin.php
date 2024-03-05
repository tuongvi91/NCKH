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
    <?php
        require 'connect.php';
        //phân trang

        //lấy số mục:
        $limit = 20;
        //tổng số dòng dữ liệu 
        $result = mysqli_query($conn, 'select count(*) as total from lectures');
        $row = mysqli_fetch_assoc($result);                    
        $soluongtin = $row['total'];
        
        //tổng số trang 
        $sotrang = ceil($soluongtin /  $limit);
        //trang hiện tại 
        $trangchon = isset($_GET['trang']) ? $_GET['trang'] : 1;
        // số offset
        $offset = ($trangchon - 1) * 20;
        
         //tìm kiếm
        if (isset ($_POST['timkiem']))
        {
            $hocky = $_POST['hky'];
            $nienkhoa = $_POST['namhoc'];
            $key = $_POST['keyword'];

            //lọc theo học kì
            //hiện danh sách

           
        
        

    ?>
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
                        <option value="2020-2021">2020-2021</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2022-2023">2022-2023</option>
                        <option value="2023-2024">2023-2024</option>
                        <option value="2024-2025">2024-2025</option>
                        </select>
                </div>
                <div class="filter">
                    <label for="search">Tìm kiếm</label>
                    <input type="search" name="keyword" id="search" placeholder="Tìm kiếm">
                    <input type="submit" name = "timkiem" value="Tìm kiếm">                    
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
                    <th>Phòng học</th>
                    <th>Ngày dạy</th>
                    <th>Chủ đề</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Hành động</th>   
                </tr>
            </thead>

            <tbody class="userInfo">
              
               
               <tr>                
                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?></td>
                    <?php //tiết ?>
                    <td><?php echo $row['']?></td>

                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?> </td>
                    <td><?php echo $row['']?></td>
                    <td><?php echo $row['']?></td>
                    
                    <td>
                        <button><i class="fa-solid fa-eye"></i></button>
                        <button><i class="fa-solid fa-pen"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></button>
                    </td>
               </tr>
               <?php }
               {
                //  xử lý lỗi
                //echo "<tr><td class='empty' colspan='11' align='center'>Không có dữ liệu trong bảng</td></tr>";
            }?> 
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
                    if ($tiet == "1-2")
                    {   
                        $batdau = "07:00:00";
                        $ketthuc = "08:40:00";
                    } else 
                    if ($tiet == "3-5")
                    {
                        $batdau = "09:00:00";
                        $ketthuc = "11:30:00";
                    } else 
                    if ($tiet == "6-7")
                    {
                        $batdau = "13:00:00";
                        $ketthuc = "14:40:00";
                    } else 
                    if ($tiet == "8-10")
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
                   
                    <input type="submit" class= "submitBtn" value ="Submit" name ="submit">
                </footer>
                </form>
             </div>

             
            </div>
        </div>
        <script src="../js/classroom_archive_admin.js"></script>
    </section>
</body>
</html>
