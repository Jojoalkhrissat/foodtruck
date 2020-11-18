<?php
require "../connect.php";
$categories='SELECT * FROM category';
$getcategories = $conn->query($categories);
$getcategories->setFetchMode(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<html>

<body>

<form action="addsubcat.php" method="post" enctype="multipart/form-data">
<label>category </label><select name="categories" id ="categories">
<?php
while($row = $getcategories->fetch()):
echo "<option value = ".$row['id']." name=>".$row['catname']."</option>";
endwhile;
?>
 </select>

<?php
require "../connect.php";
$shops='SELECT * FROM shop';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);
?>
<label>shop </label><select name="shops" id ="shops">
<?php
while($row = $getshops->fetch()):
echo "<option value = ".$row['id']." name=>".$row['shopname']."</option>";
endwhile;
?>
 </select>


  
<br>

<label>name </label><input type="text" name="subcatname" id="subcatname">  

<br>

<label>namear </label><input type="text" name="subcatnamear" id="subcatnamear">
<br>












 <label>Select image to upload: </label><input type="file" name="subcatimage" id="subcatimage">
 <br>
 <input type="submit" value="add subcat" name="submit">
</form>

</body>
</html>