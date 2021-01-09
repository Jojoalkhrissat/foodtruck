<?php
require "../connect.php";
require "../sql.php";
require 'pushnotification.php';   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($getorderid,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
preg_match('/(?<=refid":").+?(?=")/',$MyJsonData,$token);
preg_match('/(?<=token":").+?(?=")/',$MyJsonData,$refid);
preg_match('/(?<=brand":").+?(?=")/',$MyJsonData,$brand);
preg_match('/(?<=paymentmethod":").+?(?=")/',$MyJsonData,$paymentmethod);
preg_match('/(?<=amount":").+?(?=")/',$MyJsonData,$amount);
pushnotifications($customer[0],'your order was sadly rejected','لقد تم رفض طلبك','your order was cancelled','لقد تم الغاء الطلب');


$accept='UPDATE orders set status="CANCELED" WHERE id="'.$orderid.'"';
sql_update($accept,$conn);
header('location:'.$baseurl.'/adminpanelft/pendingorders');

}else{
	header('location:'.$baseurl.'/adminpanelft/pendingorders');
}
$len= strlen(substr(strrchr($amount[0], "."), 1));
if($amount[0]>10){
$amount[0]=number_format($amount[0], 2);
$amount[0]='0'.$amount[0];

}
if($len==1){
$amount[0]=$amount[0].'0';    
}
echo $refid[0];
// if($paymentmethod[0]=='ONLINE'){
// $tok=explode(".",$refid[0]);
// $url = "https://test.oppwa.com/v1/payments/".$tok[0]."";

// if($brand[0]=='VISA'||$brand[0]=='MASTER'){






	
// 	$data = "entityId=8ac7a4c8765289b001765d5ee2fc15ac" .
//                 "&paymentType=RV".
//                 "&currency=SAR".
//                 "&referencedPaymentId=".$token[0].
//                 "&amount=".$amount[0]."";

// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                    'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
// 	curl_setopt($ch, CURLOPT_POST, 1);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$responseData = curl_exec($ch);
// 	echo $responseData;
// 	curl_close($ch);



// }elseif($brand[0]=='MADA'){

// 	$data = "entityId=8ac7a4c8765289b001765d601d8a15b1" .
//                 "&paymentType=RV".
//                 "&currency=SAR".
//                 "&referencedPaymentId=".$token[0].
//                 "&amount=".$amount[0]."";

// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                    'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
// 	curl_setopt($ch, CURLOPT_POST, 1);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$responseData = curl_exec($ch);
// 	echo $responseData;
// 	curl_close($ch);


// }
// // header('location:'.$baseurl.'/adminpanelft/pendingorders');

// }






}


