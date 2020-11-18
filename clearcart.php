<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try{
	$post = file_get_contents("php://input");
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);
if(!isset($orderid[0])){
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}
$clearcart= "DELETE from orderelements where ordernumber=$orderid[0]";
$stmt= $conn->prepare($clearcart);
$stmt->execute();






$MyJsonData="";	
$deletecart= "DELETE from orders where id=$orderid[0]";
$stamt= $conn->prepare($deletecart);
$stamt->execute();
$isdeleted=$stamt->rowCount();
if($isdeleted>0){
echo '{"Message":"Cart emptied"}';


}else{
http_response_code(400);
echo '{"Message":"Cart is already empty"}';


	}

}catch(Exception $e){

}
}
?>