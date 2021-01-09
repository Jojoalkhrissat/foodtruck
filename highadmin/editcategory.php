<?php
require "../connect.php";

  session_start();
  $id=$_SESSION["category"];
$shop= $_SESSION["id"];
$subcatname=isset($_POST["catname"])&&$_POST["catname"]!=''?$_POST["catname"]:$_SESSION["catname_".$id];
$subcatnamear=isset($_POST["catnamear"])&&$_POST["catnamear"]!=''?$_POST["catnamear"]:$_SESSION["catnamear_".$id];
$photo=isset($_POST["photo"])&&$_POST["photo"]!=''?$_POST["photo"]:$_SESSION["photo_".$id];







$items= 'UPDATE `category` SET `catname`="'.$subcatname.'",`catnamear`="'.$subcatnamear.'" where id="'.$id.'"';
echo $items;
$createsubcat= $conn->prepare($items);
$createsubcat->execute();



echo '[{"message":"your subcategory was entered"}]';	
















































if(!empty($_FILES['photo']['tmp_name'])){
if(file_exists($_FILES['photo']['tmp_name'])){


$target_dir = "../img/items/";

$uploadOk = 1;




  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    // echo "<br>";
    // echo $check["mime"];



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);
// echo $ext[0];

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
$subcat= 'update `category` set photo="'.$target_file.'" where id="'.$id.'"';
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}














header('location:'.$baseurl.'/highadmin/categorydetails?category='.$id.'');


?>