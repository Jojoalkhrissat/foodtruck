<?php
require "connect.php";
require "sql.php";
require "functions.php";



if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	
		$category=$_GET['category'];
$current_time=date("H:i:s",time());
$shoppercat="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S, subcategory SU WHERE S.id=SU.shop and SU.category=".$category." and S.active=1 GROUP by S.id";


$MyJsonData1=sql_selectdata($shoppercat,$conn);

preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData1,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData1,$closetime);
preg_match_all('/(?<=id":").+?(?=")/',$MyJsonData1 ,$id);


for ($i=0; $i <count($opentime[0]) ; $i++) { 
$shoprating= 'SELECT avg(F'.'.rating) as rating,count(F.rating) as ratingnumber from feedback F,Items I where I.id=F.itemid and I.shop="'.$id[0][$i].'" group by I.shop';
$MyJsonData=sql_selectdata($shoprating,$conn);
preg_match('/\"rating\"\:\".+?\"\,\"ratingnumber\"\:\".+?\"/',$MyJsonData ,$rating);
if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData1 = str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"}', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","available":"true"}', $MyJsonData1);
if(isset($rating[0])){
$MyJsonData1 =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'",'.$rating[0].'', $MyJsonData1);
}else{
$MyJsonData1 =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData1);
}
}
else{

$MyJsonData1 =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"}', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","available":"false"}', $MyJsonData1);
if(isset($rating[0])){
$MyJsonData1 =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'",'.$rating[0].'', $MyJsonData1);
}else{
$MyJsonData1 =str_replace('"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'"', '"opentime":"'.$opentime[0][$i].'","closetime":"'.$closetime[0][$i].'","rating":"1","ratingnumber":"0"', $MyJsonData1);
}
}

}

$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);

echo "[";

echo $MyJsonData1;

echo ']';




}catch(Exception $e){

http_response_code(400);
echo "Bad request 400";
}
}else{
http_response_code(400);
echo "Bad request 400";

}

?>