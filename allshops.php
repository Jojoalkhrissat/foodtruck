<?php
require "connect.php";
require "sql.php";
require "functions.php";


$shops='SELECT * FROM shop where active=1';

$current_time=date("H:i:s",time());

$MyJsonData1=sql_selectdata($shops,$conn);	



preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData1,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData1,$closetime);
preg_match_all('/(?<=id":").+?(?=")/',$MyJsonData1,$id);
for ($i=0; $i <count($opentime[0]) ; $i++) { 
$shoprating= 'SELECT avg(F'.'.rating) as rating,count(F.rating) as ratingnumber from feedback F,Items I where I.id=F.itemid and I.shop="'.$id[0][$i].'" group by I.shop';
$MyJsonData=sql_selectdata($shoprating,$conn);
preg_match('/\"rating\"\:\".+?\"\,\"ratingnumber\"\:\".+?\"/',$MyJsonData ,$rating);
if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData1 = str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'","available":"true"', $MyJsonData1);
if(isset($rating[0])){
$MyJsonData1 =str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'",'.$rating[0].'', $MyJsonData1);
}else{
$MyJsonData1 =str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData1);
}
}
else{

$MyJsonData1 = str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'","available":"false"', $MyJsonData1);
if(isset($rating[0])){
$MyJsonData1 =str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'",'.$rating[0].'', $MyJsonData1);
}else{
$MyJsonData1 =str_replace('"id":"'.$id[0][$i].'"', '"id":"'.$id[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData1);
}
}

}

$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = str_replace('null', '""', $MyJsonData1);

echo '[';
echo $MyJsonData1;
echo ']';
?>