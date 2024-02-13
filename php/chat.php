<?php
    session_start();
?>
<html>
    <head>
    </head>
    <body>
        <?php 
            $malay = $_GET['ma'];               
            $conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
            mysqli_query($conn,"SET NAMES 'utf8'");
            $sqlcmd="select * from discussions where id='".$malay."'";
            $result = mysqli_query($conn, $sqlcmd);
            if  ($row= mysqli_fetch_array($result))
            {
                $d = $row['id'];
                echo "<b>chủ đề: ".$row['title']."</b>";   
                echo "<br><i>nội dung:".$row['content']."</i>";
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <input type="hidden" name="dis_id" value="<?php echo $malay; ?>">
            <input type="text" name="content" placeholder="Nhập phản hồi của bạn">
            <input type="submit" name="comment" value="ĐĂNG">
            </form>               

            <?php 
                $sqllayphanhoi = "select * from comments where discussion_id= '".$malay."'";
                $rsphanhoi= mysqli_query($conn, $sqllayphanhoi);
                
                while ($rowph= mysqli_fetch_array($rsphanhoi))
                {
                    $sqllayten = "select*from users where user_id = ".$rowph['user_id']."";
                    $rslayten= mysqli_query($conn, $sqllayten);
                    $rowlt= mysqli_fetch_array($rslayten);
                    echo "<br> <a href='#'>".$rowlt['fullname']."</a>";
                    echo "<br>bình luận: ".$rowph['content'].",  ".$rowph['updated_at'];
                   
                }
            }          
            if (isset($_POST['comment']))
            {                 
                $userid= $_SESSION['manguoidung'];
                $binhluan = $_POST['content'];
                $maph = $_POST['dis_id'];
                $sqlcmd= "insert into comments (discussion_id, user_id, content) values ('".$maph."', '".$userid."', '".$binhluan."')";
               
                if ($result = mysqli_query($conn, $sqlcmd))
				{
					echo "<script> 
					    alert('viết phản hồi thành công');
					    window.history.back();
					    </script>";	
				}
            }
        ?>        
	</body>
</html>