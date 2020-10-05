<?php

require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$customerid=isset($_GET['customerid'])?$_GET['customerid']:"";
if($customerid!=""){
try{
	$MyJsonData="";
$MyJsonData1="";
$cartitems="SELECT O."."id, O.shop, O.Item, O.Count, O.WhereOrder,I.Name, I.Photo, I.price FROM orders O inner join items I on I.id=O.Item WHERE O.WhereOrder='CART' and O.Customer=$customerid";
$getcartitems = $conn->query($cartitems);
$getcartitems->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getcartitems->rowCount();
while($row = $getcartitems->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$itemcount="SELECT sum"."(Count) as count FROM orders WHERE WhereOrder='CART' and Customer=$customerid";
$getitemcount = $conn->query($itemcount);
$getitemcount->setFetchMode(PDO::FETCH_ASSOC);
$resultcount=$getitemcount->rowCount();
while($row = $getitemcount->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
preg_match('/(?<=count":").+?(?=")/',$MyJsonData,$count);
if(!isset($count[0])){
$count[0]=0;


}

echo "[{";
echo '"resultcount":"'.$count[0].'"},';
echo "[";
echo $MyJsonData1;
echo ']';
echo "]";

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