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
                    <label for="search">Tìm kiếm</label>
                    <input type="search" name="" id="search" placeholder="Tìm kiếm">
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
                    
                    <td>1</td>
                    <td>Tường Vi</td>
                    <td>Công nghệ thông tin</td>
                    <td>K56</td>
                    <td>8-10</td>
                    <td>A8.53</td>
                    <td>20/10/2023</td>
                    <td>Lập trình cơ bản </td>
                    <td>15g00</td>
                    <td>17h30</td>
                    
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
             <div class="body">
                <form action="#" id="myForm">
                    
                    <div class="form-group">
                        <label for="fullname" class="form-label">Giáo viên</label>
                        <input id="fullname" name="fullname" type="text" class="form-control">
                       
                    </div>

                    <div class="form-group">
                        <label for="faculty" class="form-label">Khoa</label>
                        <input id="faculty" name="faculty" type="text" class="form-control">
                       
                    </div>
                    
                    <div class="form-group">
                        <label for="course_id" class="form-label">Khoá học</label>
                        <input id="course_id" name="course_id" type="text" class="form-control">
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="lesson" class="form-label">Tiết học</label>
                            <div class="select-wrapper">
                                <select name="" id="table_size">
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
                        <input type="date" name="" id="date_of_birth" required>
                    </div>

                    <div class="form-group">
                        <label for="lesson_content" class="form-label">Chủ đề </label>
                        <input id="lesson_content" name="lesson_content" type="text" class="form-control">
                        
                    </div>
                </form>
                <footer class="popupFooter">
                    <button form="myForm" class="submitBtn">Submit</button>
                </footer>
             </div>

            
            </div>
        </div>
        <script src="../js/classroom _archive_admin.js"></script>
    </section>
</body>
</html>