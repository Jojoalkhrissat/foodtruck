<?php
require "../connect.php";
require "../sql.php";   
session_start();

if(isset($_GET['ordernumber'])){
$orderid=$_GET['ordernumber'];




$accept='UPDATE orders set status="CANCELED" WHERE id="'.$orderid.'"';
sql_update($accept,$conn);

header('location:'.$baseurl.'/highadmin/pendingorders');
}else{
	header('location:'.$baseurl.'/highadmin/pendingorders');
}






