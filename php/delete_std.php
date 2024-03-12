<?php
    require_once('connect.php');
    $id = $_GET['ma'];
    $courseid = $_GET['id'];
    $sql = "DELETE FROM class_details WHERE course_id = $courseid and user_id = $id ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script> 
                alert('Đã xóa thành công.');
                window.location.replace('list_class_teacher.php?id=" .$courseid."');               
        </script>";	
?>