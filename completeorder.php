<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$post = file_get_contents('php://input');
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=description":").+?(?=")/',$post,$description);
preg_match('/(?<=couponid":").+?(?=")/',$post,$couponid);
preg_match('/(?<=paymentmethod":").+?(?=")/',$post,$paymentmethod);
preg_match('/(?<=amount":").+?(?=")/',$post,$amount);
preg_match('/(?<=currency":").+?(?=")/',$post,$currency);
preg_match('/(?<=paymentbrand":").+?(?=")/',$post,$paymentbrand);
preg_match('/(?<=cardnumber":").+?(?=")/',$post,$cardnumber);
preg_match('/(?<=cardholder":").+?(?=")/',$post,$cardholdername);
preg_match('/(?<=cardexpiryYear":").+?(?=")/',$post,$cardexpiaryyear);
preg_match('/(?<=cardexpiryMonth":").+?(?=")/',$post,$cardexpiarymonth);
preg_match('/(?<=cardcvv":").+?(?=")/',$post,$cvv);
if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=description=).+?(?=&|$)/',$post,$description);
preg_match('/(?<=couponid=).+?(?=&|$)/',$post,$couponid);
preg_match('/(?<=amount=).+?(?=&|$)/',$post,$amount);
preg_match('/(?<=currency=).+?(?=&|$)/',$post,$currency);
preg_match('/(?<=paymentbrand=).+?(?=&|$)/',$post,$paymentbrand);
preg_match('/(?<=cardnumber=).+?(?=&|$)/',$post,$cardnumber);
preg_match('/(?<=cardholder=).+?(?=&|$)/',$post,$cardholdername);
preg_match('/(?<=cardexpiryYear=).+?(?=&|$)/',$post,$cardexpiaryyear);
preg_match('/(?<=cardexpiryMonth=).+?(?=&|$)/',$post,$cardexpiarymonth);
preg_match('/(?<=cardcvv=).+?(?=&|$)/',$post,$cvv);
}

if($paymentmethod[0]=="CASH"){

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







$order= 'UPDATE orders SET description="'.$description[0].'",status="IN DISPATCH",paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
sql_update($order,$conn);

}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
$MyJsonData=sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid.',paymentmethod="CASH",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 

sql_update($order,$conn);

}



}elseif($paymentmethod[0]=="ONLINE"){
if(isset($cardnumber[0])){
if($couponid[0]=="None"){
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
// $minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE customer="'.$customerid[0].'" and status="CART"'; 
sql_update($order,$conn);
echo "[";

$url = "https://test.oppwa.com/v1/payments";
	$data = "entityId=8ac7a4c8765289b001765d5ee2fc15ac" .
                "&amount=".$amount[0]."" .
                "&currency=SAR" .
                "&paymentBrand=".$paymentbrand[0]."" .
                "&paymentType=DB" .
                "&card.number=".$cardnumber[0]."" .
                "&card.holder=".$cardholdername[0]."" .
                "&card.expiryMonth=".$cardexpiarymonth[0]."" .
                "&card.expiryYear=".$cardexpiaryyear[0]."" .
                "&card.cvv=".$cvv[0]."" .
                "&recurringType=INITIAL" .
                "&createRegistration=true";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);

echo $responseData;
echo "]";
}else{
$getorder='SELECT * FROM orders WHERE customer="'.$customerid[0].'" and status="CART"';
sql_selectdata($getorder,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=timeforready":").+?(?=")/',$MyJsonData,$timeforready);
$minutes_to_add=intval($timeforready[0]);

$order= 'UPDATE orders SET status="IN DISPATCH",coupon='.$couponid.',paymentmethod="ONLINE",orderstart='.'CURRENT_TIME WHERE id="'.$id[0].'"'; 
sql_update($order,$conn);

}


// $paymentmethod= "INSERT INTO `onlinepayment`(`customer`, `orderid`, `paymenttoken`) VALUES (".$customerid[0].",".$id[0].",'".$paymenttoken[0]."')";
// $stmt= $conn->prepare($paymentmethod);
// $stmt->execute();






}



}




}else{
	echo '[{"message":"Your order was not completed","order time":"'.$ordertime.'"}]';
http_response_code(400);
}

?>