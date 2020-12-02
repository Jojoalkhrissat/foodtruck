<?php
require "connect.php";
require "sql.php";
require "functions.php";

	



if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	
		$shop=$_GET['shop'];
$shops="SELECT S".".id,S.shopname,S.shopnamear,S.photo,S.location,S.opentime,S.closetime from shop S where S.id=".$shop." and S.active=1 GROUP by S.id";
$MyJsonData1=sql_selectdata($shops,$conn);
preg_match_all('/(?<=opentime":").+?(?=")/',$MyJsonData1,$opentime);
preg_match_all('/(?<=closetime":").+?(?=")/',$MyJsonData1,$closetime);
for ($i=0; $i <count($opentime[0]) ; $i++) { 
	# code...

if (TimeIsBetweenTwoTimes($current_time, $opentime[0][$i], $closetime[0][$i])){
$MyJsonData1 = preg_replace('/\}/', ',"available":"true"}', $MyJsonData1, $i+1);

}
else{
$MyJsonData1 = preg_replace('/\}/', ',"available":"false"}', $MyJsonData1, $i+1);
}
}








$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<=":)null(?=\,)/', '""', $MyJsonData1);
echo "[";
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