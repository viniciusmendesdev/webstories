<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$str = strip_tags(trim(addslashes($_GET['str'])));
$idWeb = strip_tags(trim(addslashes($_GET['pagina'])));

//Chama os dados das páginas
$sqlPages = $mysqli->query("SELECT * FROM stories_pages WHERE id = '$idWeb'")or die($mysqli->error);
$conPages = mysqli_num_rows($sqlPages);
$resPages = $sqlPages->fetch_assoc();
			
?>

<style>
    .col-md-5{
        background-color: #fff;
        margin: 10px;
        padding: 30px;
        border: 1px solid #ccc;
        border-style: dashed;
    }
    .col-md-5 h3{
        font-size: 22px;
        display: block;
    }
</style>
<div id="inicio">
<!--Container Main start-->
		<div class="row">
			<h4>Criar Páginas</h4>
		</div>	
        <div class="row">
            <div class="col-md-5">
                <h3 style="margin-bottom: 30px;"><b><?=$resStr['titulo']?></b></h3>
                <div id="formulario">
                    <div class="mb-3">
                        <label for="" class="form-label">Título Principal (*não obrigatório)</label>
                        <input type="text" value="<?=$resPages['titulo']?>" class="form-control" id="titulo" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Link Imagem de Fundo</label>
                        <input type="text" value="<?=$resPages['imagem_bg']?>" class="form-control" id="linkBg" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Texto</label>
                        <textarea name="" id="texto" class="form-control" rows="4" maxlength="160"><?=$resPages['texto']?></textarea>
                    </div>
                    <span style="margin-bottom: 20px;" class="badge badge-primary" id="conta">160</span>
                    <script>
                    var textArea = document.querySelector('#texto');
                    textArea.addEventListener('input', function(){
                        let caracterMax = textArea.maxLength;
                        let digitando = textArea.value.length;
                        document.querySelector('#conta').innerText = (caracterMax - digitando)
                    })
                    </script>

                    <div class="mb-3">
                        <label for="" class="form-label">Link do Botão (Link do artigo)</label>
                        <input type="text" value="<?=$resPages['botao']?>" class="form-control" id="linkBotao" placeholder="">
                    </div>

                    <input type="hidden" id="idStories" value="<?=$idWeb?>">

                    <div class="mb-3">
                        <div id="resultado"></div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary" id="enviar">Gravar Edição</button>
                        <a href="web-stories-paginas.php?pagina=<?=$str?>" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h3>Páginas de: <b><?=$resStr['titulo']?></b></h3>
                <div class="row">
                        <?php 
                            $sqlWeb = $mysqli->query("SELECT * FROM stories_pages WHERE id = '$idWeb'")or die($mysqli->error);
                            $conWeb = mysqli_num_rows($sqlWeb);
                            while($resWeb = $sqlWeb->fetch_assoc()){
                        ?>

                        <div class="card shadow" style="
                        position:relative;
                        width:350px; 
                        height:600px; 
                        background-position:center; 
                        background-image: url(<?=$resWeb['imagem_bg']?>);
                        background-size: cover;">
                            <div class="card-body">
                                <h2 class="card-title" style="color:#fff; background: rgba(0, 0, 0, .7); padding:10px; position:absolute; bottom:20px; font-size:26px; left:0;"><?=$resWeb['titulo']?></h2>
                                
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
	

</div>



<!--Container Main end-->
    
<script type="text/javascript">
		$(document).ready(function() {
				$("#enviar").click(function() {
				//enviando para a página de cadastro
				$.ajax({
						url: "acao_edita_web_page.php", // url requisitada
						type: "POST", // tipo do envio dos dados

						data: { 
                               
                                idStories   :$("#idStories").val(),
                                titulo      :$("#titulo").val(),
                                linkBg      :$("#linkBg").val(),
                                texto       :$("#texto").val(),
                                linkBotao   :$("#linkBotao").val()
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