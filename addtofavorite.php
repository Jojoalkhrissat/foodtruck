<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try{
	$post = file_get_contents("php://input");

preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
}
$MyJsonData="";	
$favorites= "INSERT INTO `favorites`(`ItemId`,`CustomerId`) VALUES ($itemid[0],$customerid[0])";
$stmt= $conn->prepare($favorites);
$stmt->execute();
$isinserted= $stmt->rowCount();
if($isinserted>0){
echo "favorite saved";


}else{
http_response_code(400);
echo "favorite already exists";


	}
}
catch(Exception $e){

}
}
?>