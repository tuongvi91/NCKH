<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quét mã QR</title>
    <link rel="stylesheet" href="../css/createQRcode.css">
    <?php
    include("../php/sidebar_teacher.php");
    ?>
</head>

<body>
    <section class="home-section">
        <div id="qrCodeForm" style="text-align: center; margin-top:15%">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?class_id=<?php echo isset($_GET['class_id']) ? $_GET['class_id'] : ''; ?>&id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" method="POST">
                <?php
                require 'connect.php';
                $laymalop = "select * from course where course_id = '" . $_GET['class_id'] . "' ";
                $rsMalop = mysqli_query($conn, $laymalop);
                $rowMalop = mysqli_fetch_assoc($rsMalop);
                ?>
                <h1>Mã học phần: <?php echo $rowMalop['course_id']; ?></h1>
                <h1>Môn học: <?php echo $rowMalop['name']; ?></h1>
                <br>
                <label for="validity">Chọn thời gian hiệu lực:</label>
                <select name="validity" id="validity" style="padding: 10px; margin-top: 10px; margin-bottom: 10px; border: none; border-radius: 5px ; border: 1px solid #69b4fa">
                    <option value="10">10 giây</option>
                    <option value="20">20 giây</option>
                    <option value="30">30 giây</option>
                    <option value="40">40 giây</option>
                    <option value="50">50 giây</option>
                    <option value="60">60 giây</option>
                </select>
                <br>
                <input type="text" name="id" hidden value=" <?php echo $schedule_id = $_GET['id']; ?>">
                <br>
                <input type="submit" value="Tạo mã QR Code" name="create" style="padding: 10px 20px; margin-top: 10px; margin-bottom: 10px; background: #69b4fa; color: white; border: none; border-radius: 5px; cursor: pointer; font-size:20px">
                <a href="detailed_list_of_classes.php?class_id=<?php echo isset($_GET['class_id']) ? $_GET['class_id'] : ''; ?>" style="padding: 10px 20px; margin-top: 10px; margin-bottom: 10px; background: #69b4fa; color: white; border: none; border-radius: 5px; cursor: pointer; font-size:21px; text-decoration: none">Quay về</a>

            </form>
        </div>
        <?php
        if (isset($_POST['create'])) {
            $str = "";
            $chars = "0123456789";

            $size = strlen($chars);

            for ($i = 0; $i < 6; $i++) {

                $str .= $chars[rand(0, $size - 1)];
            }

            $qr_text = $str;

            $validity_period = isset($_POST['validity']) ? intval($_POST['validity']) : 10;
            $schedule_id = isset($_POST['id']) ? intval($_POST['id']) : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $create_at = date('Y-m-d H:i:s');
            $valid_until = date('Y-m-d H:i:s', strtotime($create_at . ' +' . $validity_period . ' seconds'));


            $kiemTra = "SELECT count(id) as count FROM  qrcode where schedule_id = '" . $schedule_id . "'";
            $rsKiemTra = mysqli_query($conn, $kiemTra);
            $rowKiemTra = mysqli_fetch_assoc($rsKiemTra);
            $time = "";
            if ($rowKiemTra['count'] == 0) {
                $sqlcmd = "insert into qrcode (qrText, schedule_id, create_at) values ('" . $qr_text . "', '" . $schedule_id . "', '" . $valid_until . "')";
                $result = mysqli_query($conn, $sqlcmd);
            } else {
                $queryQRCode = "SELECT * FROM  qrcode where schedule_id = '" . $schedule_id . "'";
                $rsQueryQRCode = mysqli_query($conn, $queryQRCode);
                $rowQueryQRCode = mysqli_fetch_assoc($rsQueryQRCode);

                $qr_text = $rowQueryQRCode['qrText'];
                $time = $rowQueryQRCode['create_at'];
            }

            echo
            "<script> 
                    alert('Tạo thành công');		
                    document.getElementById('qrCodeForm').style.display = 'none'; 		
                </script>";


            echo ' 
                <div id="countdown" style="text-align: center; font-size: 40px; margin-top: 20px"></div>
                <h1 style="text-align: center; margin-top: 20px"><small>Thời gian đến hạn:</small> ' . $time . ' </h1>
                <br>
                <div style="text-align: center">
                    <table border="1" width="50%" style="margin: auto">
                        <tr>
                            <td><h1>MÃ OTP</h1></td>
                            <td><h1>QR CODE</h1></td>
                        </tr>
                        <tr>
                            <td>
                                <div style="display: flex">
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 0, 1) . '</h1>
                                    </div>
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 1, 1) . '</h1>
                                    </div>
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 2, 1) . '</h1>
                                    </div>
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 3, 1) . '</h1>
                                    </div>
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 4, 1) . '</h1>
                                    </div>
                                    <div style="padding: 10px; margin: 10px; width: 80px; border: none; border-radius: 5px ; border: 1px solid #69b4fa; font-size: 40px; text-align:center">
                                        <h1>' . substr($qr_text, 5, 1) . '</h1>
                                    </div>
                                </div>
                            </td>
                            <td><img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&choe=UTF-8&chl=http://localhost/NCKH/php/attendance_std.php?id=' . $_GET['class_id'] . '-' . $schedule_id . '-' . $qr_text . '" title="Link to Google.com" /></td>
                        </tr> 
                    </table>
                </div> 
                <br>
                <a href="detailed_list_of_classes.php?class_id=' . $_GET['class_id'] . '" style="padding: 10px 20px; margin: auto; background: #69b4fa; color: white; border: none; border-radius: 5px; cursor: pointer; font-size:20px; text-decoration: none; justify-content: center; display: flex; width: 300px">Quay về</a>
                <script>
                // Set the countdown duration in seconds
                var countdownDuration = ' . $validity_period . '; 
                var countdownElement = document.getElementById("countdown");
                function updateCountdown() {
                    countdownElement.innerHTML = "Countdown: " + countdownDuration + "s";
                    countdownDuration--;
                    if (countdownDuration < 0) {
                        clearInterval(timer); // Stop the timer
                        countdownElement.innerHTML = "Countdown Finished";
                    }
                }
                
                var timer = setInterval(updateCountdown, 500);
            </script>';
        }

        ?>
</body>

</html>
