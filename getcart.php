<?php
require "connect.php";
require "sql.php";
require "functions.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	$current_time=date("H:i:s",time());
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear,ROUND(I.price,2 ) as price, I.photo, ROUND(I.price*OE.count,2) as fullprice FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status='CART' and O.customer=".$customerid."";
$MyJsonData1=sql_selectdata($cartitems,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData1,$id);


if(isset($id[0])){



$shopava= 'SELECT opentime,closetime  from shop where id="'.$id[0].'"';
$MyJsonData=sql_selectdata($shopava,$conn);
preg_match('/(?<=opentime":").+?(?=")/',$MyJsonData,$opentime);
preg_match('/(?<=closetime":").+?(?=")/',$MyJsonData,$closetime);

if (TimeIsBetweenTwoTimes($current_time, $opentime[0], $closetime[0])){
$MyJsonData1 = str_replace('"shop":"'.$id[0].'"', '"shop":"'.$id[0].'","available":"true"', $MyJsonData1);

}
else{

$MyJsonData1 = str_replace('"shop":"'.$id[0].'"', '"shop":"'.$id[0].'","available":"false"', $MyJsonData1);

}


}else{
	
}


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