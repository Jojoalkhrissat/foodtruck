<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$post = file_get_contents('php://input');
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=couponid":").+?(?=")/',$post,$couponid);
preg_match('/(?<=paymentmethod":").+?(?=")/',$post,$paymentmethod);
preg_match('/(?<=paymenttoken":").+?(?=")/',$post,$paymenttoken);
if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=couponid=).+?(?=&|$)/',$post,$couponid);
preg_match('/(?<=paymentmethod=).+?(?=&|$)/',$post,$paymentmethod);
preg_match('/(?<=paymenttoken=).+?(?=&|$)/',$post,$paymenttoken);
}

if($paymentmethod[0]=="CASH"){

if($couponid[0]=="None"){
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$getorderinfo = $conn->query($getorder);
$getorderinfo->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";	
while($row = $getorderinfo->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
// $minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();

}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$getorderinfo = $conn->query($getorder);
$getorderinfo->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";	
while($row = $getorderinfo->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid.',paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();

}



}elseif($paymentmethod[0]=="ONLINE"){
if($couponid[0]=="None"){
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$getorderinfo = $conn->query($getorder);
$getorderinfo->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";	
while($row = $getorderinfo->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();


}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$getorderinfo = $conn->query($getorder);
$getorderinfo->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";	
while($row = $getorderinfo->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid.',paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();

}


$paymentmethod= "INSERT INTO `onlinepayment`(`customer`, `orderid`, `paymenttoken`) VALUES (".$customerid[0].",".$id[0].",'".$paymenttoken[0]."')";
$stmt= $conn->prepare($paymentmethod);
$stmt->execute();




}








}else{
	echo '[{"message":"Your order was not completed","order time":"'.$ordertime.'"}]';
http_response_code(400);
}

?>