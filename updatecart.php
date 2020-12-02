<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match_all('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match_all('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match_all('/(?<=cartid":").+?(?=")/',$post,$cartid);
preg_match_all('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid)&&!isset($cartid)&&!isset($count)){
preg_match_all('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match_all('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match_all('/(?<=cartid=).+?(?=&|$)/',$post,$cartid);
preg_match_all('/(?<=count=).+?(?=&|$)/',$post,$count);
}

if(isset($count)&&isset($cartid)&&isset($itemid)){



$itemspershop="SELECT OE."."ordernumber,OE.count,OE.item,I.price FROM orderelements OE,items I where OE.ordernumber=".$cartid[0][0]." and OE.item=I.id";
$MyJsonData1=sql_selectdata($itemspershop,$conn);
preg_match_all('/(?<=price":").+?(?=")/',$MyJsonData1,$price);
preg_match_all('/(?<=count":").+?(?=")/',$MyJsonData1,$Counts);

for($i=0;$i<count($itemid[0]);$i++){
$removedandadded=doubleval($price[0][$i])*doubleval($Counts[0][$i]);




$updatecount= 'UPDATE orders set orderprice=orderprice-'.$removedandadded.' where id='.$cartid[0][0].'';
sql_update($updatecount,$conn);

}
for($i=0;$i<count($itemid[0]);$i++){
$removedandadded=doubleval($price[0][$i])*doubleval($count[0][$i]);




$updatecount= 'UPDATE orders set orderprice=orderprice+'.$removedandadded.' where id='.$cartid[0][0].'';
sql_update($updatecount,$conn);

}



















for($i=0;$i<count($itemid[0]);$i++){
	
if($count[0][$i]>0){
$updatecount= 'UPDATE orderelements set count='.$count[0][$i].' where ordernumber='.$cartid[0][0].' and item='.$itemid[0][$i].'';
sql_update($updatecount,$conn);

}else{
$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$cartid[0][0].' and item='.$itemid[0][$i].'';
sql_delete($deleteitem,$conn);
}
}
echo '{"message":"Cart Updated"}';
}else{
http_response_code(400);
$itemid[0]="Not Valid";
$count[0]="Not Valid";
$customerid[0]="Not Valid";
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
}
catch(Exception $e){

}
}else{
	http_response_code(400);
echo '{"message":"Bad Request"}';
}
?>