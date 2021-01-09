<?php
require "../connect.php";
require "../sql.php";
require 'pushnotification.php';   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderend=date('yy-m-d H:i:s');
$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($getorderid,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData,$shop);
pushnotifications($customer[0],'your order has been received','تم تسليم الطلب','your order was successfully received','لقت استلمت طلبك بنجاح');

$accept='UPDATE orders set status="COMPLETE" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);

header('location:'.$baseurl.'/adminpanelft/readyorders');
}else{
	header('location:'.$baseurl.'/adminpanelft/readyorders');
}






}