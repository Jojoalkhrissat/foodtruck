<?php

require '../connect.php';
require '../sql.php';


session_start();
$shop=$_SESSION['id'];
$shoplat=$_POST['shoplat'];
$shoplong=$_POST['shoplong'];


$updateloc='update shop set location="'.$shoplat.','.$shoplong.'" where id="'.$shop.'"';
echo $shoplat.','. $shoplong;

sql_update($updateloc,$conn);
$newloc='SELECT * from shop where id="'.$shop.'"';
$MyJsonData=sql_selectdata($newloc,$conn);
preg_match('/(?<=location":").+?(?=")/',$MyJsonData,$location);

$_SESSION['location']=$location[0];



header('location:'.$baseurl.'/adminpanelft/profile');


?>