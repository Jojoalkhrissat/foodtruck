<?php
require "connect.php";


function TimeIsBetweenTwoTimes($from, $till, $input) {
    $f = DateTime::createFromFormat('H:i:s', $from);
    $t = DateTime::createFromFormat('H:i:s', $till);
    $i = DateTime::createFromFormat('H:i:s', $input);
    if ($f > $t) $t->modify('+1 day');
	return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
try{
$userlat=$_GET['userlat'];
$userlon=$_GET['userlon'];




echo "[";
$shop="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S GROUP by S.id";
$getshop = $conn->query($shop);
$getshop->setFetchMode(PDO::FETCH_ASSOC);
$count=$getshop->rowCount();
if($count>0){
$MyJsonData1="";
$current_time=date("H:i:s",time());
while($row = $getshop->fetch()):
$jsonrow=json_encode($row);
preg_match('/(?<=opentime":").+?(?=")/',$jsonrow,$opentime);
preg_match('/(?<=closetime":").+?(?=")/',$jsonrow,$closetime);
preg_match('/(?<=location":").+?(?=\")/',$jsonrow,$location);
$distance=0;
if(isset($location[0])){


$loc=explode(',',$location[0]);


$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=shopnamear":").+?(?=")/',$row['shopnamear'], $jsonrow);




$distance=distance(floatval($userlat), floatval($userlon), floatval($loc[0]), floatval($loc[1]), "K");




}

if($distance<=10){
$jsonrow = preg_replace('/\}/', ',"distance":"'.$distance.'"}', $jsonrow, 1);





if (TimeIsBetweenTwoTimes($current_time, $opentime[0], $closetime[0])){
$jsonrow = preg_replace('/\}/', ',"available":"true"}', $jsonrow, 1);

}
else{
$jsonrow = preg_replace('/\}/', ',"available":"false"}', $jsonrow, 1);
}
$MyJsonData1=$MyJsonData1.",".$jsonrow;

}else{


}



endwhile;

$MyJsonData1=preg_replace('/\,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
echo $MyJsonData1;
echo "]";
}else{
echo '[{"message":"there are no shops near you"}]';	
}

}catch(Exception $e){
http_response_code(400);
}



}

?>