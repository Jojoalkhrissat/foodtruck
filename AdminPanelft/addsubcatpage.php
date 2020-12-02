<?php
require "../connect.php";
session_start();

$categories='SELECT * FROM category';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>

<html>
<head>
<title>add subcategory</title>
	<link rel="stylesheet" type="text/css" href="addsubcatpage.css">
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
<div class="img">
<img src="../<?php echo $_SESSION['photo']; ?>">
</div><br>
<div class="myform">
<div class="data">
<form  action="addsubcat.php" method="post" enctype="multipart/form-data">
<label>shop </label><input type="text" name="shop" id="shops" value="<?php echo $_SESSION['id'].','.$_SESSION['shopname'].','.$_SESSION['shopnamear']; ?>" disabled><br>
<label>category  </label><select name="categories" id ="categories">
<?php
while($row = $getcategories->fetch()):
echo "<option value = ".$row['id']." name=>".$row['catname']."</option>";
endwhile;
?>
 </select>



 


  
<br>

<label>name </label><input  type="text" name="subcatname" id="subcatname">  

<br>

<label>namear </label><input type="text" name="subcatnamear" id="subcatnamear">
<br>












 <label>image: </label><input class="button" type="file" name="subcatimage" id="subcatimage">
 <br>
 <input  type="submit" value="add subcat" name="submit">
 
</form>
</div></div>
</body>
</html>