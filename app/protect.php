<?php

if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['id'])){
	die('Acesso restrito. Faça login para acessar. <a href="index.php">Fazer Login</a>');

}

?>
