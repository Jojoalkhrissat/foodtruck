<?php
$dsn = "mysql:host=localhost;dbname=pixels";
$user = "root";
$passwd = "";
try{
$conn=new PDO($dsn,$user,$passwd);

}
catch(Exception $e) {
echo "System Error";
} 
$headers = apache_request_headers();
foreach ($headers as $header => $value):
endforeach;
?>