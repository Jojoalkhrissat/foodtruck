<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try{
		$post = file_get_contents("php://input");
preg_match('/(?<=cartid":").+?(?=")/',$post,$cartid);

if(!isset($cartid[0])||$cartid[0]==""||$cartid[0]==" "){
preg_match('/(?<=cartid=).+?(?=&|$)/',$post,$cartid);
}


if(isset($cartid[0])||$cartid[0]!=""||$cartid[0]!=" "){
$clearcart= "DELETE from orderelements where ordernumber=".$cartid[0]."";
sql_delete($clearcart,$conn);







$deletecart= "DELETE from orders where id=".$cartid[0]."";
sql_delete($deletecart,$conn);

echo '{"Message":"Cart emptied"}';


}else{
http_response_code(400);
echo '{"Message":"Cart is already empty"}';


	}

}catch(Exception $e){
http_response_code(400);
echo '{"Message":"Cart was not emptied"}';
}
}else{
	http_response_code(400);
echo '{"Message":"Cart was not emptied"}';

}

?>