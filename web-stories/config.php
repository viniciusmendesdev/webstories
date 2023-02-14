<?php



$local = 1;

define('HOST','localhost');
define('USER','root');
define('PASS','root');
define('DBSA','stories');

if($local == 0):
	$user = 'root';
	$pass = 'root';
	$host = 'localhost';
	$bank = 'stories';
else:
	$host = HOST;
	$bank = DBSA;
	$user = USER;
	$pass = PASS;
endif;



$mysqli = new mysqli($host, $user, $pass, $bank);
$mysqli -> set_charset("utf8mb4");
if($mysqli->error){
	die("Erro ao conectar" . $mysqli->error);
}else{
	//echo 'conectado';
}

$baseUrl = 'http://localhost:8888/webstories/stories';




