<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=reviewid":").+?(?=")/',$post,$reviewid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=comments":").+?(?=")/',$post,$comments);

if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=reviewid=).+?(?=&|$)/',$post,$reviewid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=comments=).+?(?=&|$)/',$post,$comments);

}






$report= 'INSERT INTO `reportreview`(`reviewid`, `comment`, `customerid`) VALUES ("'.$reviewid[0].'","'.$comments[0].'","'.$customerid[0].'")';
$reportreview= $conn->prepare($report);
$reportreview->execute();
$count=$reportreview->rowCount();

if($count==1){
echo '[{"message":"you reported this review"}]';	
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