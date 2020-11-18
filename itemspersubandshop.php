<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$subcategory=$_GET['subcategory'];
	$shop=$_GET['shop'];
	$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
	try{
	if($customerid==""){
$MyJsonData1="";
echo "[";
$items="SELECT I."."id, I.itemname,I.itemnamear,'' as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples, I.shop,S.shopname, I.photo,I.photo1,I.photo2, I.price, I.timessold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on I.id=F.itemid LEFT Join shop S on I.shop=S.id where I.subcategory=$subcategory AND I.shop=$shop GROUP By F.itemid";
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitems->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":).+?(?=,)/', '"NO"', $MyJsonData1);
echo $MyJsonData1;
echo ']';
}elseif($customerid!="") {
$MyJsonData1="";
echo "[";
$items="SELECT I."."id, I.itemname, I.itemnamear,MF.customerid as isfavorite,I.description,I.descriptionar,I.preparetime,I.timesamples,I.shop,S.shopname, I.photo,I.photo1,I.photo2, I.price, I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join favorites MF on MF.itemid=I.id left join feedback F on I.id=F.itemid left join shop S on I.shop=S.id WHERE I.shop=$shop and I.subcategory=$subcategory GROUP By F.itemid
";
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitems->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":)(?!'.$customerid.').+?(?=,)/', '"NO"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="isfavorite":")'.$customerid.'(?=")/', 'YES', $MyJsonData1);
echo $MyJsonData1;
echo ']';
	
}
}catch(Exception $e){
	echo "400 error bad request";
	http_response_code(400);
}
}else{
	echo "400 error bad request";
http_response_code(400);
}

?>