<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=count=).+?(?=&|$)/',$post,$count);
}
if(isset($count[0])&&isset($customerid[0])&&isset($itemid[0])){
$MyJsonData1="";
$MyJsonData="";	
$itemspersub="SELECT * FROM `orders` WHERE customer=".$customerid[0]." and status='CART'";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);




$MyJsonData1="";	
$itemspersub="SELECT * FROM `orderelements` WHERE ordernumber=".$id[0]." and item=".$itemid[0]."";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
preg_match('/(?<=count":").+?(?=")/',$MyJsonData1,$Count);









if(isset($Count[0])){

if($Count[0]==$count[0]){
$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$id[0].' and item='.$itemid[0].'';
$stmt= $conn->prepare($deleteitem);
$stmt->execute();


}elseif($Count[0]>$count[0]){
	$count[0]=$Count[0]-$count[0];
$updatecount= 'UPDATE orderelements set count='.$count[0].' where ordernumber='.$id[0].' and item='.$itemid[0].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();




}else{
$isinserted=0;
$Count[0]=0;
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"you can not remove more than you have"}';
$isinserted=0;

http_response_code(400);
}
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"removed from cart"}';

}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not removed"}';
}
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
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
?>