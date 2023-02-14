<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$sqlAnuncios = $mysqli->query("SELECT * FROM quiz WHERE id_usuario = '$idUser' ")or die($mysqli->error);
$conAnuncios = mysqli_num_rows($sqlAnuncios);
			
?>

<!--Container Main start-->
<div class="height-100 bg-light">

		<div class="row">
			<div class="col-sm">
				<a href="anuncio-new.php" class="btn btn-primary">Criar Novo</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm">

				<h4>Seus Quizes</h4>


	<?php 
		while($resAnuncios = $sqlAnuncios->fetch_assoc()){
			?>		
				<div class="col-md quiz">
					<h6><?=$resAnuncios['nome']?></h6>

					<hr>

					<a target="_blank" class="btn btn-primary btn-sm" href="<?=$baseUrl?>/<?=$resAnuncios['pagina']?>">
						<i class='bx bx-link-alt'></i> Ver Quiz
					</a>
					
					<a class="btn btn-primary btn-sm" href="pergunta-new.php?idQuiz=<?=$resAnuncios['id']?>">
						<i class='bx bx-layer'></i> Perguntas
					</a>

					<a class="btn btn-primary btn-sm" href="anuncio-edit.php?idQuiz=<?=$resAnuncios['id']?>">
						<i class='bx bxs-edit-alt'></i> Editar Quiz
					</a>

					<a class="btn btn-primary btn-sm" href="contatos.php?idQuiz=<?=$resAnuncios['id']?>" >
						<i class='bx bxs-envelope' ></i> Ver contatos
					</a>

					<a href="#" class="btn btn-danger btn-sm">
						<i class='bx bx-x-circle'></i> Deletar Quiz
					</a>
					
				</div>
					
					
			
				
			<?php
		}
		?>
				
				
			</div>
		</div>
		
	

</div>



<!--Container Main end-->
    
<script type="text/javascript">
		$(document).ready(function() {
				$("#enviar").click(function() {
				//enviando para a página de cadastro
				$.ajax({
						url: "acao_edita_anuncio.php", // url requisitada
						type: "POST", // tipo do envio dos dados

						data: { 
								acao 		:$("#acaoCateg").val(),   
								categoria   :$("#categoria").val(),
						}, // dados enviados
						beforeSend: function() {
							$("#resultado").html('<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_632/04de2e31234507.564a1d23645bf.gif" width="32"> <b>Aguarde...</b><br><br>'); // antes de enviar
						},
						success: function(result) {
							$("#resultado").html(result); // depois de executados os scripts na url requisitada
						},
					}) //end ajax
				return false
			})
		});
	</script>

<?php include('footer.php'); ?>