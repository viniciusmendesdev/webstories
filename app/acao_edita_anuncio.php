<?php

include ('funcoes.php');


$acao = $_POST['acao'];

if($acao == 'cadResposta'){	
	
	$idPergunta = strip_tags(trim(addslashes($_POST['idPergunta'])));
	$resposta 	= strip_tags(trim(addslashes($_POST['resposta'])));

	if(empty($resposta)){
		mensagem('Digite a resposta','danger');
	}else{
		$sqlResposta = $mysqli->query("INSERT INTO resposta (id_pergunta, resposta)VALUES('$idPergunta','$resposta')")or die($mysqli->error);
		mensagem('Sucesso!','success');
		reload('resposta-new.php?idPergunta='.$idPergunta,1000);
	}
	

}elseif($acao == 'cadPergunta'){


	$idUser 	= strip_tags(trim(addslashes($_POST['idUser'])));
	$idQuiz 	= strip_tags(trim(addslashes($_POST['idQuiz'])));
	$pergunta 	= strip_tags(trim(addslashes($_POST['pergunta'])));

	if(empty($pergunta)){
		mensagem('Digite a pergunta','danger');
	}else{
		$sqlPergunta = $mysqli->query("INSERT INTO pergunta(id_quiz, pergunta)VALUES('$idQuiz','$pergunta')")or die($mysqli->error);
		mensagem('Pergunta gravada com sucesso','success');
		reload('pergunta-new.php?idQuiz='.$idQuiz, 1000);
	}

}elseif($acao == 'cadAnuncio'){
	
	$idUser 		= strip_tags(trim(addslashes($_POST['idUser'])));
	$titulo 		= strip_tags(trim(addslashes($_POST['titulo'])));
	$urlDestino 	= strip_tags(trim(addslashes($_POST['urlDestino'])));
	$urlPagina = urlAnuncio($titulo).'-'.strtotime("now");
	$frasefinal    	= strip_tags(trim(addslashes($_POST['frasefinal'])));

	if(empty($titulo)){
		mensagem('Digite um nome para o Quiz','danger');
	}elseif(empty($urlDestino)){
		mensagem('Digite a URL de destino','danger');
	}elseif(empty($frasefinal)){
		mensagem('Digite uma Frase para o formulário final','danger');
	}else{

		
		$sqlGravaQuiz = $mysqli->query("INSERT INTO quiz (id_usuario, nome, urlDestino, pagina, frasefinal)
		VALUES('$idUser','$titulo','$urlDestino','$urlPagina', '$frasefinal')")or die($mysqli->error);

		mensagem('Aguarde...','success');

		reload('painel.php',1000);

	}// Fecha verificador de campos vazios

}elseif($acao == 'editaAnuncio'){
	
	$idQuiz 		= strip_tags(trim(addslashes($_POST['idQuiz'])));
	$idUser 		= strip_tags(trim(addslashes($_POST['idUser'])));
	$titulo 		= strip_tags(trim(addslashes($_POST['titulo'])));
	$urlDestino 	= strip_tags(trim(addslashes($_POST['urlDestino'])));
	$frasefinal    	= strip_tags(trim(addslashes($_POST['frasefinal'])));
	//$urlPagina = urlAnuncio($titulo).'-'.strtotime("now");

	if(empty($urlDestino)){
		mensagem('Digite a URL de destino','danger');
	}elseif(empty($titulo)){
		mensagem('Digite um nome para o Quiz','danger');
	}else{

		
		$sqlGravaQuiz = $mysqli->query("UPDATE quiz SET nome='$titulo', urlDestino='$urlDestino', frasefinal='$frasefinal' WHERE id = '$idQuiz' ")or die($mysqli->error);
		
		if($sqlGravaQuiz == true){
			mensagem('Editando, aguarde...','success');
			reload('painel.php',1000);
		}else{
			echo 'Erro ao atualizar';
		}
	

	}// Fecha verificador de campos vazios

}
  
    

?>