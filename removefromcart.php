<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=cartid":").+?(?=")/',$post,$cartid);
preg_match('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid[0])&&!isset($cartid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=cartid=).+?(?=&|$)/',$post,$cartid);
preg_match('/(?<=count=).+?(?=&|$)/',$post,$count);
}
if(isset($count[0])&&isset($cartid[0])&&isset($itemid[0])){




$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$cartid[0].' and item='.$itemid[0].'';
sql_delete($deleteitem,$conn);

echo '{"ItemId":"'.$itemid[0].'","count":"'.$count[0].'","message":"removed from cart"}';







}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}



}
catch(Exception $e){

}
}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
?>