<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);


if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
}
$fetchadmininfo='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="INDISPATCH",ordertime='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();
$isupdated= $dispatchorder->rowCount();




if($isupdated>0){
echo '[{"message":"Your order is now in dispatch waiting for acceptance","order time":"'.$ordertime.'"}]';





}else{
	echo '[{"message":"Your order was not completed","order time":"'.$ordertime.'"}]'
http_response_code(400)
}
}
?>