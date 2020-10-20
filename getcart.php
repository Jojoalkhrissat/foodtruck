<?php

require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O."."id, O.shop, O.Item, O.Count, O.WhereOrder,I.Name, I.Photo, I.price*O.Count as Price FROM orders O inner join items I on I.id=O.Item WHERE O.WhereOrder='CART' and O.Customer=$customerid";
$getcartitems = $conn->query($cartitems);
$getcartitems->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcartitems->rowCount();
while($row = $getcartitems->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);

echo "[";
echo $MyJsonData1;
echo ']';


}catch(Exception $e){
	http_response_code(400);
echo "400 bad request";	
}

}else{
	http_response_code(400);
echo "400 bad request";
}


}else{
	http_response_code(400);
echo "400 bad request";
}
?>