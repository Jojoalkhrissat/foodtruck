<?php
require "connect.php";
require "sql.php";
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
try{
$userlat=$_GET['userlat'];
$userlon=$_GET['userlon'];



$shop="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S GROUP by S.id";
$MyJsonData1=sql_selectdata($shop,$conn);


$current_time=date("H:i:s",time());


preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData1,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData1,$closetime);
preg_match_all('/(?<=location":").+?(?=\")/',$MyJsonData1,$location);

for ($i=0; $i <count($opentime[0]) ; $i++) { 
if(isset($location[0][$i])){
	$loc=explode(',',$location[0][$i]);

	$distance=intval(distance(floatval($userlat), floatval($userlon), floatval($loc[0]), floatval($loc[1]), "K"));
}else {
	$distance=10000;
}

if($distance<=10){
$MyJsonData1 = preg_replace('/\}/', ',"distance":"'.$distance.'","close":"true"}', $MyJsonData1, $i+1);





if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData1 = preg_replace('/\}/', ',"available":"true"}', $MyJsonData1, $i+1);

}
else{
$MyJsonData1 = preg_replace('/\}/', ',"available":"false"}', $MyJsonData1, $i+1);
}




}else{
	$MyJsonData1 = preg_replace('/\}/', ',"distance":"'.$distance.'","close":"false"}', $MyJsonData1, $i+1);
if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData1 = preg_replace('/\}/', ',"available":"true"}', $MyJsonData1, $i+1);

}
else{
$MyJsonData1 = preg_replace('/\}/', ',"available":"false"}', $MyJsonData1, $i+1);
}

}


}



$MyJsonData1=preg_replace('/\,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
echo "[";
echo $MyJsonData1;
echo "]";


}catch(Exception $e){
http_response_code(400);
}

}else{
echo '[{"message":"there are no shops near you"}]';	
}



?>





