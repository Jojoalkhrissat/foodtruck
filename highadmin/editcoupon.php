<?php
require "../connect.php";

	function time_to_decimal($time) {
    $timeArr = explode(':', $time);
    $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
 
    return $decTime;
}



function RandomCode($length)
{
    $code = '';
    $total = 0;

    do
    {
        if (rand(0, 1) == 0)
        {
            $code.= chr(rand(97, 122)); // ASCII code from **a(97)** to **z(122)**
        }
        else
        {
            $code.= rand(0, 9); // Numbers!!
        }
        $total++;
    } while ($total < $length);

    return $code;
}
  session_start();
$id=$_SESSION['coupon'];



$couponname=isset($_POST['couponname'])&&$_POST['couponname']!=''?$_POST['couponname']:$_SESSION['couponname_'.$id];

$discount=isset($_POST['discount'])&&$_POST['discount']!=''?$_POST['discount']/100:$_SESSION['discount_'.$id];
$shop=isset($_POST['shop'])&&$_POST['shop']!=''?$_POST['shop']:$_SESSION['shop_'.$id];
$validdatestart=isset($_POST['validdatestart'])&&$_POST['validdatestart']!=''?$_POST['validdatestart']:$_SESSION['validdatestart_'.$id];
$validdateend=isset($_POST['validdateend'])&&$_POST['validdateend']!=''?$_POST['validdateend']:$_SESSION['validdateend_'.$id];







$admin= 'INSERT INTO `coupons`(`couponname`, `shop`, `validdatestart`, `validdateend`,`discount`) VALUES ("'.$couponname.'", "'.$shop.'", "'.$validdatestart.'", "'.$validdateend.'","'.$discount.'")';





















































header('location:'.$baseurl.'/highadmin/coupondetails?coupon='.$id);


?>