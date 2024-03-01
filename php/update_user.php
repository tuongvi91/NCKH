<?php $id = $_GET['id'];?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/fill_in _information.css">
    </head>
<body>
<?php    
    $conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
    mysqli_query($conn,"SET NAMES 'utf8'");
    //lay để hiển thị
    $laytt="select* from users  where user_id ='".$id."'";
    $kq = mysqli_query($conn, $laytt);

    if ($row = mysqli_fetch_array($kq))
    {
        $anh = $row['img'];
        $tennd =  $row['username'];     
        $hovaten = $row['fullname'];
        if ($row['role_id']==1) $quyen = "Người học";
            else if ($row['role_id']==0) $quyen = "Admin";
            else if ($row['role_id']==2) $quyen = "Người dạy";
        $capquyen = $quyen;
        $ngaysinh = $row['DOB'];
        $email = $row['email'];
        $sodt = $row['phone_number'];
    }

    //update 
    if (isset($_POST['update']))
    {   
        $picpath = basename ($_FILES['img']['name']);
        //upload ảnh
        $des_dir = "../img/";
        $des_file = $des_dir . $picpath;
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $des_file))
        {echo "hình ảnh đã được load"; $anh = $picpath;}
        else {$des_file= $des_dir . $anh; $anh = $row['img'];}
        echo "<img src='".$des_file."' alt='chưa có ảnh' width='100' height='100' class='img'>";
        $id = $_GET['id']; 
       
        $tennd = $_POST['ten'];
        $hovaten =$_POST['hoten'];
        $capquyen = $_POST['role'];
        $ngaysinh = $_POST['DOB'];
        $email = $_POST['mail'];
        $sodt = $_POST['sdt'];
        $time = date("Y-m-d H:i:s");

        $sqlupdate= "update users  set username = '".$tennd."', role_id= '".$capquyen."', 
                    email= '".$email."', phone_number = '".$sodt."', fullname= '".$hovaten."', 
                    DOB= '".$ngaysinh."',img= '".$anh."', update_at= '".$time."' where user_id ='".$id."'";
        if ($kq = mysqli_query($conn, $sqlupdate))
        {
            echo 
            "<script> 
                    alert('Đã lưu.');
                    window.location= 'teacher_admin.php'						
            </script>";	
        }
        else echo 
        "<script> 
                alert('Đã xảy ra lỗi.');   	
                window.history.back();				
        </script>";	
       			
    }
?>
<section class="home-section">
    <div class="dark_bg">
        <div class="popup">
            <header>
                <h1 class="modalTitle">Cập nhật thông tin người dùng </h1>
            </header>
            <div class="body">
                <form action="" method = "POST" enctype="multipart/form-data">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="img" id="img" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>       
                        <div class="preview-img-container">
                            <img src="../img/<?php echo $anh ?>" id="preview-img" width="200px" />
                        </div>         
                    </div>
                    <div class="nameField">
                        <div class="form_control">
                            <label for="username">Tên hiển thị:</label>
                            <input type="text" name="ten" id="username" value = "<?php echo $tennd ?>" required>
                        </div>

                        <div class="form_control">
                            <label for="fullname">Tên đầy đủ</label>
                            <input type="text" name="hoten" id="fullname" value = "<?php echo $hovaten ?>" required>
                        </div>   
                    
                        <div class="form_control">
                            <label for="role">Vai trò:</label>
                            <select id="role" name="role">
                                <?php if ($row['role_id']==2) echo "
                                <option value='2' selected>Người dạy</option>
                                <option value='1'>Người học</option>";
                                else if ($row['role_id']==1) echo "
                                <option value='2' >Người dạy</option>
                                <option value='1'selected>Người học</option>";
                                ?>
                            </select>
                        </div>
                        <div class="form_control">
                            <label for="phone_number">SĐT:</label>
                            <input type="text" name="sdt" id="phone_number" value = "<?php echo $sodt ?>" required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="text" name="mail" id="email" value = "<?php echo $email ?>"required>
                        </div>

                        <div class="form_control">
                            <label for="date_of_birth">Ngày sinh:</label>
                            <input type="date" name="DOB" id="date_of_birth" value = "<?php echo $ngaysinh ?>"required>
                        </div>
                            
                        <footer class="popupFooter">
                            <input class="submitBtn" type = "submit" name = "update" value="Lưu">
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