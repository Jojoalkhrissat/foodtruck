<?php
require "connect.php";
require "sql.php";
require "functions.php";


$shops='SELECT * FROM shop where active=1';

$current_time=date("H:i:s",time());

$MyJsonData=sql_selectdata($shops,$conn);	



preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData,$closetime);
preg_match_all('/(?<=id":").+?(?=")/',$MyJsonData,$id);
for ($i=0; $i <count($opentime[0]) ; $i++) { 
$shoprating= 'SELECT avg(F'.'.rating) as rating,count(F.rating) as ratingnumber from feedback F,Items I where I.id=F.itemid and I.shop="'.$id[0][$i].'" group by I.shop';
$MyJsonData1=sql_selectdata($shoprating,$conn);
preg_match('/\"rating\"\:\".+?\"\,\"ratingnumber\"\:\".+?\"/',$MyJsonData1 ,$rating);
if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData = str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","available":"true"', $MyJsonData);
if(isset($rating[0])){
$MyJsonData =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'",'.$rating[0].'', $MyJsonData);
}else{
$MyJsonData =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData);
}
}
else{

$MyJsonData =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","available":"false"', $MyJsonData);
if(isset($rating[0])){
$MyJsonData =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'",'.$rating[0].'', $MyJsonData);
}else{
$MyJsonData =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData);
}
}

}

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);

echo '[';
echo $MyJsonData;
echo ']';
?>