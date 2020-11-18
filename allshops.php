<?php
require "connect.php";

function TimeIsBetweenTwoTimes($from, $till, $input) {
    $f = DateTime::createFromFormat('H:i:s', $from);
    $t = DateTime::createFromFormat('H:i:s', $till);
    $i = DateTime::createFromFormat('H:i:s', $input);
    if ($f > $t) $t->modify('+1 day');
	return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}


$shops='SELECT * FROM shop where active=1';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData="";
$current_time=date("H:i:s",time());
echo '[';
$MyJsonData="";	
while($row = $getshops->fetch()):
$jsonrow=json_encode($row);

$jsonrow=preg_replace('/(?<=shopnamear":").+?(?=")/',$row['shopnamear'], $jsonrow);
preg_match('/(?<=opentime":").+?(?=")/',$jsonrow,$opentime);
preg_match('/(?<=closetime":").+?(?=")/',$jsonrow,$closetime);
if (TimeIsBetweenTwoTimes($current_time, $opentime[0], $closetime[0])){
$jsonrow = preg_replace('/\}/', ',"available":"true"}', $jsonrow, 1);

}
else{
$jsonrow = preg_replace('/\}/', ',"available":"false"}', $jsonrow, 1);
}
$MyJsonData=$MyJsonData.",".$jsonrow;
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);
echo $MyJsonData;
echo ']';
?>