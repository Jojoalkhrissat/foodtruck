<?php
require "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
session_unset();
session_start();
$_SESSION['username']=0;
$_SESSION['password']=0;
$username=$_POST['username'];
$password=$_POST['password'];
if(isset($username)&&isset($password)){
$_SESSION['username']=$username;
$_SESSION['password']=$password;	
}




$checkuser ="SELECT id,usertype,adminid,highadminid,customerid,driverid,shopid FROM `loginandregister` WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'";
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
preg_match('/(?<=highadminid":").+?(?=")/',$MyJsonData,$highadminid);
preg_match('/(?<=adminid":").+?(?=")/',$MyJsonData,$adminid);
preg_match('/(?<=customerid":").+?(?=")/',$MyJsonData,$customerid);
preg_match('/(?<=driverid":").+?(?=")/',$MyJsonData,$driverid);
preg_match('/(?<=shopid":").+?(?=")/',$MyJsonData,$shopid);
switch ($usertype[0]) {
		case 'HIGHADMIN':
		$getuserinfo="SELECT * FROM `highadmin` where id='$highadminid[0]'";
		break;
		default:
		http_response_code(400);
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
	$firstname=isset($row['firstname'])?$row['firstname']:"firstname";
	$lastname=isset($row['lastname'])?$row['lastname']:"lastname";
	$phonenumber=isset($row['phonenumber'])?$row['phonenumber']:"phonenumber";
	$email=isset($row['email'])?$row['email']:"email";
	$active=isset($row['active'])?$row['active']:"active";
	$_SESSION['id']=$id;
	$_SESSION['photo']=$photo;
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['phonenumber']=$phonenumber;
	$_SESSION['email']=$email;



endwhile;
header('location:'.$baseurl.'/highadmin/index');



}else{
	http_response_code(401);
	echo '[{"message":"you don\'t have access"}]';
	header('location:'.$baseurl.'/highadmin/login');


}


}else{
	http_response_code(401);
	echo '[{"message":"Wrong phone number or password"}]';
header('location:'.$baseurl.'/highadmin/login');
}
}catch(Exception $e){
	http_response_code(400);
echo "400 error bad request";	
header('location:'.$baseurl.'/highadmin/login');
}

}else{
	http_response_code(400);
	echo "400 error bad request";
header('location:'.$baseurl.'/highadmin/login');
}

?>




