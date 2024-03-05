<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/profile_teacher.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <?php 
        require 'connect.php';
            $id = $_SESSION['manguoidung'];
            echo $id;        
            //lay để hiển thị
        $laytt="select * from users where user_id ='".$id."'";
        $kq = mysqli_query($conn, $laytt);
        if ($row = mysqli_fetch_array($kq))
        {
            $anh = $row['img'];
            $tennd =  $row['username'];     
            $hovaten = $row['fullname'];
            $ngaysinh = $row['DOB'];
            $email = $row['email'];
            $sodt = $row['phone_number'];
            $khoa = $row['faculty_id'];
        }

        //update 
        if (isset($_POST['luu']))
        {   
            $picpath = basename ($_FILES['img']['name']);
            //upload ảnh
            $des_dir = "../img/";
            $des_file = $des_dir . $picpath;
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $des_file))
            {echo "hình ảnh đã được load"; $anh = $picpath;}
            else {$des_file= $des_dir . $anh; $anh = $row['img'];}
            echo "<img src='".$des_file."' alt='chưa có ảnh' width='100' height='100' class='img'>";

            $tennd = $_POST['ten'];
            $hovaten =$_POST['hoten'];
            $ngaysinh = $_POST['DOB'];
            $email = $_POST['mail'];
            $sodt = $_POST['sdt'];
            $khoa = $_POST['khoa'];
            $time = date("Y-m-d H:i:s");

            $sqlupdate= "update users set username = '".$tennd."',email= '".$email."', phone_number = '".$sodt."', fullname= '".$hovaten."', 
                        DOB= '".$ngaysinh."',img= '".$anh."', faculty_id = '".$khoa."', update_at= '".$time."' 
                        where user_id ='".$id."'";
            if ($kq = mysqli_query($conn, $sqlupdate))
            {
                echo 
                "<script> 
                        alert('Đã lưu.');
                        window.location= 'sidebar_teacher.php';                
                </script>";	
            }
            else echo 
            "<script> 
                    alert('Đã xảy ra lỗi.');   	
                            
            </script>";	       			
        }
    ?>
    <section class="home-section">
        <div class="popup">
            <header>
                <h1 class="modalTitle">Thông tin cá nhân </h1>
            </header>

            <div class="body">
                <form action="" method ="post" enctype="multipart/form-data">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="" id="uploadimg" class="picture">
                            <img src="../img/<?php echo $anh ?>" alt="chưa có ảnh " width="150" height="150" class="img">
                            <i class="fa-solid fa-plus"></i>
                        </label>                
                    </div>

                    <div class="nameField">
                        <div class="form_control">
                            <label for="username">Tên hiển thị:</label>
                            <input type="text" name="ten" id="username" value = "<?php echo $tennd ?>" >
                        </div>

                        <div class="form_control">
                            <label for="fullname">Tên đầy đủ</label>
                            <input type="text" name="hoten" id="fullname" value = "<?php echo $hovaten ?>">
                        </div>
                        <div class="form_control">
                            <label for="faculty">Khoa</label> 
                            <?php
                                $sqlcmd = "SELECT * FROM faculty";
                                $laykhoa = mysqli_query($conn, $sqlcmd); 
                                                            
                                if ($laykhoa) {
                                    // Lặp qua các khoa
                                    echo 
                                    "<form action='' method='post'>
                                    <select name='khoa' id = 'faculty'>";
                                    while ($row = mysqli_fetch_array($laykhoa)) 
                                    {
                                        $faculty_id = $row['faculty_id'];
                                        $faculty_name = $row['faculty_name'];  
                                        if ($faculty_id = $khoa)  echo "<option value='$faculty_id' selected> $faculty_name </option>";                       
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
                            <label for="phone_number">SĐT:</label>
                            <input type="text" name="sdt" id="phone_number" value = "<?php echo $sodt ?>" required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="text" name="mail" id="email" value = "<?php echo $email ?>" required>
                        </div>

                        <div class="form_control">
                            <label for="date_of_birth">Ngày sinh:</label>
                            <input type="date" name="DOB" id="date_of_birth" value = "<?php echo $ngaysinh ?>" required>
                        </div>
                        <footer class="popupFooter">
                            <input class="submitBtn" type = "submit" name = "luu" value="Lưu">
                        </footer>
                    </div>                
                </form>
            </div>     
        </div>
    </section>
    <script src="../js/profile_teacher.js"></script>
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