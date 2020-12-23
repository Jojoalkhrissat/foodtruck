<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
session_unset();
session_start();
$_SESSION['username']=0;
$_SESSION['password']=0;
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
}
if(isset($username[0])&&isset($password[0])){
$_SESSION['username']=$username[0];
$_SESSION['password']=$password[0];	
}




$checkuser ="SELECT id,usertype,adminid,customerid,driverid,shopid FROM `loginandregister` WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'";
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
	
		case 'SHOP':
		$getuserinfo="SELECT * FROM `shop` where id='$shopid[0]'";
		break;
		default:
		$getuserinfo="";
		break;
}
if($getuserinfo!=null&&$getuserinfo!=''){
$getuser = $conn->query($getuserinfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
$MyJsonData1="";	

while($row = $getuser->fetch()):
	
	$id= isset($row['id'])?$row['id']:"id";
	$photo= isset($row['photo'])?$row['photo']:"photo";
	$shopname=isset($row['shopname'])?$row['shopname']:"shopname";
	$shopnamear=isset($row['shopnamear'])?$row['shopnamear']:"shopnamear";
	$firstname=isset($row['firstname'])?$row['firstname']:"firstname";
	$lastname=isset($row['lastname'])?$row['lastname']:"lastname";
	$phonenumber=isset($row['phonenumber'])?$row['phonenumber']:"phonenumber";
	$email=isset($row['email'])?$row['email']:"email";
	$joindate=isset($row['joindate'])?$row['joindate']:"joindate";
	$opentime=isset($row['opentime'])?$row['opentime']:"opentime";
	$closetime=isset($row['closetime'])?$row['closetime']:"closetime";
	$city=isset($row['city'])?$row['city']:"city";
	$active=isset($row['active'])?$row['active']:"active";
	$address=isset($row['address'])?$row['address']:"address";
	$location=isset($row['location'])?$row['location']:"location";
	$_SESSION['id']=$id;
	$_SESSION['photo']=$photo;
	$_SESSION['shopname']=$shopname;
	$_SESSION['shopnamear']=$shopnamear;
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['phonenumber']=$phonenumber;
	$_SESSION['email']=$email;
	$_SESSION['joindate']=$joindate;
	$_SESSION['opentime']=$opentime;
	$_SESSION['closetime']=$closetime;
	$_SESSION['city']=$city;
	$_SESSION['active']=$active;
	$_SESSION['address']=$address;
	$_SESSION['location']=$location;

endwhile;

if($active=="1"){
$active="yes";
header('location:http://localhost/foodtruck/adminpanelft/index');
}else
{
	http_response_code(401);
	echo '[{"message":"your account was blocked"}]';
	header('location:http://localhost/foodtruck/adminpanelft/login');
}
 }
 else{
http_response_code(401);
echo '[{"message":"you don\'t have access"}]';
header('location:http://localhost/foodtruck/adminpanelft/login');
}



}
else{
	http_response_code(401);
	echo '[{"message":"Wrong phone number or password"}]';
header('location:http://localhost/foodtruck/adminpanelft/login');
}
}
catch(Exception $e){
	http_response_code(400);
echo "400 error bad request";	
header('location:http://localhost/foodtruck/adminpanelft/login');
}

}else{
	http_response_code(400);
	echo "400 error bad request";
header('location:http://localhost/foodtruck/adminpanelft/login');
}

?>




