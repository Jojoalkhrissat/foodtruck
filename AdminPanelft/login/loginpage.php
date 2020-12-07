<!DOCTYPE html>
<html>
<head>
	<title>
		login
	</title>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
</head>
<body>
<?php
require "navbar.html";
?>
<div class="container">
	<div class="inputdata">
<form method="post" action="login.php">
	<input type="text" name="username" placeholder="ادخل اسم المستخدم" id="username"><br>
	<input type="password" name="password" placeholder="ادخل كلمة السر" id="password"><br>
<input type="submit" id="loginbtn" name="login" value="تسجيل الدخول">
</div>
</div>

</form>
</body>
</html>