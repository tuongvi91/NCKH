<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nộp bài tập</title>
    <?php
    include("../php/sidebar_std.php");
    ?>
    <link rel="stylesheet" href="../css/submit_homeworks.css">
</head>
<body>
    <?php
        require 'connect.php';
        $amid = $_GET['aid'];
        $userid = $_SESSION['manguoidung'];
    ?>
    <section class="home-section">
    <header>
        <h1>Nộp bài tập</h1>
    </header>
    <main>
        <?php
            //lấy thông tin bài tập:
            $sql = "SELECT * FROM assignments WHERE assignment_id = $amid";
            $kq = mysqli_query($conn, $sql);
            while ($r = mysqli_fetch_array($kq)) 
        {
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="assignment_title">Tiêu đề bài tập:</label>
                <input type="text" id="assignment_title" name="assignment_title" value="<?php echo $r['assignment_title']?>">
            </div>
            <div class="form-group">
                <label for="assignment_content">Nội dung bài tập:</label>
                <td><?php echo $r['assignment_content']?>
                <?php
                    //tải file về
                     $layfile = "SELECT * FROM assignments WHERE assignment_id = $amid";
                     $kq = mysqli_query($conn, $layfile);    
                    
                     while ( $row = mysqli_fetch_assoc($kq))    
                     {
                         $file_path = "../upload/".$row['file'];
                         ?>
                         <a href="<?php echo $file_path ?>" download>Tải xuống file bài tập </a>
                         <?php
                     }
                ?></td>
            </div>         
             
        <?php }?>
                     
            <div class="form-group">
                <label for="assignment_description">Mô tả bài tập:</label>
                <textarea id="assignment_description" name="assignment_description" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="assignment_file">Chọn file:</label>
                <input type="file" id="assignment_file" name="assignment_file" >
            </div>
            <input type="submit" name="submit" value="Nộp bài"> </input>
        </form>
    </main>
    </section>
    <?php 
        //nộp bài
        if (isset ($_POST['submit']))
        {
            $noidung = $_POST['assignment_description'];

            //xử lý file đính kèm
            $file = $_FILES['assignment_file'];
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
                $sqlAdd = "insert into answers (assignment_id, user_id, answer_content, answer_file, submit_at)
                values ('".$amid."', '".$userid."',  '".$noidung."', '".$new_file."', '".$time."')";

                if ($them = mysqli_query($conn, $sqlAdd))
                {
                    echo "<script> 
                    alert('Đã nộp bài tập thành công');
                    window.location = 'sidebar_std.php';
                    </script>";	
                }	
                else echo "<script> 
                alert('Đã xảy ra lỗi, vui lòng kiểm tra lại');
                windows.history.back();
                </script>";	
            }
        }
    ?>
</body>
</html>
