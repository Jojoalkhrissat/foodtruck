<?php
require "connect.php";
require "sql.php";
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid==""){

$topitems="SELECT I".".id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.quantity,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id where S.active=1 GROUP By I.id order by Rating DESC limit 10";
$MyJsonData1=sql_selectdata($topitems,$conn);
$MyJsonData1=preg_replace('/"rating":null/', '"rating":"1"', $MyJsonData1);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '"1"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}elseif($customerid!=""){
	$getfavorites="SELECT * from favorites where customerid=".$customerid."";
$MyJsonData=sql_selectdata($getfavorites,$conn);
preg_match_all('/(?<="itemid":").+?(?=")/', $MyJsonData,$itemid);
$topitems="SELECT I".".id, I.itemname,I.itemnamear,MF.customerid as isfavorite,I.description,I.descriptionar,I.preparetime,I.quantity,I.timesamples,I.shop,S.shopname,S.shopnamear, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.Rating) as rating,count(F.Rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id where S.active=1 GROUP By I.id order by rating DESC limit 10";
$MyJsonData1=sql_selectdata($topitems,$conn);
$MyJsonData1=preg_replace('/"rating":null/', '"rating":"1"', $MyJsonData1);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
preg_match_all('/(?<="id":").+?(?=",)/', $MyJsonData1,$itemid2);
for($i=0;$i<count($itemid2[0]);$i++){
if(in_array($itemid2[0][$i],$itemid[0])){

preg_match('/"id":"'.$itemid2[0][$i].'".+?isfavorite":/', $MyJsonData1,$match);


$MyJsonData1 = preg_replace('/(?<='.$match[0].').+?(?=,)/', '"YES"', $MyJsonData1);
}
else{ 
preg_match('/"id":"'.$itemid2[0][$i].'".+?isfavorite":/', $MyJsonData1,$match);
	$MyJsonData1 = preg_replace('/(?<='.$match[0].').+?(?=,)/', '"NO"', $MyJsonData1);
}
}
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '"1"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}


   

?>