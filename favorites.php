<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$customerid=$_GET['customerid'];
	try{
$MyJsonData1="";
$itemsperfav="SELECT MF."."ItemId,I.Name,I.Description,I.Shop,I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join feedback F on I.id=F.ItemId ,favorites MF where MF.ItemId=I.id and MF.CustomerId=$customerid GROUP By F.ItemId";
$getitemsperfav = $conn->query($itemsperfav);
$getitemsperfav->setFetchMode(PDO::FETCH_ASSOC);
$count=$getitemsperfav->rowCount();
if($count>0){
while($row = $getitemsperfav->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo "[";
echo $MyJsonData1;
echo ']';
}else{
echo "You have no favorites";		
}
}catch(Exception $e){
http_response_code(400);
echo "400 bad request";	
}}else{
echo "400 bad request";
http_response_code(400);
}
?>
