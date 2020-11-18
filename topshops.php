<?php
require "connect.php";
if(($_SERVER["REQUEST_METHOD"] == "GET")){
$topshops='SELECT DISTINCT S.'.'id,S.shopname,S.shopnamear,S.photo,Avg(F.rating) as rating,count(F.rating) as ratingcount FROM shop as S left join feedback as F on S.id=F.shop GROUP by S.id order by rating DESC limit 10';
$getshops = $conn->query($topshops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);

echo '[';
$MyJsonData="";	
while($row = $getshops->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=subcatnamear":").+?(?=")/',$row['subcatnamear'], $jsonrow);
$MyJsonData=$MyJsonData.",".$jsonrow;
endwhile;
$MyJsonData=preg_replace('/"Rating":null/', '"Rating":"1"', $MyJsonData);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;
echo "]";
}
?>