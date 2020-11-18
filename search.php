<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$q=$_GET['q'];
		$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
	try{
		if($customerid==""){
$MyJsonData1="";
$searchterm="SELECT I."."id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples, I.shop,S.shopname,I.subcategory,SU.subcatname, I.photo,I.photo1,I.photo2, I.price, I.timessold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.itemname like '%$q%' GROUP By I.id";
$getsearchterm = $conn->query($searchterm);
$getsearchterm->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsearchterm->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1=preg_replace('/"rating":null/', '"rating":"1"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}elseif ($customerid!="") {
$MyJsonData1="";
$searchterm="SELECT I."."id, I.itemname,I.itemnamear,MF.customerid as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples, I.shop,S.shopname,I.subcategory,SU.subcatname, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.itemname like '%$q%' GROUP By I.id";
$getsearchterm = $conn->query($searchterm);
$getsearchterm->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getsearchterm->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1=preg_replace('/"rating":null/', '"rating":"1"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":)(?!'.$customerid.').+?(?=,)/', '"NO"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":")'.$customerid.'(?=")/', 'YES', $MyJsonData1);
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
