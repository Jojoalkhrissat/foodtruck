<?php
require "connect.php";
session_start();

$subcategories='SELECT * FROM subcategory where shop='.$_SESSION['id'].'';
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);
$categories='SELECT * FROM category';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>

<html>
<head>
<title>modify subcategory</title>
	<link rel="stylesheet" type="text/css" href="addsubcatpage.css">
</head>
<body>
<?php
require "navbar.html";
?>
<div class="img">
<img src="../../<?php echo $_SESSION['photo']; ?>">
</div><br>
<div class="myform">
<div class="data">
<form  action="modifysubcat.php" method="post" enctype="multipart/form-data">
<label>shop </label><input type="text" name="shop" id="shops" value="<?php echo $_SESSION['id'].','.$_SESSION['shopname'].','.$_SESSION['shopnamear']; ?>" disabled><br>
 
 <label>subcategory  </label>
<select name="subcategories" id ="subcategories">
<?php

while($row = $getsubcategories->fetch()):

$subcatname[$row['id']]=$row['subcatname'];
echo "<option value = ".$row['id']." name=>".$row['subcatname']."</option>";
endwhile;
?>	
</select>
<label>category  </label><select name="categories" id ="categories">

<?php

while($row = $getcategories->fetch()):
$_SESSION['id_'.$row['id']]=$row['id'];
$_SESSION['subcatname_'.$row['id']]=$row['subcatname'];
$_SESSION['subcatnamear_'.$row['id']]=$row['subcatnamear'];
$_SESSION['categories_'.$row['id']]=$row['category'];
$_SESSION['subcatimage_'.$row['id']]=$row['photo'];
$subcatname[$row['id']]=$row['catname'];
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
 <input  type="submit" value="modify subcat" name="submit">
 
</form>
</div></div>
</body>
</html>