<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{

$post = file_get_contents('php://input');
preg_match('/(?<=email":").+?(?=")/',$post,$email);
preg_match('/(?<=passcode":").+?(?=")/',$post,$passcode);
preg_match('/(?<=newpassword":").+?(?=")/',$post,$newpassword);
if(!isset($email[0])&&!isset($passcode[0])){
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);
preg_match('/(?<=passcode=).+?(?=&|$)/',$post,$passcode);
preg_match('/(?<=newpassword=).+?(?=&|$)/',$post,$newpassword);
}

$checkuser ='SELECT * FROM customers WHERE email="'.$email[0].'"';
$count=sql_selectcount($checkuser,$conn);

if($count==1){
    
$MyJsonData=sql_selectdata($checkuser,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);



$forgotmypassword= 'SELECT * FROM `forgotmypassword` WHERE  customer='.$id[0].' and passcode='.$passcode[0].'';
$checkcode=sql_selectcount($forgotmypassword,$conn);

if($checkcode==1){

$updatepass= 'UPDATE loginandregister set password="'.$newpassword[0].'" WHERE customerid='.$id[0].'';
sql_update($updatepass,$conn);


$removeentry= 'DELETE FROM forgotmypassword WHERE customer='.$id[0].'';
sql_delete($removeentry,$conn);



echo '[{"Message":"you changed your password successfully"}]';

}else{
http_response_code(401);

}

}else{
http_response_code(401);

}






}catch(Exception $e){
http_response_code(400);

}
}else{
http_response_code(400);



}







?>