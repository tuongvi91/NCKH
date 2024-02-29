<html>
<head>
</head>
<body>
    <?php
        require_once '../phpqrcode/qrlib.php'; 
        $path='../img/';   
        $qrcode =$path.time().".png";
        $qrimg = time().".png";
        if (isset($_POST['create']))
        {
            $conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
            $qr_text = uniqid();
            $sqlcmd = "insert into qrcode (qrText, qrImg) values ('".$qr_text."', '".$qrimg."')";
            
			if ($result = mysqli_query($conn, $sqlcmd)) 
			{
                echo
							"<script> 
								alert('Tạo thành công');				
                            </script>";
            }
            QRcode :: png($qr_text, $qrcode, 'H', 4, 4);
            echo "<img src ='".$qrcode."'>";
        }        
    ?>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">        
        <input type="submit" value ="Tạo" name ="create">        
    </form>
</body>

</html>