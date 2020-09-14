<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=username":").+?(?=")/',$post,$username);
preg_match('/(?<=password":").+?(?=")/',$post,$password);
preg_match('/(?<=firstname":").+?(?=")/',$post,$firstname);
preg_match('/(?<=lastname":").+?(?=")/',$post,$lastname);
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=phonenumber":").+?(?=")/',$post,$phonenumber);
preg_match('/(?<=photopath":").+?(?=")/',$post,$photopath);

if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
}

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$adminkey = '';
for ($i=0;$i<10;$i++){
$adminkey .= $characters[rand(0, $charactersLength - 1)];

}
echo $adminkey;
$admininfo= "INSERT INTO `admin`(`FName`, `LName`, `AdminKey`, `Email`, `Phone`, `Photo`) VALUES ('$firstname[0]','$lastname[0]','$adminkey','$email[0]','$phonenumber[0]','$photopath[0]')";
$stmt= $conn->prepare($admininfo);
$stmt->execute();
$fetchadmininfo='SELECT * FROM admin WHERE Email="'.$email[0].'"';
$getuser = $conn->query($fetchadmininfo);
$getuser->setFetchMode(PDO::FETCH_ASSOC);
echo '[';
$MyJsonData="";	
while($row = $getuser->fetch()):
$MyJsonData=$MyJsonData.",".json_encode($row);
endwhile;
$MyJsonData = preg_replace('/,/', '', $MyJsonData, 1);
echo $MyJsonData;

preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
$adminlogin="INSERT INTO `loginandregister`(`AdminId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','ADMIN')";
$stmt1= $conn->prepare($adminlogin);
$stmt1->execute();
}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>