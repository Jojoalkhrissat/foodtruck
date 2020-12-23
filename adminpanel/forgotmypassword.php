<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
	session_start();

$email=$_POST['email'];
$_SESSION['email']=$email;



$checkuser ='SELECT * FROM admin WHERE email="'.$email.'"';
$count=sql_selectcount($checkuser,$conn);

if($count==1){
	
$MyJsonData=sql_selectdata($checkuser,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);

$digits = 7;
$passcode= rand(pow(10, $digits-1), pow(10, $digits)-1);

$forgotmypassword= 'INSERT INTO `forgotmypassword`(`shop`,`passcode`) VALUES ('.$id[0].','.$passcode.')';
sql_insert($forgotmypassword,$conn);












$msg = "Hi, this is the food truck application password forgot service,your code is ".$passcode." Please enter it in the field appearing on the application";

$msg = wordwrap($msg,70);

mail($email,"forgot your password",$msg);
header("Location: http://localhost/foodtruck/adminpanel/entercode");

}else{
echo "<h1>Wrong Email</h1>";


sleep(10);


header("Location: http://localhost/foodtruck/adminpanel/forgot-password");
}






}catch(Exception $e){
http_response_code(400);
}
}else{
http_response_code(400);



}












?>