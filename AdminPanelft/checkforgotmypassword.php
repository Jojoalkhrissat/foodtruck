<?php
require "../connect.php";
require "../sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{

session_start();
$email=$_SESSION['email'];
$passcode=$_POST['passcode'];
$newpassword=$_POST['newpassword'];
$confirmnewpassword=$_POST['confirmnewpassword'];
if($newpassword==$confirmnewpassword){


$checkuser ='SELECT * FROM shop WHERE email="'.$email.'"';
$count=sql_selectcount($checkuser,$conn);

if($count==1){
    
$MyJsonData=sql_selectdata($checkuser,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);



$forgotmypassword= 'SELECT * FROM `forgotmypassword` WHERE  shop='.$id[0].' and passcode='.$passcode.'';
$checkcode=sql_selectcount($forgotmypassword,$conn);

if($checkcode==1){

$updatepass= 'UPDATE loginandregister set password="'.$newpassword.'" WHERE shopid='.$id[0].'';
sql_update($updatepass,$conn);


$removeentry= 'DELETE FROM forgotmypassword WHERE shop='.$id[0].'';
sql_delete($removeentry,$conn);



echo '[{"Message":"you changed your password successfully"}]';
header("Location: ".$baseurl."/adminpanelft/login");




















}else{
echo "<h1>make sure the two passwords match</h1>";
sleep(10);
header("Location: ".$baseurl."/adminpanelft/entercode");
}


}else{
http_response_code(401);
header("Location: ".$baseurl."/adminpanelft/forgot-password");
}

}else{
echo "<h1>make sure the two passwords match</h1>";	
sleep(5);
header("Location: ".$baseurl."/adminpanelft/entercode");

}






}catch(Exception $e){
http_response_code(400);

}
}else{
http_response_code(400);



}







?>