<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
preg_match('/(?<=orderid":").+?(?=")/',$post,$orderid);

if(!isset($customerid[0])){
preg_match('/(?<=orderid=).+?(?=&|$)/',$post,$orderid);
}
$fetchadmininfo='SELECT * FROM orders WHERE id="'.$orderid[0].'"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$date=date("Y-m-d h:i:s",time());
$strdate=strval($date);
$enddate=strtotime(''.$strdate.' +'.$minutes_to_add.' minutes')
$ordertime=date("Y-m-d h:i:s",$enddate);

$order= 'UPDATE orders SET status="ACCEPTED",orderstart='.'CURRENT_TIME,orderend="'.$ordertime.',ordertotaltime="'.$ordertotaltime.'" " WHERE id="'.$orderid[0].''; 
$dispatchorder= $conn->prepare($order);
$dispatchorder->execute();
$isupdated= $dispatchorder->rowCount();


if($isupdated>0){
echo '[{"message":"Your order will be ready at '.$ordertime.'":"'.$ordertime.'"}]';


$fetchadmininfo='SELECT * FROM orderelements WHERE ordernumber="'.$orderid[0].'"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
preg_match('/(?<=item":").+?(?=")/',json_encode($row),$item);
preg_match('/(?<=count":").+?(?=")/',json_encode($row),$count);
$countupdate= 'UPDATE items SET timesold=timesold+$count[0] WHERE id="'.$item[0].''; 
$updatecount= $conn->prepare($countupdate);
$updatecount->execute();
endwhile;












}else{
	echo '[{"message":"Your order was not accepted","order time":"'.$ordertime.'"}]'
http_response_code(400)
}
}

?>