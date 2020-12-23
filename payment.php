<?php
require "connect.php";
require "sql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{


function request() {
$post = file_get_contents("php://input");

preg_match('/(?<=amount":").+?(?=")/',$post,$amount);

    $url = "https://test.oppwa.com/v1/checkouts";
    $data = "entityId=8ac7a4c8765289b001765d5ee2fc15ac" .
                "&amount=".$amount[0]."" .
                "&currency=EUR" .

                "&paymentType=DB" ;


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzg3NjUyODliMDAxNzY1ZDVkZjVmYzE1YTh8N2pncEVSM1I4RA=='));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);
    if(curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);

    preg_match('/(?<=code":").+?(?=")/', $responseData,$code);

    if($code[0]!="000.100.110"){
        http_response_code(400);
    }

    return $responseData;

}
echo $responseData = request();

}catch(Exception $e){
    http_response_code(400);
}




}else{
http_response_code(400);



}
?>