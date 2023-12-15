<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/login.css">
	<title>Login</title>
</head>
<body>

	<div class="login">
		<div class="logo">
			<div class="item">
			<img src="../img/logo.png" alt="logo">
			</div>
		</div>
		<div class="group">
			<input type="text" placeholder="Tên đăng nhập">
		</div>
		<div class="group">
			<input type="password" id="inputPassword" placeholder="Mật khẩu">
			<span id="showPassword">
				<ion-icon name="eye-outline"></ion-icon>
				<ion-icon name="eye-off-outline"></ion-icon>
			</span>
		</div>
		<div class="signIn">
			<button>ĐĂNG NHẬP</button>
		</div>

	</div>

	<script src="../js/login.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>