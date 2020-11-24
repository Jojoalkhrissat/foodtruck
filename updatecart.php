<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=cartid":").+?(?=")/',$post,$cartid);
preg_match('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid)&&!isset($cartid)&&!isset($count)){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=cartid=).+?(?=&|$)/',$post,$cartid);
preg_match('/(?<=count=).+?(?=&|$)/',$post,$count);
}
if(isset($count)&&isset($cartid[0])&&isset($itemid)){




for($i=0;$i<count($itemid);$i++){
if($count[$i]>0){
$updatecount= 'UPDATE orderelements set count='.$count[$i].' where ordernumber='.$cartid[0].' and item='.$itemid[$i].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();

}else{
$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$cartid[0].' and item='.$itemid[$i].'';
$stmt= $conn->prepare($deleteitem);
$stmt->execute();
}
}
echo '{"message":"Cart Updated"}';
}else{
http_response_code(400);
$itemid[0]="Not Valid";
$count[0]="Not Valid";
$customerid[0]="Not Valid";
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
}
catch(Exception $e){

}
}else{
	http_response_code(400);
echo '{"message":"Bad Request"}';
}
?>