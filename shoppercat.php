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
	
		$category=$_GET['category'];
$shoppercat="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S, subcategory SU WHERE S.id=SU.shop and SU.category=".$category." and S.active=1 GROUP by S.id";
$getshoppercat = $conn->query($shoppercat);
$getshoppercat->setFetchMode(PDO::FETCH_ASSOC);
$count=$getshoppercat->rowCount();
if($count>0){
$MyJsonData1="";
$current_time=date("H:i:s",time());
while($row = $getshoppercat->fetch()):

preg_match('/(?<=opentime":").+?(?=")/',json_encode($row),$opentime);
preg_match('/(?<=closetime":").+?(?=")/',json_encode($row),$closetime);
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=shopnamear":").+?(?=")/',$row['shopnamear'], $jsonrow);



if (TimeIsBetweenTwoTimes($current_time, $opentime[0], $closetime[0])){
$jsonrow = preg_replace('/\}/', ',"available":"true"}', $jsonrow, 1);

}
else{
$jsonrow = preg_replace('/\}/', ',"available":"false"}', $jsonrow, 1);
}
endwhile;
$MyJsonData1=$MyJsonData1.",".$jsonrow;










$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);

}else{
$MyJsonData1='[{"message":"there are no food trucks for this category"}]';
http_response_code(404);
}

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