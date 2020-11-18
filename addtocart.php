<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=count=).+?(?=&|$)/',$post,$count);
}
if(isset($count[0])&&isset($customerid[0])&&isset($itemid[0])){
$MyJsonData1="";
$items="SELECT I."."id, I.itemname,I.description,I.preparetime,I.timesamples,I.shop,S.shopname,I.photo,I.photo1,I.photo2,I.price, I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on F.itemid=I.id  left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.id=$itemid[0] GROUP By I.id";
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitems->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/null', 'nulldata', $MyJsonData1);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData1,$Shop);
preg_match('/(?<=preparetime":").+?(?=")/',$MyJsonData1,$PrepareTime);
preg_match('/(?<=timesamples":").+?(?=")/',$MyJsonData1,$TimeSamples);
if(isset($Shop[0])){
if($TimeSamples[0]=="0"){
$timeforready=$PrepareTime[0]*$count[0];
}else{
$timeforready=$PrepareTime[0];
}



$MyJsonData="";	
$order="SELECT id,shop,status,ordertotaltime FROM orders WHERE customer=".$customerid[0]." and status='CART'";
$getorder = $conn->query($order);
$getorder->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getorder->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData="";	
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=ordertotaltime":").+?(?=")/',$MyJsonData,$timeready);







$elements="SELECT * FROM orderelements WHERE ordernumber=".$$id[0]."";
$getelements = $conn->query($itemspersub);
$getelements->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getelements->fetch()):
$MyJsonData2=$MyJsonData2.",".json_encode($row);
endwhile;
$MyJsonData2 = preg_replace('/,/', '', $MyJsonData2, 1);
preg_match('/(?<=count":").+?(?=")/',$MyJsonData2,$Count);









if(!isset($id[0])&&!isset($Count[0])){
$createcart= 'INSERT INTO `order`(`customer`, `shop`,`ordertotaltime`,`status`) VALUES ('.$customerid[0].','.$Shop[0].','.$timeforready.',"CART")';
$stamt= $conn->prepare($createcart);
$stamt->execute();
$addtocart= 'INSERT INTO `orderelements`(`item`, `count`) VALUES ('.$itemid[0].','.$count[0].')';
$stmt= $conn->prepare($addtocart);
$stmt->execute();


}elseif(isset($id[0])&&isset($Count[0])){

if($TimeSamples[0]=="0"){
$timeforready=($PrepareTime[0]*$count[0])+intval($timeready[0]);
}else{
$timeforready=$PrepareTime[0];
}



	$count[0]=$count[0]+$Count[0];
$updatecount= 'UPDATE orderelements set count='.$count[0].' where ordernumber='.$id[0].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();
$updatecount= 'UPDATE orders set ordertotaltime='.$timeforready[0].' where id='.$id[0].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();
}
$isinserted= $stmt->rowCount();
if($isinserted>0){

	echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Added to cart"}';

}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not added"}';
}
}
else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item does not exist"}';	
}

}else{
http_response_code(400);
$itemid[0]="Not Valid";
$count[0]="Not Valid";
$customerid[0]="Not Valid";
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
}
catch(Exception $e){

}
}
?>