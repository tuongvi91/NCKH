<?php
    session_start();
?>
<html>
<head>
</head>
<body>
    <?php
        if (isset($_POST['send']))
		{
            $conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
			$madiemdanh = $_POST['code'] ;
            $userid= $_SESSION['manguoidung'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $tg = time();
            $thoidiem = date('Y-m-d H:i:s', $tg);
            $mamon = 1;
            $sqlcheck = "SELECT*FROM qrcode WHERE qrText='".$madiemdanh."'";
            $kqCheck = mysqli_query($conn, $sqlcheck);
            if ($rowCheck = (mysqli_fetch_array($kqCheck)))
			{	
                $sqlcmd = "insert into attendance (schedule_id, user_id, attendance_time) values ('".$mamon."', '".$userid."', '".$thoidiem."')";
                if ($them = mysqli_query($conn, $sqlcmd))
                {
                    echo "<script> 
                    alert('Đã điểm danh');
                    window.history.back();
                    </script>";	
                }
                else echo "<script> 
                    alert('Đã xảy ra lỗi, vui lòng kiểm tra lại');
                    window.history.back();
                    </script>";	
            }
        }
    ?>

    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
        <input type="text" placeholder="mã điểm danh" name = "code">
        <input type="submit" value ="Điểm danh" name ="send">
    </form>
</body>
</html>