<?php
    require_once('connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE user_id = $id ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script> 
                alert('Đã xóa thành công.');
                window.location= 'teacher_admin.php';               
        </script>";	
?>