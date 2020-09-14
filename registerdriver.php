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
preg_match('/(?<=idphoto1":").+?(?=")/',$post,$idphoto1);
preg_match('/(?<=idphoto2":").+?(?=")/',$post,$idphoto2);
preg_match('/(?<=licencephoto2":").+?(?=")/',$post,$licencephoto2);
preg_match('/(?<=licencephoto1":").+?(?=")/',$post,$licencephoto1);
preg_match('/(?<=noncriminalrecord":").+?(?=")/',$post,$noncriminalrecord);
preg_match('/(?<=carcolor":").+?(?=")/',$post,$carcolor);
preg_match('/(?<=carplate":").+?(?=")/',$post,$carplate);
preg_match('/(?<=carlicence1":").+?(?=")/',$post,$carlicence1);
preg_match('/(?<=carlicence2":").+?(?=")/',$post,$carlicence2);
preg_match('/(?<=carbrand":").+?(?=")/',$post,$carbrand);
preg_match('/(?<=carsubbrand":").+?(?=")/',$post,$carsubbrand);
preg_match('/(?<=carmodel":").+?(?=")/',$post,$carmodel);



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
preg_match('/(?<=idphoto1=).+?(?=&|$)/',$post,$idphoto1);
preg_match('/(?<=idphoto2=).+?(?=&|$)/',$post,$idphoto2);
preg_match('/(?<=licencephoto2=).+?(?=&|$)/',$post,$licencephoto2);
preg_match('/(?<=licencephoto1=).+?(?=&|$)/',$post,$licencephoto1);
preg_match('/(?<=noncriminalrecord=).+?(?=&|$)/',$post,$noncriminalrecord);
preg_match('/(?<=carcolor=).+?(?=&|$)/',$post,$carcolor);
preg_match('/(?<=carplate=).+?(?=&|$)/',$post,$carplate);
preg_match('/(?<=carlicence1=).+?(?=&|$)/',$post,$carlicence1);
preg_match('/(?<=carlicence2=).+?(?=&|$)/',$post,$carlicence2);
preg_match('/(?<=carbrand=).+?(?=&|$)/',$post,$carbrand);
preg_match('/(?<=carsubbrand=).+?(?=&|$)/',$post,$carsubbrand);
preg_match('/(?<=carmodel=).+?(?=&|$)/',$post,$carmodel);
}
$getcardetails='SELECT * from cars WHERE Brand="'.$carbrand[0].'" AND SubBrand="'.$carsubbrand[0].'" AND Model="'.$carmodel[0].'"';
$MyJson="";
$cardata=$conn->query($getcardetails);
$cardata->setFetchMode(PDO::FETCH_ASSOC);
while($row = $cardata->fetch()):
$MyJson=$MyJson.",".json_encode($row);
endwhile;
$MyJson=preg_replace('/,/', '', $MyJson, 1);
preg_match('/(?<=id":").+?(?=")/',$MyJson,$carid);
echo $username[0]." ".$password[0]." ".$firstname[0]." ".$lastname[0]." ".$lastname[0]." ".$email[0]." ".$phonenumber[0]." ".$address[0]." ".$dob[0]." ".$gender[0];
$userinfo= "INSERT INTO `drivers`(`FName`, `LName`, `PhoneNumber`, `Email`, `Address`, `DOB`, `Gender`, `photo`, `LicencePhoto1`, `LicencePhoto2`, `IdPhoto1`, `IdPhoto2`, `NonCriminalRecord`, `CarAssigned`,`CarColor`, `CarPlate`, `CarLicence1`, `CarLicence2`) VALUES ('$firstname[0]','$lastname[0]','$phonenumber[0]','$email[0]','$address[0]','$dob[0]','$gender[0]','$photopath[0]','$licencephoto1[0]','$licencephoto2[0]','$idphoto1[0]','$idphoto2[0]','$noncriminalrecord[0]','$carid[0]','$carcolor[0]','$carplate[0]','$carlicence1[0]','$carlicence2[0]')";
echo $userinfo;
$stmt= $conn->prepare($userinfo);
$stmt->execute();

$fetchuserinfo='SELECT * FROM drivers WHERE Email="'.$email[0].'"';
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
$userlogin="INSERT INTO `loginandregister`(`DriverId`, `UserName`, `PassWord`, `UserType`) VALUES ('$id[0]','$username[0]','$password[0]','DRIVER')";
$stmt1= $conn->prepare($userlogin);
$stmt1->execute();

}catch(Exception $e){
	echo "400 error bad request";
}
}else{
	echo "400 error bad request";
}
?>