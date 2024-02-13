<?php 
    session_start();
?>
<html>
    <head>
    </head>
    <body>
        <?php

            if (isset($_POST['create']) && isset ($_SESSION['ma']))
		    {
		    	$conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
			    $ten = $_POST['name'] ;
                $noidung= $_POST['content'];

                $userid= $_SESSION['manguoidung'];
                $sqlcmd = "insert into discussions (title, content, user_id) values ('".$ten."', '".$noidung."', '".$userid."')";
               
                if ($them = mysqli_query($conn, $sqlcmd))
					{
						echo "<script> 
						alert('Tạo thành công');
						window.history.back();
						</script>";	
					}
                else 
                echo "<script> 
						alert('Lỗi tạo cuộc thảo luận');
						window.history.back();
						</script>";	
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
            <input type = "text" placeholder="Tên cuộc thảo luận" name = "name">
            <input type ="text" placeholder="nội dung" name = "content">
            <input type ="submit" value ="TẠO" name="create">
            <a href="discussion_list.php">Danh sách thảo luận</a>
           
        </form>
    </body>

</html>