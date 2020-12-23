<?php
require 'connect.php';
require 'sql.php';
require 'pushnotification.php';
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderstart=date('yy-m-d H:i:s');
$timeforready='SELECT OE.'.'item,OE.count,I.timesamples,I.preparetime FROM orderelements OE, items I where I.id=OE.item and OE.ordernumber="'.$orderid.'"';

$MyJsonData1=sql_selectdata($timeforready,$conn);
preg_match_all('/(?<=preparetime":").+?(?=")/',$MyJsonData1,$preparetime);
preg_match_all('/(?<=timesamples":").+?(?=")/',$MyJsonData1,$timesamples);
preg_match_all('/(?<=count":").+?(?=")/',$MyJsonData1,$count);
$fullprepare=0;
for ($i=0; $i <count($preparetime[0]) ; $i++) { 

if($timesamples[0][$i]=='1'){

$fullprepare=intval($fullprepare)+intval($preparetime[0][$i]);


}elseif($timesamples[0][$i]=='0'){

$fullprepare=intval($fullprepare)+(intval($preparetime[0][$i])*intval($count[0][$i]));
}






}
$minutes_to_add = $fullprepare;

$time = new DateTime($orderstart);
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

$stamp = $time->format('Y-m-d H:i:s');

$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($getorderid,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
pushnotifications($customer[0],'your order number '.$orderid.' has been accepted',' تم قبول طلبك رقم '.$orderid,'your order is being made','طلبك قيد الاعداد الان');

$accept='UPDATE orders set status="ACCEPTED",orderstart="'.$orderstart.'",orderend="'.$stamp.'" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);

header('location:http://localhost/foodtruck/adminpanelft/pendingorders');
}else{
	header('location:http://localhost/foodtruck/adminpanelft/pendingorders');
}






}