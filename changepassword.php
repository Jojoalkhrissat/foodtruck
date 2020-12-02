<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents('php://input');
preg_match('/(?<=phonenumber":").+?(?=")/',$post,$phonenumber);
preg_match('/(?<=oldpassword":").+?(?=")/',$post,$oldpassword);
preg_match('/(?<=newpassword":").+?(?=")/',$post,$newpassword);
if(!isset($phonenumber[0])&&!isset($newpassword[0])&&!isset($oldpassword[0])){
preg_match('/(?<=phonenumber=).+?(?=&|$)/',$post,$phonenumber);
preg_match('/(?<=oldpassword=).+?(?=&|$)/',$post,$oldpassword);
preg_match('/(?<=newpassword=).+?(?=&|$)/',$post,$newpassword);
}

$checkuser ='SELECT id,usertype,adminid,customerid,driverid FROM `loginandregister` WHERE username="'.$phonenumber[0].'" AND password="'.$oldpassword[0].'"';
$count=sql_selectcount($checkuser,$conn);
$MyJsonData=sql_selectdata($checkuser,$conn);
preg_match('/(?<=id":").+?(?=")/',$MyJsonData,$id);
if($count==1){
$updatepass= 'UPDATE loginandregister set password="'.$newpassword[0].'" where id='.$id[0].'';
sql_update($updatepass,$conn);






echo '[';

echo'{"Message":"your password was changed"}';
echo "]";
}else{
http_response_code(401);
echo '[';

echo '{"Message":"your password is not correct"}';
echo "]";

}

}catch(Exception $e){
http_response_code(401);
echo '[';

echo '{"Message":"something went wron"}';
echo "]";
}
}else{
	http_response_code(401);
echo '[';

echo '{"Message":"something went wron"}';
echo "]";
}




?>