<?php
require "connect.php";

	function time_to_decimal($time) {
    $timeArr = explode(':', $time);
    $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
 
    return $decTime;
}
  session_start();
$adtitle=$_POST['adtitle'];
$adtitlear=$_POST['adtitlear'];
$link=$_POST['link'];








$admin= 'INSERT INTO `ads`(`adtitle`, `adtitlear`, `link`) VALUES ("'.$adtitle.'", "'.$adtitlear.'", "'.$link.'")';

$createadmin= $conn->prepare($admin);
$createadmin->execute();
$newadmin='SELECT MAX(id) as id FROM ads';
$geadminid = $conn->query($newadmin);
$geadminid->setFetchMode(PDO::FETCH_ASSOC);

while($row = $geadminid->fetch()):
$id=$row['id'];
endwhile;
















































if(file_exists($_FILES['photo']['tmp_name'])){


$target_dir = "../img/comms/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
 



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);


$target_file = $target_dir . basename($id.'_1.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $target_file=preg_replace('/\.\.\//', '', $target_file);
$adminphoto= 'update `ads` set photo="'.$target_file.'" where id="'.$id.'"';
$addadminphoto= $conn->prepare($adminphoto);
$addadminphoto->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

















header('location:http://localhost/foodtruck/highadmin/ads');


?>