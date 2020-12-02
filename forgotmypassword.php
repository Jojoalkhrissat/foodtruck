<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=email":").+?(?=")/',$post,$email);

if(!isset($email[0])&&!isset($phonenumber[0])){
preg_match('/(?<=email=).+?(?=&|$)/',$post,$email);

}

$checkuser ='SELECT * FROM customers WHERE email="'.$email[0].'"';
$count=sql_selectcount($checkuser,$conn);

if($count==1){
	
$MyJsonData=sql_selectdata($checkuser,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);

$digits = 7;
$passcode= rand(pow(10, $digits-1), pow(10, $digits)-1);

$forgotmypassword= 'INSERT INTO `forgotmypassword`(`customer`,`passcode`) VALUES ('.$id[0].','.$passcode.')';
sql_insert($forgotmypassword,$conn);












$msg = "Hi, this is the food truck application password forgot service,your code is ".$passcode." Please enter it in the field appearing on the application";

$msg = wordwrap($msg,70);

mail($email[0],"forgot your password",$msg);


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