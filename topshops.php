<?php
require "connect.php";
require "sql.php";
if(($_SERVER["REQUEST_METHOD"] == "GET")){
$topshops='SELECT DISTINCT S.'.'id,S.shopname,S.shopnamear,S.photo,Avg(F.rating) as rating,count(F.rating) as ratingcount FROM shop as S left join feedback as F on S.id=F.shop GROUP by S.id order by rating DESC limit 10';
$MyJsonData =sql_selectdata($topshops,$conn);
$MyJsonData=preg_replace('/"Rating":null/', '"Rating":"1"', $MyJsonData);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo '[';
echo $MyJsonData;
echo "]";
}
?>