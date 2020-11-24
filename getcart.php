<?php

require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear, I.photo, I.price*OE.count as price FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status='CART' and O.customer=".$customerid."";
$getcartitems = $conn->query($cartitems);
$getcartitems->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcartitems->rowCount();
while($row = $getcartitems->fetch()):
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=itemnamear":).+?(?=,)/','"'.$row['itemnamear'].'"', $jsonrow);
$jsonrow=preg_replace('/(?<=price":).+?(?=,)/','"'.round(doubleval($row['price']), 3).'"', $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
if($resultcount==0){
// $MyJsonData1='{"Message":"cart is empty"}';
// http_response_code(400);


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