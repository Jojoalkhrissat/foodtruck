<?php
require "connect.php";
session_start();
$items='SELECT * FROM items where shop="'.$_SESSION['id'].'"';
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
$subcategories='SELECT * FROM subcategory where shop="'.$_SESSION['id'].'"';
$getsubcategories = $conn->query($subcategories);
$getsubcategories->setFetchMode(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>

<html>
<head>
<title>modify item</title>
	<link rel="stylesheet" type="text/css" href="additempage.css">
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
<form  action="modifyitem.php" method="post" enctype="multipart/form-data">
<label>shop </label><input type="text" name="shop" id="shops" value="<?php echo $_SESSION['id'].','.$_SESSION['shopname'].','.$_SESSION['shopnamear']; ?>" disabled><br>
<label>item  </label><select name="item" id ="item">
<?php
while($row = $getitems->fetch()):
$_SESSION['id_'.$row['id']]=$row['id'];
$_SESSION['itemname_'.$row['id']]=$row['itemname'];
$_SESSION['itemnamear_'.$row['id']]=$row['itemnamear'];
$_SESSION['description_'.$row['id']]=$row['description'];
$_SESSION['descriptionar_'.$row['id']]=$row['descriptionar'];
$_SESSION['price_'.$row['id']]=$row['price'];
$_SESSION['quantity_'.$row['id']]=$row['quantity'];
$_SESSION['preparetime_'.$row['id']]=$row['preparetime'];
$_SESSION['timesamples_'.$row['id']]=$row['timesamples'];
$_SESSION['subcategories_'.$row['id']]=$row['subcategory'];
echo "<option value = ".$row['id']." name=>".$row['itemname']."</option>";
endwhile;
?>
 </select>





<label>subcategory  </label><select name="subcategories" id ="subcategories">
<?php
while($row = $getsubcategories->fetch()):

echo "<option value = ".$row['id']." name=>".$row['subcatname']."</option>";
endwhile;
?>
 </select>



 


  
<br>

<label>name </label><input  type="text" name="itemname" id="itemname">  

<br>

<label>namear </label><input type="text" name="itemnamear" id="itemnamear">
<br>

<label>description </label><input type="text" name="description" id="description">
<br>
<label>descriptionar </label><input type="text" name="descriptionar" id="descriptionar">
<br>
<label>price </label><input type="number" step="0.01" name="price" id="price">
<br>

<label>quantity </label><input type="number" step="any" name="quantity" id="quantity">
<br>

<label>minutes to make </label><input type="number" min="00" max="59" name="preparetime" id="preparetime">
<br>

<label>does the time add up on each item</label><select name="timesamples" id ="timesamples"><option value = "0" name=>yes</option><option value = "1" name=>no</option></select>





 <label>image1: </label><input class="button" type="file" name="itemimage1" id="itemimage1"><br>
 <label>image2: </label><input class="button" type="file" name="itemimage2" id="itemimage2"><br>
 <label>image3: </label><input class="button" type="file" name="itemimage3" id="itemimage3"><br>
 <br>
 <input  type="submit" value="modify item" name="submit">
 
</form>
</div></div>
</body>
</html>