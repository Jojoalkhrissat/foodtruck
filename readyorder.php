<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);

if(!isset($customerid[0])){
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}
$fetchadmininfo='SELECT * FROM orders WHERE id="'.$orderid[0].'"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$order= 'UPDATE orders SET status="READY",orderstart='.'CURRENT_TIME,WHERE id="'.$orderid[0].''; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();
$isupdated= $dispatchorder->rowCount();


if($isupdated>0){
echo '[{"message":"Sorry! your order was canceled":"'.$ordertime.'"}]';





}else{
	echo '[{"message":"something went wrong","order time":"'.$ordertime.'"}]'
http_response_code(400)
}
}

?>