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
$MyJsonData="";	
$itemspersub="SELECT id,count FROM `orders` WHERE Item=".$itemid[0]." and customer=".$customerid[0]." and whereorder='CART'";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=Count":").+?(?=")/',$MyJsonData,$Count);
if(isset($Count[0])){
if($Count[0]==$count[0]){

$addtocart= 'DELETE FROM `orders` WHERE id='.$id[0].'and whereorder="CART" ';
$stmt= $conn->prepare($addtocart);
$stmt->execute();
$isinserted= $stmt->rowCount();

}elseif($Count[0]>$count[0]){
	$count[0]=$Count[0]-$count[0];
$updatecount= 'UPDATE orders set count='.$count[0].' where id='.$id[0].' and whereorder="CART"';
$stmt= $conn->prepare($updatecount);
$stmt->execute();
$isinserted= $stmt->rowCount();
}else{
$isinserted=0;
$Count[0]=0;
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"you can not remove more than you have"}';
$isinserted=0;

http_response_code(400);
}

if($isinserted>0){
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"removed from cart"}';






}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not removed"}';
}
}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not removed"}';
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
}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
?>