<?php



include ('funcoes.php');



$acao = strip_tags(trim(addslashes($_POST['acao'])));

if($acao == 'recuperar'){

	$email = strip_tags(trim(addslashes($_POST['email'])));

	if(empty($email)){
		mensagem('Digite o email','danger');
	}else{
		$sqlEmail = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email' ")or die($mysqli->error);
		$conEmail = mysqli_num_rows($sqlEmail);
		if($conEmail < 1){
			mensagem("Email não encontrado na base de dados. Favor falar com admin","danger");
		}else{
			
			$senhaCriada = '123456';
			$senha = password_hash($senhaCriada, PASSWORD_DEFAULT);

			$sqlSenha = $mysqli->query("UPDATE usuarios SET senha = '$senha' WHERE email = '$email' ")or die($mysqli->error);
			if($sqlSenha == true){
				mensagem('Senha criada com sucesso!','success');
				//include 'acao_recupera_senha';

			}else{
				mensagem('Erro desconhecido','danger');
			}
		}



	}
}else{
		

	if(isset($_POST['email']) || isset($_POST['senha'])){

		if(strlen($_POST['email']) == 0){
			echo 'Prencha o e-mail';
		}elseif(strlen($_POST['senha']) == 0){
			echo 'Preencha a senha';
		}else{

			$email = $mysqli->real_escape_string($_POST['email']);
			$senha = $mysqli->real_escape_string($_POST['senha']);

			$sql_code = "SELECT * FROM usuarios WHERE email = '$email' ";
			$sql_query = $mysqli->query($sql_code)or die("Erro 2 login.xml". $mysqli->error);
			$usuario = $sql_query->fetch_assoc();

			if(password_verify($senha, $usuario['senha'])){

				if(!isset($_SESSION)){
					session_start();
				}

				$_SESSION['id'] = $usuario['id'];
				?>

				<img width="30px" src="images/loading-gif.gif" alt="">
				<p>Acessando, aguarde...</p>
				<?php
				reload('painel.php', '2000');
				//header("Location: painel.php"); 

			}else{

				echo 'Dados inválidos. Verifique seus dados e tente novamente';
			}
		}
	}




}


?>