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
	
$favorites= "DELETE FROM `favorites` WHERE itemid=$itemid[0] AND customerid=$customerid[0]";
$MyJsonData=sql_delete($favorites,$conn);

echo '{"Message":"favorite deleted"}';




}catch(Exception $e){

}
}else{
http_response_code(400);
echo '{"Message":"favorite doesn\'t exist"}';


	
}
?>