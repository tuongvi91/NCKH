<?php 
    require 'connect.php';
    $courseid = $_GET['id'];
    $userid = $_GET['ma'];
    if(isset($_POST['luu']))
    {
        
        $note = $_POST['note'];
        $save = "UPDATE class_details SET note = '".$note."' WHERE (user_id = '".$userid."' and course_id = '".$courseid."')";
        if ($kq = mysqli_query($conn, $save))
    {

        echo 
        "<script> 
                alert('Đã lưu.');
                window.location.replace('list_class_teacher.php?id=" .$courseid."');						
        </script>";	
    }
    else echo 
    "<script> 
            alert('Đã xảy ra lỗi.');   	
            location.history.back();			
    </script>";	}
?>
 <section>
 <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="" method = "post">
            <span class="close">&times;</span>
            <textarea id="noteTextarea" name = "note" rows="4" cols="50"></textarea>
            <input type="submit" id="saveNoteBtn" name="luu" value = "Lưu"></input>
            </form>
        </div>
        </div></section>
<script src="../js/list_class_teacher.js"></script>