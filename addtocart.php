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
$itemspersub="SELECT I."."id, I.Name,'' as IsFavorite,I.Description,I.Shop,S.ShopName, I.Photo,I.Photo1,I.Photo2, I.Price, I.TimesSold,avg(F.Rating) as Rating,count(F.Rating) as RatingNumber FROM items I left join feedback F on F.ItemId=I.id  left join shop S on I.Shop=S.id left join subcategory SU on I.SubCategory=SU.id and F.ItemId=I.id where I.id=$itemid[0] GROUP By I.id";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData1=$MyJsonData1.",".json_encode($row);
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":)(?!'.$customerid[0].').+?(?=,)/', '"NO"', $MyJsonData1);
$MyJsonData1 = preg_replace('/(?<="IsFavorite":")'.$customerid[0].'(?=")/', 'YES', $MyJsonData1);
preg_match('/(?<=Shop":").+?(?=")/',$MyJsonData1,$Shop);
if(isset($Shop[0])){


$MyJsonData="";	
$itemspersub="SELECT id,Count FROM `orders` WHERE Item=".$itemid[0]." and Customer=".$customerid[0]."";
$getitemspersub = $conn->query($itemspersub);
$getitemspersub->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getitemspersub->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=Count":").+?(?=")/',$MyJsonData,$Count);
if(!isset($id[0])&&!isset($Count[0])){
$addtocart= 'INSERT INTO `orders`(`Customer`, `shop`, `Item`, `Count`, `WhereOrder`) VALUES ('.$customerid[0].','.$Shop[0].','.$itemid[0].','.$count[0].',"CART")';
$stmt= $conn->prepare($addtocart);
$stmt->execute();


}elseif(isset($id[0])&&isset($Count[0])){
	$count[0]=$count[0]+$Count[0];
$updatecount= 'UPDATE orders set count='.$count[0].' where id='.$id[0].'';
$stmt= $conn->prepare($updatecount);
$stmt->execute();
}
$isinserted= $stmt->rowCount();
if($isinserted>0){

	echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"Added to cart"}';






}else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item was not added"}';
}
}
else{
http_response_code(400);
echo '{"ItemId":"'.$itemid[0].'","CustomerId":"'.$customerid[0].'","count":"'.$count[0].'","message":"item does not exist"}';	
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
}
?>