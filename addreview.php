<?php
require "connect.php";
require "sql.php";
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
$newrating=$rating[0]*2;
$newrating=intval($newrating);


$getfeedback='SELECT * FROM `feedback` WHERE itemid='.$itemid[0].' and customer='.$customerid[0].'';
$count=sql_selectcount($getfeedback,$conn);

if($count==0){



$rate= 'INSERT INTO `feedback`(`itemid`, `customer`, `type`, `comments`, `rating`) VALUES ("'.$itemid[0].'","'.$customerid[0].'","ITEM","'.$comments[0].'","'.$newrating.'")';
sql_insert($rate,$conn);



echo '[{"message":"your rating was added"}]';	








}else{
http_response_code(401);
	echo '[{"message":"you can\'t add more than 1 review"}]';


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