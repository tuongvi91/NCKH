<!DOCTYPE html>
<?php
	session_start();	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/login.css">
	<title>Login</title>
</head>
<body>
	<?php
		if (isset($_POST['login']))
		{
			$conn = mysqli_connect ("localhost", "root", "", "qlsv") or die ("!!");
			$tdn = $_POST['name'] ;
			$mk = $_POST['pass'];
			$sqlcmd = "SELECT*FROM users WHERE username='".$tdn."'";
			$result = mysqli_query($conn, $sqlcmd);
			if ($row = (mysqli_fetch_array($result))) 
			{
				$sqlCheck = "SELECT*FROM users WHERE  password='".$mk."'";
					$kqCheck = mysqli_query($conn, $sqlCheck);
					
					if ($rowCheck = (mysqli_fetch_array($kqCheck)))
					{	
						$quyen = $rowCheck['role_id'];
						echo
							"<script> 
								alert('Đăng nhập thành công');									
								if ($quyen == '0') window.location='sidebar_admin.php'	;
								else if ($quyen == '1') window.location= 'sidebar_std.php';
								else if ($quyen == '2') window.location= 'sidebar_teacher.php';				
							</script>";	
							
						$_SESSION['tennguoidung']=$row['fullname'];
						$_SESSION['ma']=$row['user_id'];	
					}		
					else 
					{
						echo "<script> 
							alert('Đăng nhập không thành công. Vui lòng kiểm tra lại.');
							window.history.back();	
						</script>";	
					}
				}
				else 
				{			
					echo "<script> 
						alert('Tài khoản không tồn tại! Vui lòng kiểm tra lại tên đăng nhập');
						window.history.back();
					</script>";				
				}					
			mysqli_free_result($result);
			mysqli_close($conn);
		}
	?>
	<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
		<div class="login">
			<div class="logo">
				<div class="item">
				<img src="../img/logo.png" alt="logo">
				</div>
			</div>
			<div class="group">
				<input type="text" placeholder="Tên đăng nhập" name = "name">
			</div>
			<div class="group">
				<input type="password" id="inputPassword" placeholder="Mật khẩu" name = "pass">
				<span id="showPassword">
					<ion-icon name="eye-outline"></ion-icon>
					<ion-icon name="eye-off-outline"></ion-icon>
				</span>
			</div>
			<div class="signIn">
				<input type="submit" value ="ĐĂNG NHẬP" name ="login">
			</div>
			
		</div>
	</form>

	<script src="../js/login.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>