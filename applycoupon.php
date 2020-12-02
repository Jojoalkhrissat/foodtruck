<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{

	$post = file_get_contents('php://input');
preg_match('/(?<=cartid":").+?(?=")/',$post,$cartid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=couponcode":").+?(?=")/',$post,$couponcode);
if(!isset($cartid[0])&&!isset($password[0])){
preg_match('/(?<=cartid=).+?(?=&|$)/',$post,$cartid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=couponcode=).+?(?=&|$)/',$post,$couponcode);
}







$getcouponid='SELECT * FROM coupons WHERE couponcode="'.$couponcode[0].'"';
$MyJsonData=sql_selectdata($getcouponid,$conn);
$count=sql_selectcount($getcouponid,$conn);
 $MyJsonData=preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=validdatestart":").+?(?=")/',$MyJsonData,$validdatestart);
preg_match('/(?<=validdateend":").+?(?=")/',$MyJsonData,$validdateend);


if($count>0){
$checkcoupon='SELECT * FROM orders WHERE coupon="'.$id[0].'" and customer="'.$customerid[0].'"';

$coupounappliedbefore=sql_selectcount($checkcoupon,$conn);
$MyJsonData1=sql_selectdata($checkcoupon,$conn);	

 $MyJsonData1=preg_replace('/,/', '', $MyJsonData1, 1);

if($coupounappliedbefore==0){










   
// $currentDate = date('Y-m-d');
// $currentDate = date('Y-m-d', strtotime($currentDate));
   
// $startDate = date('Y-m-d', strtotime($validdatestart[0]));
// $endDate = date('Y-m-d', strtotime($validdateend[0]));
   
// if (($currentDate >= $startDate) && ($currentDate <= $endDate)){
//     $MyJsonData=preg_replace('/\}/', ',"valid":"true"}', $MyJsonData, 1);
	// $addcoupon= 'UPDATE orders set coupon="'.$id[0].'" where customer="'.$customerid[0].'" and status="CART"'; 
// $applycoupon= $conn->prepare($addcoupon);
// $applycoupon->execute();
// }else{
//     $MyJsonData=preg_replace('/\}/', ',"valid":"false"}', $MyJsonData, 1);
// }


echo "[";
echo $MyJsonData;
echo "]";



}else{

echo '{"Message":"you applied this coupon before"}';	
http_response_code(401);
}

}else{

echo '{"Message":"this coupon doesn\'t exist"}';
http_response_code(401);

}


}catch(Exception $e){
http_response_code(400);
echo "400 bad request";	
}
}else{






	http_response_code(400);
echo "400 bad request";	
}