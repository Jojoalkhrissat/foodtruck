<?php

require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	echo "[";
	

$cartitems='SELECT O.'.'id,O.shop, O.description, O.orderstart, O.orderend, O.ordertotaltime, O.status, O.coupon,sum((I.price*OE.count)-(I.price*OE.count*C.discount)) as orderprice FROM orders O,orderelements OE,items I,coupons C WHERE C.id=O.coupon and OE.ordernumber=O.id and OE.item=I.id and O.status!="CART" and O.customer='.$customerid.' GROUP BY O.id order by O.orderstart desc';
$MyJsonData1=sql_selectdata($cartitems,$conn);

preg_match_all('/(?<=orderstart":").+?(?=")/',$MyJsonData1,$ordertime);
for ($i=0; $i < count($ordertime[0]); $i++) {
 $ordertime[0][$i]=preg_replace('/ \d\d\:\d\d\:\d\d/', '', $ordertime[0][$i]);
$MyJsonData1=	preg_replace('/(?<=orderstart":"'.$ordertime[0][$i].' \d\d\:\d\d\:\d\d")\,/', ',"orderstarttime":"'.$ordertime[0][$i].'",', $MyJsonData1);
}

preg_match_all('/(?<=orderprice":").+?(?=")/',$MyJsonData1,$orderprice);
for($i=0;$i<count($orderprice[0]);$i++){

$MyJsonData1=preg_replace('/'.$orderprice[0][$i].'/',round($orderprice[0][$i]),$MyJsonData1);







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