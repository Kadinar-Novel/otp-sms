<?php
ob_start();
// setting 
$apikey      = ''; // api key, you can get from adsmedia.com
$urlserver   = ''; // url server sms, you can get from adsmedia.com
$callbackurl = ''; // url callback get status sms 
$senderid    = '0'; // Option senderid 0=Sms Long Number / 1=Sms Masking/Custome Senderid

// create header json  
$senddata = array(
	'apikey' => $apikey,  
	'callbackurl' => $callbackurl, 
	'senderid' => $senderid, 
	'datapacket'=>array()
);

// create detail data json 
// data 1

$number=$_GET['no_hp'];
$kode_otp=$_GET['kode_otp'];
$message='Your OTP Code is '.$_GET['kode_otp'];
array_push($senddata['datapacket'],array(
	'number' => trim($number),
	'message' => $message
));
// sending  
$data=json_encode($senddata);
$curlHandle = curl_init($urlserver);
curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
);
curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
$respon = curl_exec($curlHandle);

$curl_errno = curl_errno($curlHandle);
$curl_error = curl_error($curlHandle);	
$http_code  = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
curl_close($curlHandle);
if ($curl_errno > 0) {
	$senddatax = array(
	'sending_respon'=>array(
		'globalstatus' => 90, 
		'globalstatustext' => $curl_errno."|".$http_code)
	);
	$respon=json_encode($senddatax);
} else {
	if ($http_code<>"200") {
		$senddatax = array(
		'sending_respon'=>array(
			'globalstatus' => 90, 
			'globalstatustext' => $curl_errno."|".$http_code)
		);
		$respon= json_encode($senddatax);	
	}
}	
header("location:../form-otp.php");
//header('Content-Type: application/json');
//echo $respon;
?>
