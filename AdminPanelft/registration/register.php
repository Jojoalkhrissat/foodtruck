<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
  <title>Foodtruck Regestrations</title>
  <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Jrp9PtHe0WapppUzxbIpMDWMAcV3qE4"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reg.css">

  
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
<label class="info">fill your info </label>

<label class="location">pick your location </label>

<form action="reg.php"  method="POST" enctype="multipart/form-data">
	<div class="container">


<div id="inputdata">
	<div id="mydata">
<label class="left">username </label>	 <input type="text" name="username" id="username"> <br> <br>
<label >password </label>	 <input type="password" name="password" id="password"> <br> <br>

<label class="left">shop name </label>	 <input type="text" name="shopname" id="shopname" class="left"> <br> <br>
<label class="right">arabic shop name </label><input type="text" name="shopnamear" id="shopnamear" class="right"><br> <br>
<label class="left">first name </label>	 <input type="text" name="shopownerFN" id="shopownerFN" class="left"><br> <br>
<label class="right"> Last name </label><input type="text" name="shopownerLN" id="shopownerLN" class="right"> <br> <br>
<label class="left">phone number </label>	 <input type="text" name="shopnumber" id="shopnumber" class="left"> <br> <br>
<label class="right">email </label>	 <input type="text" name="email" id="email" class="right"> <br> <br>
<label class="left">city </label>	 <input type="text" name="city" id="city" class="left"> <br> <br>
<label class="left">open time </label><input type="time" name="opentime" id="opentime" class="left"><br> <br>
<label class="right">close time </label><input type="time" name="closetime" id="closetime" class="right"><br> <br>
<label class="left">food truck image </label><input type="file" name="shopphoto" id="shopphoto" class="right"/><br> <br>
</div>
</div>





<input type="text" name="shoplat" id="shoplat" hidden="true">
<input type="text" name="shoplong" id="shoplong" hidden="true">









<label class="moblocation" hidden="true">pick your location </label>


<div id="map"></div>

<br>
</div>
<div id="confirminfobutton">
<input type="submit" name="submit" id="confirminfo" value="register"></input>
</div>
<br>







</form>


<script type="text/javascript" src="map.js"></script>


</body>
</html>