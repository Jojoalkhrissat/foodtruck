<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$itemid=$_GET['itemid'];
		$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
	try{
		if($customerid==""){
$MyJsonData1="";
$itemspershop="SELECT I."."id, I.Name,'' as IsFavorite,I.Description, I.SubCategory,SU.Name,I.shop,S.ShopName ,I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join feedback F on F.ItemId=I.id  left join shop S on I.Shop=S.id left join subcategory SU on I.SubCategory=SU.id where I.id=$itemid GROUP By I.id";
$getitemspershop = $conn->query($itemspershop);
$getitemspershop->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspershop->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}elseif ($customerid!="") {
$MyJsonData1="";
$itemspershop="SELECT I."."id, I.Name,MF.CustomerId as IsFavorite,I.Description, I.SubCategory,SU.Name,I.shop,S.ShopName ,I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join favorites MF on MF.ItemId=I.id left join feedback F on F.ItemId=I.id  left join shop S on I.Shop=S.id left join subcategory SU on I.SubCategory=SU.id where I.id=$itemid GROUP By I.id";
$getitemspershop = $conn->query($itemspershop);
$getitemspershop->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspershop->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":")(?!'.$customerid.')\d+(?=")/', 'NO', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":")'.$customerid.'(?=")/', 'YES', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}
}catch(Exception $e){
	http_response_code(400);
echo "400 bad request";	
}}else{
	http_response_code(400);
echo "400 bad request";
}
?>
