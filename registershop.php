<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=password":").+?(?=")/',$post,$username);
preg_match('/(?<=username":").+?(?=")/',$post,$password);
preg_match('/(?<=shopname":").+?(?=")/',$post,$shopname);
preg_match('/(?<=fullname":").+?(?=")/',$post,$fullname);
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=phonenumber":").+?(?=")/',$post,$phonenumber);
preg_match('/(?<=photopath":").+?(?=")/',$post,$photopath);
preg_match('/(?<=idphotopath":").+?(?=")/',$post,$idphotopath);
preg_match('/(?<=type":").+?(?=")/',$post,$type);
preg_match('/(?<=location":").+?(?=")/',$post,$location);
preg_match('/(?<=monthlypayment":").+?(?=")/',$post,$monthlypayment);
preg_match('/(?<=size":").+?(?=")/',$post,$size);

if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=shopname=).+?(?=&|$)/',$post,$shopname);
preg_match('/(?<=fullname=).+?(?=&|$)/',$post,$fullname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=idphotopath=).+?(?=&|$)/',$post,$idphotopath);
preg_match('/(?<=type=).+?(?=&|$)/',$post,$type);
preg_match('/(?<=location=).+?(?=&|$)/',$post,$location);
preg_match('/(?<=monthlypayment=).+?(?=&|$)/',$post,$monthlypayment);
preg_match('/(?<=size=).+?(?=&|$)/',$post,$size);
}
$userinfo= "INSERT INTO `shop`(`ShopName`, `ShopOwner`, `Phone`, `Email`, `Type`, `Location`,'MonthlyPayment','Size',IdPhoto,Photo) VALUES ('$shopname[0]','$fullname[0]','$phonenumber[0]','$email[0]','$type[0],'$location[0]','$monthlypayment[0],$size[0]','$idphotopath[0]','$photopath')";
$stmt= $conn->prepare($userinfo);
$stmt->execute();
$fetchuserinfo='SELECT * FROM shop WHERE Email="'.$email[0].'"';
$getuser = $conn->query($fetchuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;

preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
$userlogin="INSERT INTO `loginandregister`(`ShopId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','SHOP')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();
}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>