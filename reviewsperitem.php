<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	try{
	$itemid=$_GET['itemid'];
$MyJsonData1="";

$feedback="SELECT F".".id,F.itemid,F.customer,C.firstname ,C.lastname ,C.photo ,F.comments, F.rating, F.date FROM feedback F,customers C where itemid=".$itemid." and C.id=F.customer";
$count=sql_selectcount($feedback,$conn);



if($count>0){
echo "[";

$MyJsonData1 =sql_selectdata($feedback,$conn);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/null/', '"NullData"', $MyJsonData1);
echo $MyJsonData1;
echo ']';
}else{
http_response_code(202);
echo '[{"message":"there are no reviews for this item"}]';


}






}catch(Exception $e){
	http_response_code(400);
	echo "400 error bad request";
}
}else{
	http_response_code(400);
	echo "400 error bad request";
}

?>