
<!DOCTYPE html>
<html>
<head>
	<title>item details</title>
	<link rel="stylesheet" type="text/css" href="itemdetails.css">
</head>
<body>
<?php 
require "navbar.html";
?>
</body>
</html>

<?php
require "connect.php";
$itemid=$_GET['item'];

$itemdetails="SELECT I".".id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.quantity,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id WHERE I.id=".$itemid." GROUP By F.itemid";
$getitemdetails = $conn->query($itemdetails);
$getitemdetails->setFetchMode(PDO::FETCH_ASSOC);


while($row = $getitemdetails->fetch()):

echo "<div class='container'>";


echo "<div class='img'><img id='".$row['id']."' src='../../".$row['photo']."'><img id='".$row['id']."' src='../../".$row['photo1']."'><img id='".$row['id']."' src='../../".$row['photo2']."'><br>";
echo "</div> <div class='mydata'><label class='data'>".$row['itemname']."</label><br><br><br>";
echo "<label class='data'>".$row['itemnamear']."</label><br><br><br>";
echo "<label class='data'>".$row['preparetime']."</label><br><br><br>";
echo "<label class='data'>".$row['quantity']."</label><br><br><br>";
echo "<label class='data'>".$row['price']."</label><br><br><br>";
echo "<label class='data'>".$row['timesold']."</label><br><br><br>";
echo "</div>";

echo "<br><br>";
echo "<p>".$row['description']."</p>";
echo "<button type='button'>edit</button>";
echo "</div>";






endwhile;



































?>