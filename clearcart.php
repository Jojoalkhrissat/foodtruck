

<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try{
	$post = file_get_contents("php://input");
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
if(!isset($customerid[0])){
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
}
$MyJsonData="";	
$clearcart= "DELETE from orders where Customer=$customerid[0] and WhereOrder='CART'";
$stmt= $conn->prepare($clearcart);
$stmt->execute();
$isinserted=$stmt->rowCount();
if($isinserted>0){
echo '{"Message":"Cart emptied"}';


}else{
http_response_code(400);
echo '{"Message":"Cart is already empty"}';


	}

}catch(Exception $e){

}
}
?>