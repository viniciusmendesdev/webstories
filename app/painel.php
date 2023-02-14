<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$sqlAnuncios = $mysqli->query("SELECT * FROM quiz WHERE id_usuario = '$idUser' ")or die($mysqli->error);
$conAnuncios = mysqli_num_rows($sqlAnuncios);
			
?>


<!--Container Main start-->
<div id="inicio">
	<div class="row">
		<div class="col-md">
			<h4>Dashboard</h4>
		</div>
	</div>

	<div class="row">
		<div class="card" style="width: 18rem; padding:0;">
			<img src="images/webs-stories.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Web Stories</h5>
				<p class="card-text">Crie suas Web Stories de uma forma mais fácil e mais rápida sem Plugin!</p>
				<a href="web-stories.php" class="btn btn-primary">Acessar</a>
			</div>
		</div>	
		<div class="card" style="width: 18rem;">
		<img src="images/quiz.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Quiz</h5>
				<p class="card-text">Sistema de quiz com perguntas e respostas ilimitadas para  seu público em apenas 5 minutos</p>
				<a href="quiz.php" class="btn btn-primary">Acessar</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		
			<?php
			/*
			$text = <<<TEXT
				<p>Hello!</p>
				<p>How are you,today?</p>
				<p>Aqui fica o terceiro parágrafo!</p>;
			TEXT;
			
			$dom = new DOMDocument();
			$paragraphs = array();
			$dom->loadHTML($text);
			foreach($dom->getElementsByTagName('p') as $node)
			{
				$paragraphs[] = $dom->saveHTML($node);
			}
			
			$sqlTeste = $mysqli->query("SELECT * FROM stories_pages WHERE id_stories = '5'")or die($mysqli->error);
			$conTeste = mysqli_num_rows($sqlTeste);
			while($resTeste = $sqlTeste->fetch_assoc()){
				echo '<p>'.$resTeste['texto'].'</p>';
			}

			foreach($paragraphs as $value){
				echo '<div>';
				echo $value.'<br>';
				echo '</div>';
				echo '<hr>';
			}

			*/

			?>
	</div>
</div>

<?php include('footer.php'); ?>