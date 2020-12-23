<?php
require "connect.php";

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
$couponname=$_POST['couponname'];
$couponcode=RandomCode(7);
$discount=$_POST['discount']/100;
$shop=$_POST['shop'];
$validdatestart=$_POST['validdatestart'];
$validdateend=$_POST['validdateend'];







$admin= 'INSERT INTO `coupons`(`couponname`, `couponcode`, `shop`, `validdatestart`, `validdateend`,`discount`) VALUES ("'.$couponname.'", "'.$couponcode.'", "'.$shop.'", "'.$validdatestart.'", "'.$validdateend.'","'.$discount.'")';





















































header('location:http://localhost/foodtruck/highadmin/coupon');


?>