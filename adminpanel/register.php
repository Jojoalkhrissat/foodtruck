<?php
require "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();

$shopname= $_POST['shopname'];
$shopnamear= $_POST['shopnamear'];
$shopownerFN= $_POST['firstname'];
$shopownerLN= $_POST['lastname'];
$shopnumber= $_POST['shopnumber'];
$email= $_POST['email'];
$city= $_POST['city'];
$opentime= $_POST['opentime'];
$closetime= $_POST['closetime'];
$shoplat= $_POST['shoplat'];
$shoplong= $_POST['shoplong'];
$username= $_POST['username'];
$password= $_POST['password'];





if(isset($shopname)&&isset($shopnamear)&&isset($shopownerFN)&&isset($shopownerLN)&&isset($shopnumber)&&isset($email)&&isset($city)&&isset($opentime)&&isset($closetime)&&isset($shoplat)&&isset($shoplong)&&isset($username)&&isset($password)){


if($shopname!=""||$shopnamear!=""||$shopownerFN!=""||$shopownerLN!=""||$shopnumber!=""||$email!=""||$city!=""||$opentime!=""||$closetime!=""||$shoplat!=""||$shoplong!=""||$username!=""||$password!=""){


if(!empty($shopname)&&!empty($shopnamear)&&!empty($shopownerFN)&&!empty($shopownerLN)&&!empty($shopnumber)&&!empty($email)&&!empty($city)&&!empty($opentime)&&!empty($closetime)&&!empty($shoplat)&&!empty($shoplong)&&!empty($username)&&!empty($password)){
$_SESSION['shopname']=$shopname;
$_SESSION['shopnamear']=$shopnamear;
$_SESSION['shopownerFN']=$shopownerFN;
$_SESSION['shopownerLN']=$shopownerLN;
$_SESSION['email']=$email;
$_SESSION['city']=$city;
$_SESSION['opentime']=$opentime;
$_SESSION['closetime']=$closetime;
$_SESSION['shoplat']=$shoplat;
$_SESSION['shoplong']=$shoplong;
$_SESSION['username']=$username;
$_SESSION['password']=$password;












$addshop= 'INSERT INTO `shop`( `shopname`, `shopnamear`, `firstname`, `lastname`, `phonenumber`, `email`,  `opentime`, `closetime`, `city`, `location`, `monthlypayment`, `active`, `isnew`, `address`) VALUES ( "'.$shopname.'", "'.$shopnamear.'","'.$shopownerFN.'", "'.$shopownerLN.'", "'.$shopnumber.'", "'.$email.'", "'.$opentime.'", "'.$closetime.'", "'.$city.'", "'.$shoplat.','.$shoplong.'", "0.1", 0, 1, "myaddress") ';
$stmt= $conn->prepare($addshop);
$stmt->execute();


$MyJsonData="";
$getid="SELECT * FROM shop WHERE phonenumber=".$shopnumber."";
$getidqu = $conn->query($getid);
$getidqu->setFetchMode(PDO::FETCH_ASSOC);
while($row = $getidqu->fetch()):
$jsonrow=	json_encode($row);
$jsonrow = preg_replace('/(?<=shopnamear":").+?(?=")/', ''.$row['shopnamear'].'', $jsonrow);
$MyJsonData=$MyJsonData.",".$jsonrow;
// $id=$row['id'];
endwhile;
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
















$adduser= 'INSERT INTO `loginandregister`(`shopid`, `username`, `password`, `usertype`) VALUES ("'.$id[0].'","'.$username.'","'.$password.'","SHOP")';
$stmt= $conn->prepare($adduser);
$stmt->execute();








echo "[";

echo $MyJsonData;

echo "]";
































if(file_exists($_FILES['shopphoto']['tmp_name'])){


$target_dir = "../../img/profile/shop/";

$uploadOk = 1;




  $check = getimagesize($_FILES["shopphoto"]["tmp_name"]);
  if($check !== false) {
   



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);

$target_file = $target_dir . basename($id[0].'.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["shopphoto"]["tmp_name"], $target_file)) {
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



}



}
}



$updatecount= 'UPDATE shop set photo="img/profile/shop/'.$id[0].'.'.$ext[0].'"';
$stmt= $conn->prepare($updatecount);
$stmt->execute();

}else{




echo "<h1>Some Data is not there, please go back and set the data</h1>";



sleep(10);


header('location:http://localhost/foodtruck/adminpanel/reg.php');






























































}
?>