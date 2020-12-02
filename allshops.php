<?php
require "connect.php";
require "sql.php";
require "functions.php";


$shops='SELECT * FROM shop where active=1';

$current_time=date("H:i:s",time());

$MyJsonData=sql_selectdata($shops,$conn);	



preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData,$closetime);

for($i=0;$i<count($opentime[0]);$i++){
if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData = preg_replace('/\}/', ',"available":"true"}', $MyJsonData, $i+1);

}
else{
$MyJsonData = preg_replace('/\}/', ',"available":"false"}', $MyJsonData, $i+1);
}
}

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData);

echo '[';
echo $MyJsonData;
echo ']';
?>