<?php
if(isset($_POST["submit"])) {
$shop= $_POST["shops"];
$subcatname= $_POST["subcatname"];
$subcatnamear=$_POST["subcatnamear"];
$category= $_POST["categories"];

echo $subcatnamear;




$subcat= 'INSERT INTO `subcategory`(`subcatname`, `subcatnamear`, `shop`, `category`) VALUES ('.$subcatname.','.$subcatnamear.','.$shop.','.$category.')';
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();
$count=$createsubcat->rowCount();

if($count==1){
echo '[{"message":"your review was entered"}]';	


$shops='SELECT * FROM shop';
$getshops = $conn->query($shops);
$getshops->setFetchMode(PDO::FETCH_ASSOC);

while($row = $getshops->fetch()):

endwhile;

















}else{
http_response_code(400);
	echo '[{"message":"something went wrong"}]';	

}




























if(file_exists($_FILES['image']['tmp_name']){


$target_dir = "../img/subcategory";

$uploadOk = 1;




  $check = getimagesize($_FILES["subcatimage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    echo "<br>";
    echo $check["mime"];



    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
preg_match('/(?<=\/).+?(?=$)/',$check["mime"],$ext);
echo $ext[0];

$target_file = $target_dir . basename('abc'.'.'.$ext[0]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["subcatimage"]["tmp_name"], $target_file)) {
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



}





?>