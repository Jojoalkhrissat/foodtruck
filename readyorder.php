<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);

if(!isset($orderid[0])){
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}

$order= 'UPDATE orders SET status="READY",orderstart='.'CURRENT_TIME,WHERE id="'.$orderid[0].''; 
sql_update($order,$conn);
$ordertime=CURRENT_TIME();


echo '[{"message":"Sorry! your order was canceled":"'.$ordertime.'"}]';





}else{
	echo '[{"message":"something went wrong","order time":"'.$ordertime.'"}]'
http_response_code(400)
}
}

?>