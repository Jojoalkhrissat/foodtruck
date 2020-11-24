<?php

require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$orderid=isset($_GET['orderid'])?$_GET['orderid']:"";
if($orderid!=""){
try{
	echo "[";
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear, I.photo, I.price*OE.count as price FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status!='CART' and O.id=".$orderid."";

$getcartitems = $conn->query($cartitems);
$getcartitems->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcartitems->rowCount();
while($row = $getcartitems->fetch()):
$jsonrow=json_encode($row);
$MyJsonData1=$MyJsonData1.','.$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
echo $MyJsonData1;






echo "]";
}catch(Exception $e){
	http_response_code(400);
echo "400 bad request";	
}

}else{
	http_response_code(400);
echo "400 baad request";
}


}else{
	http_response_code(400);
echo "400 baaad request";
}
?>