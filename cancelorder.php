<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);

if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}


$order= 'UPDATE orders SET status="CANCELLED",ordertime='.'CURRENT_TIME WHERE id="'.$orderid[0].'"'; 
sql_update($order,$conn);





echo '[{"message":"Your order is now cancelled"}]';





}else{
	echo '[{"message":"Your order was not cancelled"}]'
http_response_code(400)
}

?>