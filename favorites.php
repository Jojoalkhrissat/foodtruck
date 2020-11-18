<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$customerid=$_GET['customerid'];
	try{
$MyJsonData1="";
$itemsperfav="SELECT I."."id,I.itemname,I.itemnamear,I.description,I.descriptionar,I.preparetime,I.timesamples,I.shop,I.photo,I.photo1,I.photo2,I.price,I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on I.id=F.itemid ,favorites MF where MF.itemid=I.id and MF.customerid=$customerid GROUP By I.id";
$getitemsperfav = $conn->query($itemsperfav);
$getitemsperfav->setFetchMode(PDO::FETCH_ASSOC);
$count=$getitemsperfav->rowCount();
if($count>0){
while($row = $getitemsperfav->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":").+?(?=")/',$row['itemnamear'], $jsonrow);
$jsonrow=preg_replace('/(?<=descriptionar":").+?(?=")/',$row['descriptionar'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1=preg_replace('/"rating":null/', '"rating":"1"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);

echo "[";
echo $MyJsonData1;
echo ']';
}else{
echo '[{"Message":"You have no favorites"}]';		
}
}catch(Exception $e){
http_response_code(400);
echo "400 bad request";	
}}else{
echo "400 bad request";
http_response_code(400);
}
?>
