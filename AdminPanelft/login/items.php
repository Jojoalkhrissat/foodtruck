<!DOCTYPE html>
<html>
<head>
	<title>items</title>
	<link rel="stylesheet" type="text/css" href="subcategories.css">
</head>
<body>
<?php 
require "navbar.html";
?>





<?php
require "connect.php";
session_start();
$shop=$_SESSION['id'];


$id=$_SESSION['id'];
$itemspersub="SELECT I".".id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.quantity,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id WHERE I.shop=".$shop." GROUP By I.id";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);


while($row = $getitemspersub->fetch()):

echo "<div class='container'>";
echo "<a href=/foodtruck/adminpanelft/login/itemdetails?item=".$row['id'].">";

echo "<div class='img'><img id='".$row['id']."' src='../../".$row['photo']."'>";
echo "<label class='abc'>".$row['itemname']."</label>";
echo "</div>";
echo "</a>";
echo "</div>";






endwhile;










































?>
</body>
</html>