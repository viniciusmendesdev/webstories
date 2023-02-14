<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$categ = $_GET['categ'];
$sqlCateg = $mysqli->query("SELECT * FROM tbl_categoria WHERE url = '$categ' ")or die($mysqli->error);
$numCateg = $sqlCateg->num_rows;

if($numCateg == 0):
	mensagem('Categoria não encontrada','danger');
else:

$resCateg = $sqlCateg->fetch_assoc();	
	
?>

<!--Container Main start-->
<div class="height-100 bg-light">

	<h4><?=$resCateg['categoria']?></h4>
	<div class="col-sm-4">
			<h5>Cadastrar Sub Categorias</h5>
			<div class="form-group">
				<input type="hidden" id="id_categ" class="form-control" value="<?=$resCateg['id']?>">
				<input type="text" id="subcategoria" class="form-control" value="">
				<input type="hidden" id="acaoCateg" class="form-control" value="cadSubCategoria" >
			</div>

			
			<div id="resultado"></div>
		<button id="enviar" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Cadastrar Subcategoria</button>
	</div>
	<br>
	<div class="col-sm-5">
			<h5>SubCategorias Cadastradas</h5>
			<hr>
			<?php
			$idCateg = $resCateg['id'];
			$sqlCategorias = $mysqli->query("SELECT * FROM tbl_subcategoria WHERE id_categoria = '$idCateg'")or die($mysql->error);
			while($resCateg = $sqlCategorias->fetch_assoc()){
			?>
				<a href="admin-subcategoria.php?categ=<?=$resCateg['url']?>" class="btn btn-default"><?=$resCateg['subcategoria']?></a>
			<?php
			}
			?>
	</div>



	

</div>

   
    <!--Container Main end-->
    
<?php endif; ?>
	<script type="text/javascript">
	$(document).ready(function() {
			$("#enviar").click(function() {
			//enviando para a página de cadastro
			$.ajax({
					url: "acao_edita_anuncio.php", // url requisitada
					type: "POST", // tipo do envio dos dados

					data: { 
							acao 		:$("#acaoCateg").val(),
							id_categ 	:$("#id_categ").val(),   
							subcategoria   :$("#subcategoria").val(),
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