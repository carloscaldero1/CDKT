#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//Error logging system.
function logErrors($error_level, $error_string, $filename, $line_number){

	date_default_timezone_set('America/New_York');
	$time = date("M/d/Y | h:i:sa");
	$file  = "[$time] Error: $error_level, $error_string in $filename at line $line_number. \n";

 	$client = new rabbitMQClient("testRabbitMQ.ini","logServer");
	$request = array();
	$request['type'] = "log-error";
  	$request['message'] = $file;

	$response = $client->send_request($request);
	#$response = $client->publish($request);
 	return $response;
}

?>
