<?php
require "connect.php";
require "sql.php";

if(isset($_POST["submit"])) {
  session_start();
$shop= $_SESSION["id"];
$subcatid=$_POST['subcategories'];
$subcatname=isset(($_POST["subcatname"])?($_POST["subcatname"]:($_SESSION["subcatname_".$subcatid];
$subcatnamear=isset(($_POST["subcatnamear"])?($_POST["subcatnamear"]:($_SESSION["subcatnamear_".$subcatid];
$category=isset(($_POST["categories"])?($_POST["categories"]:($_SESSION["categories_".$subcatid];






$subcat= 'UPDATE `subcategory` set `subcatname`="'.$subcatname.'", `subcatnamear`="'.$subcatnamear.'", `category`="'.$category.'" WHERE id="'.$subcatid.'"';
sql_update($subcat,$conn);



echo '[{"message":"your review was entered"}]';	


$subcat='SELECT * FROM subcategory where id="'.$subcatid.'"';
$getsubcatid = $conn->query($subcat);
$getsubcatid->setFetchMode(PDO::FETCH_ASSOC);

while($row = $getsubcatid->fetch()):
$id=$row['id'];
endwhile;














































if(file_exists($_FILES['subcatimage']['tmp_name'])){


$target_dir = "../../img/subcategory/";

$uploadOk = 1;




  $check = getimagesize($_FILES["subcatimage"]["tmp_name"]);
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

$target_file = $target_dir . basename($id.'.'.$ext[0]);


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
$target_file=preg_replace('/\.\.\/\.\.\//', '', $target_file);

$subcat= 'update `subcategory`set photo="'.$target_file.'" where id="'.$subcatid.'"';
echo $subcat;
$createsubcat= $conn->prepare($subcat);
$createsubcat->execute();

}



header('location:http://localhost/foodtruck/adminpanelft/login/modifysubcatpage');


?>