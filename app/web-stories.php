<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$sqlAnuncios = $mysqli->query("SELECT * FROM quiz WHERE id_usuario = '$idUser' ")or die($mysqli->error);
$conAnuncios = mysqli_num_rows($sqlAnuncios);
			
?>


<div id="inicio">
<!--Container Main start-->
		<div class="row">
				<h4>Seus Web Stories</h4>
                <div class="col-sm-3" style="margin-bottom: 30px;">
                    <a href="web-stories-novo.php" class="btn btn-primary">Criar Web Stories</a>
                </div>
		</div>
        <div class="row">

		<?php 
			$sqlWeb = $mysqli->query("SELECT * FROM stories ORDER BY id desc")or die($mysqli->error);
			$conWeb = mysqli_num_rows($sqlWeb);
			while($resWeb = $sqlWeb->fetch_assoc()){
		?>

			<div class="card shadow" style="width: 18rem;">
				<img src="<?=$resWeb['capa']?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?=$resWeb['titulo']?></h5>
					<hr>
					<a href="web-stories-paginas.php?pagina=<?=$resWeb['id']?>" class="btn btn-primary btn-sm">Páginas</a>
					<a href="<?=$baseUrl?>/web-stories/<?=$resWeb['url']?>" target="_blank" class="btn btn-dark btn-sm">Acessar</a>
				</div>
			</div>
    	<?php } ?>
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