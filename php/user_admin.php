<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Người dùng </title>
    <link rel="stylesheet" href="../css/user_admin.css">
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
                    <th>ID</th>
                    <th>Img</th>
                    <th>Tên hiển thị</th>
                    <th>Vai trò</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Họ tên </th>
                    <th>Ngày sinh </th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian sửa</th>
                    <th>Hành động</th>   
                </tr>
            </thead>

            <tbody class="userInfo">
               <tr><td class="empty" colspan="11" align="center">Không có dữ liệu trong bảng</td></tr>
               <tr>
                    <td>1</td>
                    <td><img src="../img/mp3.jpg" alt="" width="40" height="40"></td>
                    <td>Mp3</td>
                    <td>Quản trị viên</td>
                    <td>mp3@gmail.com</td>
                    <td>012346789</td>
                    <td>Mbappe</td>
                    <td>20/12/1998</td>
                    <td>16h00</td>
                    <td>16h50</td>
                    <td>
                        <button><i class="fa-solid fa-eye"></i></button>
                        <button><i class="fa-solid fa-pen"></i></button>
                        <button><i class="fa-solid fa-trash-can"></i></button>
                    </td>
               </tr>
               
            </tbody>
    </table>
    <footer>
            <span class="showEntries">Hiển thị 1 đến 10 trong 50 mục</span>
            <div class="pagination">
                <button>Trước</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>Tiếp theo</button>
            </div>
        </footer>
</div>
<!-- Popup Form -->
<div class="dark_bg">
    <div class="popup">
            <header>
                <h2 class="modalTitle">Điền thông tin</h2>
                <button class="closeBtn">&times;</button>
             </header>
             <div class="body">
                <form action="#" id="myForm">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="" id="uploadimg" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <img src="" alt="" width="150" height="150" class="img">
                    </div>
                    
                    <div class="nameField">
                            <div class="form_control">
                                <label for="username">Tên hiển thị:</label>
                                <input type="text" name="" id="username" required>
                            </div>

                            <div class="form_control">
                                <label for="fullname">Tên đầy đủ:</label>
                                <input type="text" name="" id="fullname" required>
                            </div>
                        </div>

                        <div class="postSalary">
                            <div class="form_control">
                                <label for="position">Vai trò: </label>
                                <input type="text" name="" id="position" required>
                            </div>

                            <div class="form_control">
                                <label for="date_of_birth">Ngày sinh:</label>
                                <input type="date" name="" id="date_of_birth" required>
                            </div>

                            <div class="form_control">
                                <label for="email">Email:</label>
                                <input type="email" name="" id="email" required>
                            </div>

                        <div class="form_control">
                            <label for="phone_number">Phone:</label>
                            <input type="number" name="" id="phone_number" required>
                        </div>
                            
                        </div>

                        
                    </div>
                </form>

                <footer class="popupFooter">
                    <button form="myForm" class="submitBtn">Submit</button>
                </footer>
             </div>

            
    </div>
</div>
<script src="../js/user_admin.js"></script>
</section>
</body>
</html>