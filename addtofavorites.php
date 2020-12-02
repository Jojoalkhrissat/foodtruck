<?php
require "connect.php";
require "sql.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
}


$myfavorites="SELECT * from favorites where itemid=".$itemid[0]." and customerid=".$customerid[0]."";
$count=sql_selectcount($myfavorites,$conn);
if($count==0){



$favorites= "INSERT INTO `favorites`(`itemid`,`customerid`) VALUES (".$itemid[0].",".$customerid[0].")";
$MyJsonData=sql_insert($favorites,$conn);


	echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","message":"favorite saved"}';

}else{

http_response_code(401);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","message":"favorite already exists"}';

}
}
catch(Exception $e){
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","message":"favorite cannot be added"}';
}
}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","message":"favorite cannot be added"}';
}
?>