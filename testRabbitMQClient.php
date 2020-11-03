#!/usr/bin/php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('logDmz.php');
echo "$argv[2]";
set_error_handler('logErrors');

function sendSongs($songKey,$name,$album,$artist,$releaseDate,$length,$popularity,$danceability,$energy,$key,$mode,$demoLink){
	$client = new rabbitMQClient("testRabbitMQ.ini","dmzServer");
	$request = array();

	$request['type'] = 'spotifyTracks';
	$request['songKey'] = $songKey;
	$request['name'] = $name;
	$request['album'] = $album; 
	$request['artist'] = $artist; 
	$request['releaseDate'] = $releaseDate;	
	$request['length'] = $length;
	$request['popularity'] = $popularity;
	$request['danceability'] = $danceability; 
	$request['energy'] = $energy;
	$request['key'] = $key;
	$request['mode'] = $mode;
	$request['demoLink'] = $demoLink;

	$response = $client->send_request($request);
	
	return $response;
}


sendSongs($argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10], $argv[11], $argv[12]);
