<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear,I.price , I.photo, I.price*OE.count as fullprice FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status='CART' and O.customer=".$customerid."";
$MyJsonData1=sql_selectdata($cartitems,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);

echo "[";
echo $MyJsonData1;
echo ']';


}catch(Exception $e){
	http_response_code(400);
echo "400 bad request";	
}

}else{
	http_response_code(400);
echo "400 bad request";
}


}else{
	http_response_code(400);
echo "400 bad request";
}
?>