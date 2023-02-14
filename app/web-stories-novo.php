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
				<h4>Criar Web Stories</h4>
		</div>
        <div class="row">
            <div id="formulario">
                <div class="mb-3">
                    <label for="" class="form-label">Titulo do Web Stories</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Digite o Título do seu Web Stories">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Link da Capa</label>
                    <input type="text" class="form-control" id="capa" placeholder="Cole o link da Capa">
                </div>
				<div class="mb-3">
					<textarea name="" class="form-control" id="descricao" maxlength="200" placeholder="Descrição" ></textarea>
				</div>

				<span style="margin-bottom: 20px;" class="badge badge-danger" id="conta">200</span>
                   
				<script>
				var textArea = document.querySelector('#descricao');
				textArea.addEventListener('input', function(){
					let caracterMax = textArea.maxLength;
					let digitando = textArea.value.length;
					document.querySelector('#conta').innerText = (caracterMax - digitando)
				})
				</script>

                <div class="mb-3">
                    <div id="resultado"></div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" id="enviar">Gravar</button>
                </div>
            </div>
        </div>
		<hr>
		<div class="row">
			<p><b>Instruções</b></p>
			<li>Título: Use no máximo 10 palavras ou 70 caracteres</li>
			<li>Capa: Procure uma imagem na internet <a href="https://images.google.com" target="_blank">Google Images</a>, abra a imagem em uma nova aba, copie a url pura da imagem e cole no campo "Link da Capa". </li>
			<li>As URLs deve terminar com uma extensão de imagem. Ex: .jpg | .png | .webp</li>
			<li>Após gravar esses dados você poderá criar mais páginas.</li>
		</div>
		
	

</div>



<!--Container Main end-->
    
<script type="text/javascript">
		$(document).ready(function() {
				$("#enviar").click(function() {
				//enviando para a página de cadastro
				$.ajax({
						url: "acao_cria_web.php", // url requisitada
						type: "POST", // tipo do envio dos dados

						data: { 
                                titulo 		:$("#titulo").val(),   
								capa    	:$("#capa").val(),
								descricao	:$("#descricao").val()
						}, // dados enviados
						beforeSend: function() {
							$("#resultado").html('<img src="https://i.pinimg.com/originals/3e/f0/e6/3ef0e69f3c889c1307330c36a501eb12.gif" width="32"> <b> ✋🏼 Espera caralho!...</b><br><br>'); // antes de enviar
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