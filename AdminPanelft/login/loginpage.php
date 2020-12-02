<!DOCTYPE html>
<html>
<head>
	<title>
		login
	</title>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
</head>
<body>
	<div class="navbar">
	<div id="logo">
  <a class="logo" href="#">FoodTruck</a>
  </div>
  <ul class="nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">login</a></li>
    <li><a href="#">register</a></li>
    <li><a href="#">About</a></li>
  </ul>
</div>
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