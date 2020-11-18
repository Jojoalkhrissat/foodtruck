<?php
require "connect.php";

	function TimeIsBetweenTwoTimes($from, $till, $input) {
    $f = DateTime::createFromFormat('H:i:s', $from);
    $t = DateTime::createFromFormat('H:i:s', $till);
    $i = DateTime::createFromFormat('H:i:s', $input);
    if ($f > $t) $t->modify('+1 day');
	return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}


echo "[";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	
		$shop=$_GET['shop'];
$shop="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S where S.id="$shop" S.active=1 GROUP by S.id";
$getshop = $conn->query($shop);
$getshop->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData1="";
$current_time=date("H:i:s",time());
while($row = $getshoppercat->fetch()):
$jsonrow=json_encode($row);
preg_match('/(?<=opentime":").+?(?=")/',$jsonrow,$opentime);
preg_match('/(?<=closetime":").+?(?=")/',$jsonrow,$closetime);
$jsonrow=preg_replace('/(?<=shopnamear":").+?(?=")/',$row['shopnamear'], $jsonrow);

if (TimeIsBetweenTwoTimes($current_time, $opentime[0], $closetime[0])){
$MyJsonData1 = preg_replace('/\}/', ',"available":"true"}', $jsonrow, 1);

}
else{
$MyJsonData1 = preg_replace('/\}/', ',"available":"false"}', $jsonrow, 1);
}
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;











$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
echo $MyJsonData1;
echo ']';
}catch(Exception $e){

http_response_code(400);
echo "Bad request 400";
}
}else{
http_response_code(400);
echo "Bad request 400";

}

?>