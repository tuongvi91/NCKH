<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập trên lớp</title>
    <link rel="stylesheet" href="../css/exercise_teacher.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>
<body>
    <?php
        require 'connect.php';
        $courseid = $_GET['id'];
        //thêm bài tập
        if (isset ($_POST['submit']))
        {
            $ten = $_POST['task-name'];
            $ngaynop = $_POST['task-deadline'];
            
            //xử lý file đính kèm
            $file = $_FILES['file-upload'];
            $size_allow = 10; //10MB
            $errors = [];
            //đổi tên 
            $filename = $file['name'];
            $filename = explode('.',$filename);
            $ext = end ($filename);
            $new_file = md5(uniqid()).'.'.$ext;

            //kiểm tra định dạng
            $allow_ext = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 
                            'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
            
            if (in_array($ext, $allow_ext))
            {
                //được phép upload 
                $size = $file['size']/1024/1024; //đổi từ byte sàng MB
                if ($size <= $size_allow)
                {
                    $upload = move_uploaded_file($file['tmp_name'], '../upload/'.$new_file);
                }
                else {
                    $errors[] = 'size_err';
                }
            }
            else 
            {
                $errors[]='ext_err';
            } 
            if (!empty($errors))
            {
                $mess = '';
                if (in_array('ext_err',$errors))
                {
                    $mess='Định dạng file không hợp lệ';
                }
                else if (in_array('size_err',$errors))
                {
                    $mess='Dung lượng file không được vượt quá '.$size_allow.'MB';
                }
                else {$mess='Bạn không thể thêm file vào thời điểm này. Vui lòng thử lại sau';}
                if (!empty($mess))
                {
                    echo "<script> 
                    alert('$mess');
                    windows.history.back();
                    </script>";	
                }
            }
            else{
                //thời gian tạo btap 
                $time = date("Y-m-d H:i:s");
                // Lưu thông tin bài tập vào cơ sở dữ liệu
                $sqlAdd = "insert into assignments (course_id, assignment_title, assignment_content, create_at, deadline )
                values ('".$courseid."', '".$ten."', '".$new_file."', '".$time."', '".$ngaynop."')";

                if ($them = mysqli_query($conn, $sqlAdd))
                {
                    echo "<script> 
                    alert('Thêm bài tập thành công');
                    windows.history.back();
                    </script>";	
                }	
                else echo "<script> 
                alert('Đã xảy ra lỗi, vui lòng kiểm tra lại');
                windows.history.back();
                </script>";	
            }
        }     
    ?>
    
    <section class="home-section">
    <header>
        <div class="decentralization">
            <ul class="menu">
                <li><a href="exercise_teacher.php?id=<?php echo $courseid; ?>">Bài tập</a></li>
                <li><a href="list_class_teacher.php">Danh sách lớp học</a></li>
            </ul>
        </div>

        <div class="filterEntries">
            <div class="filter">
                <form action="" method = "GET">                
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm" >
                    <input type = "submit" name = "OK" value="OK">
                </form>
            </div>
        </div>
        
        <div class="upload-section">
                <button class="create-new-task-btn" >Thêm bài tập mới!</button>
                <form id="task-form" class="upload-form" enctype="multipart/form-data" action="exercise_teacher.php?id=<?php echo $courseid;?>" method="post" style="display: none;">
                    <label for="task-name">Tên bài tập:</label>
                    <input type="text" id="task-name" name="task-name">
                    <label for="task-deadline">Ngày hết hạn:</label>
                    <input type="date" id="task-deadline" name="task-deadline">
                    <input type="file" name="file-upload" id="file-upload" class="file-upload-field">
                    <input type="submit" value="Tải lên" class="upload-button" name="submit">
                    <button type="button" onclick="toggleTaskForm()">Đóng</button>
                </form>
        </div>
        
    </header>
    <div class="exercise-list">
        <h2>Danh sách bài tập</h2>
    </div>
    <?php    
        //hiển thị danh sách btap
        //=-==========chưa get được id cho course và tìm kiếm======
        if (isset($_GET['OK']))
        {            
            $key = $_GET['search'];    
            $layBT = "select*from assignments where course_id = '".$courseid."' and (assignment_title like '%key%' or assignment_content like '%key%' )";    
            $kq = mysqli_query($conn, $layBT);  
        }
        else 
        {
            $layBT = "select*from assignments where course_id = '".$courseid."'";
            $kq = mysqli_query($conn, $layBT);
        }        
        while  ($r = mysqli_fetch_array($kq)) 
        {   
            
    ?>
    <!-- Hiển thị danh sách bài tập -->
    <div class="exercise-list">
            <ul>
                <li>
                    <span class="exercise-name">Tên bài tập: <?php echo $r['assignment_title']?></span>
                    <span class="exercise-time">Ngày tạo: <?php echo $r['create_at']?></span>
                    <span class="exercise-time">Hết hạn: <?php echo $r['deadline']?></span>
                </li>

            </ul>
    </div>
    <?php }?>
    <script src="../js/exercise_teacher.js"></script>
    </section>
</body>
</html>