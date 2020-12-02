<?php
require "connect.php";
require "sql.php";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
$orderid=isset($_GET['orderid'])?$_GET['orderid']:"";
if($orderid!=""){
try{
	
	
$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear, I.photo, I.price*OE.count as price FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status!='CART' and O.id=".$orderid."";

$MyJsonData1 = sql_selectdata($cartitems,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);



echo "[";
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