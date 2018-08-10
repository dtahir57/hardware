<?php 
return [
	'client_id' => env('PAYPAL_CLIENT', ''),
	'client_secret' => env('PAYPAL_SECRET', ''),
	'settings' => array (
		'mode' => env('PAYPAL_MODE', ''),
		'http.ConnectionTimeOut' => 30,
		'log.LogEnabled' => true, 
		'log.FileName' => storage_path() . '/logs/paypal.log',
		'log.LogLevel' => 'ERROR',
	)
]
?>