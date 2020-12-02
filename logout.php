<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
}


$removetoken='DELETE FROM `deviceindex` WHERE customer="'.$customerid[0].'"';
sql_delete($removetoken,$conn);





}catch(Exception $e){
http_response_code(400);
}
}else{
http_response_code(400);
}
?>