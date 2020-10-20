<?php
require "connect.php";
if(($_SERVER["REQUEST_METHOD"] == "GET")){
$topshops='SELECT DISTINCT S.'.'id,S.'.'ShopName,S.'.'Photo,Avg(F.Rating) as Rating,count(F.Rating) as RatingCount FROM shop as S left join feedback as F on S.id=F.Shop WHERE ExtraPay > 0 GROUP by S.id order by Rating DESC limit 10';
$getshops = $conn->query($topshops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);

echo '[';
$MyJsonData="";	
while($row = $getshops->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData=preg_replace('/"Rating":null/', '"Rating":"1"', $MyJsonData);
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;
echo "]";
}
?>