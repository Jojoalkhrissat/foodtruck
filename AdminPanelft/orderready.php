<?php
require 'connect.php';
require 'sql.php';  
require 'pushnotification.php';   
session_start();
if(isset($_SESSION['id'])){
if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];

$orderend=date('yy-m-d H:i:s');








$getorderid='SELECT * from orders where id="'.$orderid.'"';
$MyJsonData=sql_selectdata($getorderid,$conn);
preg_match('/(?<=customer":").+?(?=")/',$MyJsonData,$customer);

pushnotifications($customer[0],'your order number '.$orderid.' is ready','طلبك رقم '.$orderid.' جاهز','your order is ready for pick up','الرجاء استلام طلبك');


















$accept='UPDATE orders set status="READY",orderend="'.$orderend.'" WHERE id="'.$orderid.'" ';
sql_update($accept,$conn);















header('location:http://localhost/foodtruck/adminpanelft/ordersinprogress');
}else{
	header('location:http://localhost/foodtruck/adminpanelft/ordersinprogress');
}






}