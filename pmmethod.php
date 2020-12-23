<?php



function request() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "entityId=8ac7a4c8765289b001765d5ee2fc15ac" .
                "&amount=92.00" .
                "&currency=SAR" .
                "&paymentBrand=MASTER" .
                "&paymentType=DB" .
                "&card.number=5204730000002514" .
                "&card.holder=Jane Jones" .
                "&card.expiryMonth=05" .
                "&card.expiryYear=2022" .
                "&card.cvv=251".
                "&shopperResultUr=";

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
	return $responseData;
}
echo $responseData = request();






?>