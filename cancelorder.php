<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);

if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}


$order= 'UPDATE orders SET status="CANCELLED",ordertime='.'CURRENT_TIME WHERE id="'.$orderid[0].'"'; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();
$isupdated= $dispatchorder->rowCount();





echo '[{"message":"Your order is now cancelled"}]';





}else{
	echo '[{"message":"Your order was not cancelled"}]'
http_response_code(400)
}

?>