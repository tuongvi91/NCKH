<?php $id = $_GET['id'];?>
<!DOCTYPE html>

<html lang="en">

<body>
    <?php
        require'connect.php';
        $id = $_GET['id'];      
        $laytt="select* from users  where user_id ='".$id."'";
        $kq = mysqli_query($conn, $laytt);
        if ($row=mysqli_fetch_array($kq))
        {
            $tennd =  $row['username'];     
            $hovaten = $row['fullname'];
            if ($row['role_id']==1) $quyen = "Sinh viên";
                else if ($row['role_id']==0) $quyen = "Admin";
                else if ($row['role_id']==2) $quyen = "Giảng viên";
            $capquyen = $quyen;
            $ngaysinh = $row['DOB'];
            $email = $row['email'];
            $sodt = $row['phone_number'];
        }
    

        //update 
        if (isset($_POST['update']))
		{
            
            $anh = $_POST['img'];
            $tennd = $_POST['ten'];
            $hovaten =$_POST['hoten'];
            $capquyen = $_POST['role'];
            $ngaysinh = $_POST['ngsinh'];
            $email = $_POST['mail'];
            $sodt = $_POST['sdt'];
            $time = date("Y-m-d H:i:s");

            $sqlupdate= "update users  set username = '".$tennd."', role_id= '".$capquyen."', 
                        email= '".$email."', phone_number = '".$sodt."', fullname= '".$hovaten."', 
                        DOB= '".$ngaysinh."',img= '".$anh."', update_at= '".$time."' where user_id ='".$id."'";
            $kq = mysqli_query($conn, $sqlupdate);
            {
                echo 
                "<script> 
                        alert('Đã lưu.');
                        window.location= 'teacher_admin.php';     						
                </script>";	
            }			
        }
    ?>



    <div class="dark_bg">
        <div class="popup">
            <header>
                <h2 class="modalTitle">Điền thông tin</h2>
                <button class="closeBtn">&times;</button>
            </header>
            <div class="body">
                <form action ="" method = "POST" id="myForm">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="img" id="uploadimg" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <img src="" alt="" width="150" height="150" class="img">
                    </div>
                    
                    <div class="nameField">
                        <div class="form_control">
                            <label for="username">Tên hiển thị:</label>
                            <input type="text" name="ten" id="username" value ="<?php echo $tennd ?>" required>
                        </div>
                        <div class="form_control">
                            <label for="fullname">Tên đầy đủ:</label>
                            <input type="text" name="hoten" id="fullname" value ="<?php echo $hovaten ?>" required>
                        </div>
                    </div>

                    <div class="postSalary">
                    <div class="form_control">
                        <label for="position">Vai trò: </label>
                        <div class="entries">
                            <select name="role" id="role">
                                <option value="$row['role_id']" selected><?php echo $capquyen ?></option>
                                <option value="0">Admin</option>
                                <option value="1">Sinh viên</option>
                                <option value="2">Giảng viên</option>
                            </select>
                        </div>
                    </div>

                        <div class="form_control">
                            <label for="date_of_birth">Ngày sinh:</label>
                            <input type="date" name="ngsinh" id="date_of_birth" value ="<?php echo $ngaysinh ?>"required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="email" name="mail" id="email" value ="<?php echo $email ?>"required>
                        </div>

                        <div class="form_control">
                            <label for="phone_number">Phone:</label>
                            <input type="number" name="sdt" id="phone_number"value ="<?php echo $sodt ?>"  required>
                        </div>                    
                    </div>
                    <input type="submit" value ="LƯU" name ="update">
                </form>                    
            </div>            
            <footer class="popupFooter">
                
            </footer>
            
        </div>    
    </div>

</body>
</html>