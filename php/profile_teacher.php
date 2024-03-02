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
    <section class="home-section">
    <div class="popup">
     <header>
        <h1 class="modalTitle">Thông tin cá nhân </h1>
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
                        <input type="text" name="" id="username" >
                    </div>

                    <div class="form_control">
                        <label for="fullname">Tên đầy đủ</label>
                        <input type="text" name="" id="fullname" >
                    </div>
                    <div class="form_control">
                        <label for="faculty">Khoa</label>
                        <input type="text" name="" id="faculty" required>
                    </div>
                    <div class="form_control">
                        <label for="phone_number">SĐT:</label>
                        <input type="text" name="" id="phone_number" required>
                    </div>

                    <div class="form_control">
                        <label for="email">Email:</label>
                        <input type="text" name="" id="email" required>
                    </div>

                    <div class="form_control">
                        <label for="date_of_birth">Ngày sinh:</label>
                        <input type="date" name="" id="date_of_birth" required>
                    </div>
        </form>
     </div>

     <footer class="popupFooter">
        <button form="myForm" class="submitBtn">Lưu</button>
     </footer>
</div>

</div>

<script src="../js/profile_teacher.js"></script>
    </section>
</body>
</html>