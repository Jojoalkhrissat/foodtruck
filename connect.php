<?php
date_default_timezone_set ('Asia/Amman');
$dsn = "mysql:host=localhost;dbname=foodtruck2;charset=utf8";
$user = "root";
$passwd = "";
try{
$conn=new PDO($dsn,$user,$passwd);
$baseurl='http://localhost/foodtruck';
}
catch(Exception $e) {
echo "System Error";
} 
$headers = apache_request_headers();
foreach ($headers as $header => $value):
endforeach;
?>