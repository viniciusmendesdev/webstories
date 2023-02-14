<?php

/*

include 'config.php';

if(isset($_POST['email']) || isset($_POST['senha'])){

	if(strlen($_POST['email']) == 0){
		echo 'Prencha o e-mail';
	}elseif(strlen($_POST['senha']) == 0){
		echo 'Preencha a senha';
	}else{

		$email = $mysqli->real_escape_string($_POST['email']);
		$senha = $mysqli->real_escape_string($_POST['senha']);

		
		$sql_code = "SELECT * FROM usuarios WHERE email = '$email' ";
		$sql_query = $mysqli->query($sql_code)or die("Erro 2");
		$usuario = $sql_query->fetch_assoc();

		if(password_verify($senha, $usuario['senha'])){

			if(!isset($_SESSION)){
				session_start();
			}

			$_SESSION['id'] = $usuario['id'];
			header("Location: painel.php"); 

		}else{

			echo 'Erro ao Logar';
		}

	}
}
*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel de Anúncios</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/2736d36132.js" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<link rel="stylesheet" href="style_index.css">
</head>
<body>

	<?php
		echo $_GET['form'];
	?>

	<style>
		.form{
			background-color: #fff;
			padding: 30px;
			border-radius: 4px;
		}
		.btn{
			width: 100%;
		}
		h4{
			margin-bottom: 40px;
		}
		.form-control{
			margin-bottom: 30px;
		}
	</style>

	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-5 shadow form">
			<h4>Painel</h4>
				<div id="resultado"></div>
		
				<div class="form-group">
				<input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="email">
				</div>
				<div class="form-group">
				<input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="senha">
				</div>
				<div class="form-group">
					<button id="enviar" type="submit" class="btn btn-success">Entrar</button>
				</div>
				<input type="hidden" id="acao" value="login">
				<a href="index-recover.php" class="btn btn-primary">Recuperar senha</a>
			</div>
		</div>
	</div>

	


	<script>
      $(document).ready(function() {
            $("#enviar").click(function() {    
            //enviando para a página de cadastro
            $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {
						acao :$("#acao").val(),
						email :$("#email").val(),
						senha :$("#senha").val(),
                        
                    }, // dados enviados
                    beforeSend: function() {
                        $("#resultado").html('<img width="30px" src="images/loading-gif.gif" alt=""> <p>Verificando dados...</p>'); // antes de enviar
                    },

                    success: function(result) {
                        $("#resultado").html(result);
                        // depois de executados os scripts na url requisitada
                    },
                }) //end ajax
                return false
            })
        });
 </script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	

	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</body>
</html>