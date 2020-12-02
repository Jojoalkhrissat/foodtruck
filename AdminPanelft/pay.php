<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$post = file_get_contents("php://input");


preg_match('/(?<=amount":").+?(?=")/',$post,$amount);
preg_match('/(?<=currency":").+?(?=")/',$post,$currency);
preg_match('/(?<=paymentbrand":").+?(?=")/',$post,$paymentbrand);
preg_match('/(?<=cardnumber":").+?(?=")/',$post,$cardnumber);
preg_match('/(?<=cardholder":").+?(?=")/',$post,$cardholdername);
preg_match('/(?<=cardexpiryYear":").+?(?=")/',$post,$cardexpiaryyear);
preg_match('/(?<=cardexpiryMonth":").+?(?=")/',$post,$cardexpiarymonth);
preg_match('/(?<=cardcvv":").+?(?=")/',$post,$cvv);
if(!isset($amount[0])&&!isset($currency[0])){
preg_match('/(?<=amount=).+?(?=&|$)/',$post,$amount);
preg_match('/(?<=currency=).+?(?=&|$)/',$post,$currency);
preg_match('/(?<=paymentbrand=).+?(?=&|$)/',$post,$paymentbrand);
preg_match('/(?<=cardnumber=).+?(?=&|$)/',$post,$cardnumber);
preg_match('/(?<=cardholder=).+?(?=&|$)/',$post,$cardholdername);
preg_match('/(?<=cardexpiryYear=).+?(?=&|$)/',$post,$cardexpiaryyear);
preg_match('/(?<=cardexpiryMonth=).+?(?=&|$)/',$post,$cardexpiarymonth);
preg_match('/(?<=cardcvv=).+?(?=&|$)/',$post,$cvv);
}




	$url = "https://test.oppwa.com/v1/payments";
	$data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=".$amount[0]."" .
                "&currency=EUR" .
                "&paymentBrand=".$paymentbrand[0]."" .
                "&paymentType=DB" .
                "&card.number=".$cardnumber[0]."" .
                "&card.holder=".$cardholdername[0]."" .
                "&card.expiryMonth=".$cardexpiarymonth[0]."" .
                "&card.expiryYear=".$cardexpiaryyear[0]."" .
                "&card.cvv=".$cvv[0]."" .
                "&recurringType=INITIAL" .
                "&createRegistration=true";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	







echo $responseData;
}catch(Exception $e){
http_response_code(400);
}}else{
http_response_code(400);
}
?>