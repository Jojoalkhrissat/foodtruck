<?php

require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	echo "[";
	

$cartitems='SELECT O.'.'id,O.shop, O.description, O.orderstart, O.orderend, O.ordertotaltime, O.status, O.coupon,O.orderprice FROM orders O,orderelements OE,items I WHERE OE.ordernumber=O.id and OE.item=I.id and O.status!="CART" and O.customer='.$customerid.' GROUP BY O.id order by O.orderstart desc';
$MyJsonData1=sql_selectdata($cartitems,$conn);

preg_match_all('/(?<=orderstart":"\d\d\d\d\-\d\d\-\d\d ).+?(?=")/',$MyJsonData1,$ordertime);
for ($i=0; $i < count($ordertime[0]); $i++) { 
$MyJsonData1=	preg_replace('/(?<=orderstart":"\d\d\d\d\-\d\d\-\d\d \d\d\:\d\d\:\d\d")\,/', ',"orderstarttime":"'.$ordertime[0][$i].'",', $MyJsonData1,$i+1);
}
preg_match_all('/(?<=coupon":").+?(?=")/',$MyJsonData1,$coupon);
preg_match_all('/(?<=orderprice":").+?(?=")/',$MyJsonData1,$orderprice);
if(isset($coupon[0])){











for($i=0;$i<count($coupon[0]);$i++){
$coup='SELECT * FROM `coupons` WHERE id='.$coupon[0][$i].'';
$MyJsonData=sql_selectdata($getcoup,$conn);
preg_match('/(?<=discount":").+?(?=")/',$MyJsonData,$discount);



$totalprice=doubleval($orderprice[0][$i])*doubleval($discount[0]);

$MyJsonData1=preg_replace('/(?<=orderprice":").+?(?=")/',$totalprice ,$MyJsonData1 ,$i+1);


}
}
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