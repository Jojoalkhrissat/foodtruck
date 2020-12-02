<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");
preg_match('/(?<=itemid":").+?(?=")/',$post,$itemid);
preg_match('/(?<=customerid":").+?(?=")/',$post,$customerid);
preg_match('/(?<=count":").+?(?=")/',$post,$count);
if(!isset($itemid[0])&&!isset($customerid[0])){
preg_match('/(?<=itemid=).+?(?=&|$)/',$post,$itemid);
preg_match('/(?<=customerid=).+?(?=&|$)/',$post,$customerid);
preg_match('/(?<=count=).+?(?=&|$)/',$post,$count);
}
if(isset($count[0])&&isset($customerid[0])&&isset($itemid[0])){
$MyJsonData1="";
$MyJsonData="";	
$itemspersub="SELECT * FROM `orders` WHERE customer=".$customerid[0]." and status='CART'";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=orderprice":").+?(?=")/',$MyJsonData,$orderprice);


$cartitems="SELECT O".".id, O.shop, OE.item, OE.count, O.status,I.itemname,I.itemnamear,I.price, I.photo, I.price*OE.count as totalprice FROM orderelements OE inner join items I on I.id=OE.item join orders O on O.id=OE.ordernumber WHERE O.status='CART' and O.id=".$id."";
$MyJsonData2=sql_selectdata($cartitems,$conn);

$MyJsonData2 = preg_replace('/,/', '', $MyJsonData2, 1);
preg_match('/(?<=price":").+?(?=")/',$MyJsonData,$itemprice);

$priceremoved=doubleval($itemprice[0])*doubleval($count[0]);
if($priceremoved==$orderprice[0]){

$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$id[0].'';
sql_delete($deleteitem,$conn);
$deletecart= 'DELETE FROM `orders` WHERE id='.$id[0].'';
sql_delete($deletecart,$conn);



}else{


$fixorderprice= 'UPDATE orders set orderprice=orderprice-'.$priceremoved[0].' where id='.$id[0].'';
sql_update($fixorderprice,$conn);





$getorderelements="SELECT * FROM `orderelements` WHERE ordernumber=".$id[0]." and item=".$itemid[0]."";
$MyJsonData1=sql_selectdata($getorderelements,$conn);
preg_match('/(?<=count":").+?(?=")/',$MyJsonData1,$Count);









if(isset($Count[0])){

if($Count[0]==$count[0]){
$deleteitem= 'DELETE FROM `orderelements` WHERE ordernumber='.$id[0].' and item='.$itemid[0].'';
sql_delete($deleteitem,$conn);

echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"removed from cart"}';
}elseif($Count[0]>$count[0]){
	$count[0]=$Count[0]-$count[0];
$updatecount= 'UPDATE orderelements set count='.$count[0].' where ordernumber='.$id[0].' and item='.$itemid[0].'';
sql_update($updatecount,$conn);

echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"removed from cart"}';


}else{

$Count[0]=0;
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"you can not remove more than you have"}';


http_response_code(400);
}


}else{
	http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not removed"}';
}




}

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
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}
?>