<?php
require "connect.php";
require "sql.php";
require "pushnotification.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$post = file_get_contents('php://input');
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=description":").+?(?=")/',$post,$description);
preg_match('/(?<=couponid":").+?(?=")/',$post,$couponid);
preg_match('/(?<=paymentmethod":").+?(?=")/',$post,$paymentmethod);
if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=description=).+?(?=&|$)/',$post,$description);
preg_match('/(?<=couponid=).+?(?=&|$)/',$post,$couponid);
preg_match('/(?<=paymentmethod=).+?(?=&|$)/',$post,$paymentmethod);
}

if($paymentmethod[0]=="CASH"){

if($couponid[0]=="None"){
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$MyJsonData=sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
// $minutes_to_add=intval($timeforready[0]);





pushnotifications($shop[0],'you have an order to make','لديك طلب لتصنعه','client number '.$customerid[0].' has ordered from you','العميل رقم '.$customerid[0].'قد طلب منك طلب');




$getitemquantity='SELECT OE'.'.item,OE.count,I.itemname,I.quantity from orderelements OE, items I where OE.item=I.id and OE.ordernumber='.$id[0].'';
$MyJsonData5=sql_selectdata($getitemquantity,$conn);
preg_match_all('/(?<=item":").+?(?=")/',$MyJsonData5,$item);
preg_match_all('/(?<=count":").+?(?=")/',$MyJsonData5,$count);
preg_match_all('/(?<=quantity":").+?(?=")/',$MyJsonData5,$quantity);


for($i=0;$i<count($item[0]);$i++){

$order= 'UPDATE items SET quantity=quantity-'.intval($count[0][$i]).' WHERE id="'.$item[0][$i].'"'; 
sql_update($order,$conn);



}

if(!isset($description[0])||$description[0]=""){
$description[0]==" ";
}







$order= 'UPDATE orders SET description="'.$description[0].'",status="IN DISPATCH",paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
sql_update($order,$conn);

}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$MyJsonData=sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
// $minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid[0].',paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 

sql_update($order,$conn);
$couponused= 'UPDATE coupons SET timesused=timesused+1 where id='.$couponid.[0]'';
sql_update($couponused,$conn);
}



}elseif($paymentmethod[0]=="ONLINE"){

if($couponid[0]=="None"){
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$MyJsonData=sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
// $minutes_to_add=intval($timeforready[0]);

$getitemquantity='SELECT OE'.'.item,OE.count,I.itemname,I.quantity from orderelements OE, items I where OE.item=I.id and OE.ordernumber='.$id[0].'';
$MyJsonData5=sql_selectdata($getitemquantity,$conn);
preg_match_all('/(?<=item":").+?(?=")/',$MyJsonData5,$item);
preg_match_all('/(?<=count":").+?(?=")/',$MyJsonData5,$count);
preg_match_all('/(?<=quantity":").+?(?=")/',$MyJsonData5,$quantity);


for($i=0;$i<count($item[0]);$i++){

$order= 'UPDATE items SET quantity=quantity-'.intval($count[0][$i]).' WHERE id="'.$item[0][$i].'"'; 
sql_update($order,$conn);



}

if(!isset($description[0])||$description[0]=""){
$description[0]==" ";
}







$order= 'UPDATE orders SET description="'.$description[0].'",status="IN DISPATCH",paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
sql_update($order,$conn);

}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$MyJsonData=sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
# preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
// $minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid[0].',paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 

sql_update($order,$conn);
$couponused= 'UPDATE coupons SET timesused=timesused+1 where id='.$couponid.[0]'';
sql_update($couponused,$conn);
}



}




}else{
	echo '[{"message":"Your order was not completed","order time":"'.$ordertime.'"}]';
http_response_code(400);
}

?>