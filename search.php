<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$q=$_GET['q'];
		$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
	try{
		if($customerid==""){
$MyJsonData1="";
$searchterm="SELECT I."."id, I.Name,'' as IsFavorite,I.Description,I.Shop,S.ShopName, I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join feedback F on F.ItemId=I.id  left join shop S on I.Shop=S.id left join subcategory SU on I.SubCategory=SU.id and F.ItemId=I.id where I.Name like '%$q%' GROUP By I.id";
$getsearchterm = $conn->query($searchterm);
$getsearchterm->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsearchterm->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}elseif ($customerid!="") {
$MyJsonData1="";
$searchterm="SELECT I."."id, I.Name,'' as IsFavorite,I.Description,I.Shop,S.ShopName, I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join feedback F on F.ItemId=I.id  left join shop S on I.Shop=S.id left join subcategory SU on I.SubCategory=SU.id and F.ItemId=I.id where I.Name like '%$q%' GROUP By I.id";
$getsearchterm = $conn->query($searchterm);
$getsearchterm->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsearchterm->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":)(?!'.$customerid.').+?(?=,)/', '"NO"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":")'.$customerid.'(?=")/', 'YES', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}
}catch(Exception $e){
echo "400 bad request";	
}}else{
echo "400 bad request";
}
?>
