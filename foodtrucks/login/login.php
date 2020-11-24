<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');

preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
}
$checkuser ="SELECT id,usertype,adminid,customerid,driverid,shopid FROM `loginandregister` WHERE username='$username[0]' AND password='$password[0]'";
$user = $conn->query($checkuser);
$user->setFetchMode(PDO::FETCH_ASSOC);
$count=$user->rowCount();
if($count==1){

$MyJsonData="";	
while($row = $user->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;

$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);

preg_match('/(?<=usertype":").+?(?=")/',$MyJsonData,$usertype);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
preg_match('/(?<=adminid":").+?(?=")/',$MyJsonData,$adminid);
preg_match('/(?<=customerid":").+?(?=")/',$MyJsonData,$customerid);
preg_match('/(?<=driverid":").+?(?=")/',$MyJsonData,$driverid);
preg_match('/(?<=shopid":").+?(?=")/',$MyJsonData,$shopid);
switch ($usertype[0]) {
		case 'ADMIN':
		$getuserinfo="SELECT * FROM `admin` where id='$adminid[0]'";
		break;
		case 'CUSTOMER':
		$getuserinfo="SELECT * FROM `customers` where id='$customerid[0]'";
		break;
		case 'DRIVER':
		$getuserinfo="SELECT * FROM `drivers` where id='$driverid[0]'";
		break;
		case 'SHOP':
		$getuserinfo="SELECT * FROM `shop` where id='$shopid[0]'";
		break;
		default:
		$getuserinfo="";
		break;
}

$getuser = $conn->query($getuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData1="";	
while($row = $getuser->fetch()):
	$photo= $row['photo'];
$jsonrow=json_encode($row);
$jsonrow=preg_replace('/(?<=shopnamear":").+?(?=")/', $row['shopnamear'], $jsonrow);
$MyJsonData1=$MyJsonData1.",".$jsonrow;
endwhile;
$MyJsonData1 = preg_replace('/,/', '', $MyJsonData1, 1);
preg_match('/(?<=active":").+?(?=")/',$MyJsonData1,$active);
if($active=1){


}else
{
	http_response_code(401);
	echo '[{"message":"your account was blocked"}]';
}





}else{
	http_response_code(401);
	echo '[{"message":"Wrong phone number or password"}]';
}
}catch(Exception $e){
	http_response_code(400);
echo "400 error bad request";	
}

}else{
	http_response_code(400);
	echo "400 error bad request";
}
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="navbar">
	<div id="logo">
  <a class="logo" href="#">FoodTruck</a>
  </div>
  <ul class="nav">
    <li><a href="#">profile</a></li>
    <li><a href="#">subcategories</a></li>
    <li><a href="#">items</a></li>
    <li><a href="#">sales</a></li>
  </ul>
</div>
<img src="../../<?php echo $photo; ?>" width="5%" height="5%">
</body>
</html>