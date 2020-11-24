<?php

require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	echo "[";
	$MyJsonData="";
$MyJsonData1="";
$cartitems='SELECT O.'.'id,O.shop, O.description, O.orderstart, O.orderend, O.ordertotaltime, O.status, O.coupon,O.orderprice FROM orders O,orderelements OE,items I WHERE OE.ordernumber=O.id and OE.item=I.id and O.status!="CART" and O.customer='.$customerid.' GROUP BY O.id order by O.orderstart desc';

$getcartitems = $conn->query($cartitems);
$getcartitems->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcartitems->rowCount();
while($row = $getcartitems->fetch()):
$jsonrow=json_encode($row);
preg_match('/(?<=orderstart":"\d\d\d\d\-\d\d\-\d\d ).+?(?=")/',$jsonrow,$ordertime);
$jsonrow = preg_replace('/(?<=orderstart":"\d\d\d\d\-\d\d\-\d\d \d\d\:\d\d\:\d\d")\,/', ',"orderstarttime":"'.$ordertime[0].'",', $jsonrow);





$MyJsonData1=$MyJsonData1.','.$jsonrow;




endwhile;
preg_match('/(?<=coupon":").+?(?=")/',$MyJsonData1,$coupon);
preg_match('/(?<=orderprice":").+?(?=")/',$MyJsonData1,$orderprice);




$coup='SELECT * FROM `coupons` WHERE id='.$coupon[0].'';
$getcoup = $conn->query($coup);
$getcoup->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcoup->rowCount();
$MyJsonData="";
while($row = $getcoup->fetch()):
$jsonrow=json_encode($row);
$MyJsonData=$MyJsonData.','.$jsonrow;
endwhile;
preg_match('/(?<=discount":").+?(?=")/',$MyJsonData,$discount);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);




for($i=0;$i<count($coupon);$i++){






$totalprice=doubleval($orderprice[$i])*doubleval($discount[$i]);

$MyJsonData1=preg_replace('/(?<=orderprice":").+?(?=")/',$totalprice ,$MyJsonData1 ,$i+1);


}

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