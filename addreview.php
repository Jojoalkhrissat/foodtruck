<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=comments":").+?(?=")/',$post,$comments);
preg_match('/(?<=rating":").+?(?=")/',$post,$rating);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=comments=).+?(?=&|$)/',$post,$comments);
preg_match('/(?<=rating=).+?(?=&|$)/',$post,$rating);
}






$rating= 'INSERT INTO `feedback`(`itemid`, `customer`, `type`, `comments`, `rating`, `date`) VALUES ("'.$itemid[0].'","'.$customerid[0].'","ITEM","'.$comments[0].'","'.$rating[0].'"';
$createrating= $conn->prepare($rating);
$createrating->execute();
$count=$createrating->rowCount();

if($count==1){
echo '[{"message":"your review was entered"}]';	
}else{
http_response_code(400);
	echo '[{"message":"something went wrong"}]';	

}



}catch(Exception $e){
http_response_code(400);
	echo '[{"message":"something went wrong"}]';	
}




}else{
http_response_code(400);
	echo '[{"message":"something went wrong"}]';

}


?>