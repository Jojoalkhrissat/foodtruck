<?php
require "../connect.php";
require "../sql.php";
require 'pushnotifications.php';   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderend=date('yy-m-d H:i:s');
$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($accept,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
pushnotifications($customer[0],'your order is ready','طلبك جاهز','your order is now ready for pickup','طلبك جاهز للاستلام, يرجى استلام الطلب');

$accept='UPDATE orders set status="READY",orderend="'.$orderend.'" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);

header('Location: '.$baseurl.'/adminpanel/ordersinprogress');
}else{
	header('Location: '.$baseurl.'/adminpanel/ordersinprogress');
}






}