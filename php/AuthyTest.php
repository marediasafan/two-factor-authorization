<?php
/**
 * Created by PhpStorm.
 * User: s_maredia
 * Date: 16-Dec-16
 * Time: 12:40 PM
 */

require 'vendor/autoload.php';

$apiKey = '4JK68jp8fZUiLPA77OX6rmEAilXmhjZo';
//$apiUrl = 'http://sandbox-api.authy.com';
$apiUrl = 'http://api.authy.com';

$apiClient = new Authy\AuthyApi($apiKey, $apiUrl);

$phoneInfo = $apiClient->phoneInfo('438-993-2052', '1');
print_r($phoneInfo);

die;
$user = $apiClient->registerUser('test@email.com', '438-993-2052', 1);

var_dump($user->ok());

if ($user->ok()) {
	printf("User OK");
	$res = $apiClient->phoneVerificationStart('438-993-2052', '1', 'sms');
	var_dump($res->ok());
} else {
	foreach($user->errors() as $field => $message) {
		printf("$field = $message");
	}
}

die();