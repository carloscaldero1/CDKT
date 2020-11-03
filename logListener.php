#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('logRMQLib.inc');

// creates new file  and store logs.
function storeLogs($message, $fileName){
	$file = fopen("./logs/$fileName" . '.log', 'a' );
        fwrite( $file, $message);
	fclose($file);
	}

//route the request from client.
function requestProcessor($request){
  	echo "Received Request:\n\n";
	var_dump($request);

	if(!isset($request['type'])){
    		return "ERROR: unsupported message type";
	}

switch ($request['type']){
	case "log-error":
      		 return storeLogs($request['message'], "Errors");
		break;
    	case "log-login":
		return storeLogs($request['message'], "Login");
		break;
	case "log-register":
		return  storeLogs($request['message'], "Register");
		break;
    	case "log-SQL":
      		return storeLogs($request['message'], "SQL");
		break;
	}	

}
//creating a new serverr
$server = new rabbitMQServer('testRabbitMQ.ini', 'logServer');
//processes the request sent by client
$server->process_requests('requestProcessor');
   
?>
