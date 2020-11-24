<?php
require "connect.php";
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
$items="SELECT I."."id, I.itemname,I.description,I.preparetime,I.timesamples,I.shop,S.shopname,I.photo,I.photo1,I.photo2,I.price, I.timesold,avg(F.rating) as rating,count(F.rating) as ratingnumber FROM items I left join feedback F on F.itemid=I.id  left join shop S on I.shop=S.id left join subcategory SU on I.subcategory=SU.id where I.id=".$itemid[0]." GROUP By I.id";
$getitems = $conn->query($items);
$getitems->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitems->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/null/', 'nulldata', $MyJsonData1);
preg_match('/(?<=shop":").+?(?=")/',$MyJsonData1,$Shop);
preg_match('/(?<=preparetime":").+?(?=")/',$MyJsonData1,$PrepareTime);
preg_match('/(?<=timesamples":").+?(?=")/',$MyJsonData1,$TimeSamples);
preg_match('/(?<=price":").+?(?=")/',$MyJsonData1,$price);
if(isset($Shop[0])){
if($TimeSamples[0]=="0"){
$timeforready=intval($PrepareTime[0])*intval($count[0]);
}else{
$timeforready=intval($PrepareTime[0]);
}

$totprice=doubleval($price[0])*doubleval($count[0]);


$MyJsonData="";	
$order="SELECT * FROM orders WHERE customer=".$customerid[0]." and status='CART'";
$getorder = $conn->query($order);
$getorder->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getorder->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=ordertotaltime":").+?(?=")/',$MyJsonData,$timeready);





if(!isset($id[0])){

$createcart= 'INSERT INTO `orders`(`customer`, `shop`,`status`,`orderprice`) VALUES ('.$customerid[0].','.$Shop[0].',"CART",'.$totprice.')';
$stamt= $conn->prepare($createcart);
$stamt->execute();


$MyJsonData="";	
$order="SELECT * FROM orders WHERE customer=".$customerid[0]." and status='CART'";
$getorder = $conn->query($order);
$getorder->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getorder->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);




$addtocart= 'INSERT INTO `orderelements`(`item`, `count`,`ordernumber`,`ordertime`) VALUES ('.$itemid[0].','.$count[0].','.$id[0].','.$timeforready.')';
$stmt= $conn->prepare($addtocart);
$stmt->execute();


}elseif(isset($id[0])){
 $MyJsonData2="";
$elements="SELECT * FROM orderelements WHERE ordernumber=".$id[0]." and item=".$itemid[0]."";
$getelements = $conn->query($elements);
$getelements->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getelements->fetch()):
$MyJsonData2=$MyJsonData2.",".json_encode($row);
endwhile;
$MyJsonData2 = preg_replace('/,/', '', $MyJsonData2, 1);
preg_match('/(?<=count":").+?(?=")/',$MyJsonData2,$Count);


if(isset($Count[0])){

$totprice=doubleval($price[0])*doubleval($count[0]);
$count[0]=$count[0]+$Count[0];




if($TimeSamples[0]=="0"){
$timeforready=intval($PrepareTime[0])*intval($count[0]);
}else{
$timeforready=intval($PrepareTime[0]);
}

$updatecount= 'UPDATE orders set orderprice=orderprice+'.$totprice.' where id='.$id[0].'';
$stmt= $conn->prepare($updatecount);
$isinserted=$stmt->execute();


$updatecount= 'UPDATE orderelements set ordertime='.$timeforready.',count='.$count[0].' where ordernumber='.$id[0].' and item='.$itemid[0].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();










}else{
$totprice=doubleval($price[0])*doubleval($count[0]);

$addtocart= 'INSERT INTO `orderelements`(`item`, `count`,`ordernumber`) VALUES ('.$itemid[0].','.$count[0].','.$id[0].')';
$stmt= $conn->prepare($addtocart);
$stmt->execute();


$updatecount= 'UPDATE orders set orderprice=orderprice+'.$totprice.' where id='.$id[0].'';
$stmt= $conn->prepare($updatecount);
$isinserted=$stmt->execute();




}





































 


	



}
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Added to cart"}';


}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item does not exist"}';	
}


}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item does not exist"}';	
}
}catch(Exception $e){

}
}else{
http_response_code(400);
$itemid[0]="Not Valid";
$count[0]="Not Valid";
$customerid[0]="Not Valid";
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Bad Request"}';
}


?>