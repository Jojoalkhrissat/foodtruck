<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$subcategory=$_GET['subcategory'];
	try{
$MyJsonData1="";
$itemspersub="SELECT I."."id, I."."Name,I.Description, I.Shop,S.ShopName, I.Photo, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I,feedback F,shop S where F.ItemId=I.id and S.id=I.Shop and I.SubCategory=$subcategory GROUP By F.ItemId limit 20 ";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo "[";
echo $MyJsonData1;
echo ']';
}catch(Exception $e){
echo "400 bad request";	
}}else{
echo "400 bad request";
}
?>
