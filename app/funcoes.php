<?php

include ('config.php');

$idUser = $_SESSION['id'];

try {

$sqlUsuarios 	= $mysqli->query("SELECT * FROM usuarios WHERE id = '$idUser' ")or die("Erro de instrução >> functions.xml".$mysqli->error);

$conUer 		= $sqlUsuarios->num_rows;
$resUser 		= $sqlUsuarios->fetch_assoc();

} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}


$idUser 	= $resUser['id'];
$nome		= $resUser['nome'];
$cpf		= $resUser['cpf'];
$email		= $resUser['email'];
$zap 		= $resUser['zap'];
$dataCadastro = $resUser['data_cadastro'];
$baseUrl = 'http://localhost:8888/webstories/stories';

function mensagem($mensagem, $classe){
    echo '<div class="alert alert-'.$classe.'">'.$mensagem.'</div>';
}


function reload($direciona, $tempo){
	echo "<script language= \"JavaScript\">setTimeout(\"document.location='".$direciona."'\",".$tempo.");</script>";
}

function data($data){
  echo date('d/m/Y', strtotime($data));
}


function urlAnuncio($string){
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª`';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
		$string = utf8_decode($string);
		
		$string = strtr($string, utf8_decode($a), $b);
		
		$string = strip_tags(trim($string));
		$string = str_replace(" ","-",$string);
		$string = str_replace(array("-----","----","---","--"),"-",$string);
		return strtolower(utf8_encode($string));
	
}


?>