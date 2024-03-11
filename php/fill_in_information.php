<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fill_in _information.css">
    <title>Điền thông tin</title>
    <?php
    include("../php/sidebar_admin.php");
    ?>
</head>
<body>
    <?php 
        require 'connect.php';
        if (isset ($_POST['submit']))
        {
            $picpath = basename ($_FILES['img']['name']);
            //upload ảnh
            $des_dir = "../img/";
            $des_file = $des_dir . $picpath;
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $des_file))
            echo "hình ảnh đã được load";
            else echo "không load được ảnh";    
            echo "<img src='".$des_file."' alt='chưa có ảnh' width='100' height='100' class='img'>";
            $tennd = $_POST['ten'];
            $hovaten = $_POST['hoten'];
            $quyen = $_POST['role'];            
            $ngaysinh = $_POST['DOB'];
            $email = $_POST['mail'];
            $sodt = $_POST['sdt'];   
            $khoa = $_POST['khoa'];  
            $khoahoc = $_POST['khoahoc'];        
            $sqlAdd = "insert into users (username, role_id, email, phone_number, fullname, DOB, img, faculty_id, batch_id) values ('".$tennd."', '".$quyen."', '".$email."', '".$sodt."', '".$hovaten."', '".$ngaysinh."','".$picpath."','".$khoa."','".$khoahoc."' )";
            if ($them = mysqli_query($conn, $sqlAdd))
            {
                echo "<script> 
                alert('Thêm thành công');
                window.location= 'teacher_admin.php';
                </script>";	
            }	
            else {
                echo "<script> 
                alert('Đã xảy ra lỗi');               
                </script>";	
            }        
        }
    ?>   

<section class="home-section">
    <div class="dark_bg">
        <div class="popup">
            <header>
                <h1 class="modalTitle">Thêm người dùng </h1>
            </header>
            <div class="body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype="multipart/form-data">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="img" id="img" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>       
                        <div class="preview-img-container">
                            <img src="../img/default-image_600.png" id="preview-img" width="200px" />
                        </div>         
                    </div>
                    <div class="nameField">
                        <div class="form_control">
                            <label for="username">Tên hiển thị:</label>
                            <input type="text" name="ten" id="username" required>
                        </div>

                        <div class="form_control">
                            <label for="fullname">Tên đầy đủ</label>
                            <input type="text" name="hoten" id="fullname" required>
                        </div>   
                    
                        <div class="form_control">
                            <label for="role">Vai trò:</label>
                            <select id="role" name="role">
                                 <option value="2">Giảng viên</option>
                                 <option value="1">Sinh viên</option>
                            </select>
                        </div>
                        <div class="form_control">
                            <label for="phone_number">SĐT:</label>
                            <input type="text" name="sdt" id="phone_number" required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="text" name="mail" id="email" required>
                        </div>

                        <div class="form_control">
                            <label for="date_of_birth">Ngày sinh:</label>
                            <input type="date" name="DOB" id="date_of_birth" required>
                        </div>

                        <div class="form_control">
                        <?php
                            $sqlcmd = "SELECT * FROM faculty";
                            $laykhoa = mysqli_query($conn, $sqlcmd);                            
                            if ($laykhoa) {
                                // Lặp qua các khoa
                                echo 
                                "<form action='' method='post'>
                                <b>Khoa:</b> 
                                <select name='khoa'>";
                                while ($row = mysqli_fetch_array($laykhoa)) 
                                {
                                    $faculty_id = $row['faculty_id'];
                                    $faculty_name = $row['faculty_name'];                            
                                    // Viết option cho khoa
                                    echo "<option value='$faculty_id'> $faculty_name </option>";
                                }
                                echo "</select>
                                </form>";
                            } else {
                                echo "Lỗi truy vấn: " . mysqli_error($conn);
                            }
                        ?> 
                         </div>   
                         <div class="form_control">
                            <label for="khoahoc">Khóa học:</label>
                            <div>(VD: 43, 44,..) </div>
                            <input type="text" name="khoahoc" id="khoahoc" required>
                        </div>
                        <footer class="popupFooter">
                            <input class="submitBtn" type = "submit" name = "submit" value="Submit">
                        </footer>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
    const reader = new FileReader();
    const fileInput = document.getElementById("img");
    const img = document.getElementById("preview-img");
    reader.onload = e => {
      img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
      const f = e.target.files[0];
      reader.readAsDataURL(f);
    })
  </script>
</body>
</html>
