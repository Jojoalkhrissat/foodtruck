<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$itemid=$_GET['itemid'];
		$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
	try{
		if($customerid==""){
$MyJsonData1="";
$itemspershop="SELECT I."."id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.subcategory,SU.subcatname,I.shop,S.shopname ,I.photo,I.photo1,I.photo2, I.price, I.timessold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on F.itemid=I.id  left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.id=$itemid GROUP By I.id";
$getitemspershop = $conn->query($itemspershop);
$getitemspershop->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspershop->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}elseif ($customerid!="") {
$MyJsonData1="";
$itemspershop="SELECT I."."id, I.itemname,I.itemnamear,MF.customerid as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.subcategory,SU.subcatname,I.shop,S.shopname ,I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on F.itemid=I.id  left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.id=$itemid GROUP By I.id";
$getitemspershop = $conn->query($itemspershop);
$getitemspershop->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspershop->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":")(?!'.$customerid.')\d+(?=")/', 'NO', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":")'.$customerid.'(?=")/', 'YES', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo ']';
}
}catch(Exception $e){
	http_response_code(400);
echo "400 bad request";	
}}else{
	http_response_code(400);
echo "400 bad request";
}
?>
