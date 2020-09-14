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
preg_match('/(?<=gender":").+?(?=")/',$post,$gender);
preg_match('/(?<=address":").+?(?=")/',$post,$address);
preg_match('/(?<=dob":").+?(?=")/',$post,$dob);

if(!isset($username[0])&&!isset($password[0])){
preg_match('/(?<=username=).+?(?=&|$)/',$post,$username);
preg_match('/(?<=password=).+?(?=&|$)/',$post,$password);
preg_match('/(?<=firstname=).+?(?=&|$)/',$post,$firstname);
preg_match('/(?<=lastname=).+?(?=&|$)/',$post,$lastname);
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=photopath=).+?(?=&|$)/',$post,$photopath);
preg_match('/(?<=gender=).+?(?=&|$)/',$post,$gender);
preg_match('/(?<=address=).+?(?=&|$)/',$post,$address);
preg_match('/(?<=dob=).+?(?=&|$)/',$post,$dob);
}
$userinfo= "INSERT INTO `customers`(`FName`, `LName`, `Email`, `Phone`, `Photo`,'Address','DOB','Gender') VALUES ('$firstname[0]','$lastname[0]','$email[0]','$phonenumber[0]','$photopath[0]','$address[0]','$dob[0],$gender[0]')";
$stmt= $conn->prepare($userinfo);
$stmt->execute();
$fetchuserinfo='SELECT * FROM customers WHERE Email="'.$email[0].'"';
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
$userlogin="INSERT INTO `loginandregister`(`CustomerId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','CUSTOMER')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();
}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>