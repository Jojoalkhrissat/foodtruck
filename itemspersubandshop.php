<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$subcategory=$_GET['subcategory'];
	$shop=$_GET['shop'];
	try{
$MyJsonData1="";
echo "[";
$items="SELECT I."."id, I.Name,I.Description, I.Shop,S.ShopName, I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I,feedback F,shop S where F.ItemId=I.id and S.id=I.Shop and I.SubCategory=$subcategory AND I.Shop=$shop GROUP By F.ItemId limit 20 
";
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitems->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;
echo ']';

}catch(Exception $e){
	echo "400 error bad request";
	http_response_code(400);
}
}else{
	echo "400 error bad request";
http_response_code(400);
}

?>