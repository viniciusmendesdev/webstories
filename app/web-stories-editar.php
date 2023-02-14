<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$idWebStorie = strip_tags(trim(addslashes($_GET['str'])));

$sqlStories = $mysqli->query("SELECT * FROM stories WHERE id = '$idWebStorie' ")or die($mysqli->error);
$conStories = mysqli_num_rows($sqlStories);
$resStories = $sqlStories->fetch_assoc();

?>
<div id="inicio">
<!--Container Main start-->
		<div class="row">
				<h4>Editar Web Stories</h4>
		</div>
        
        <div class="row">
            <div class="col-md-5">
                <div id="formulario">
                    <div class="mb-3">
                        <label for="" class="form-label">Titulo do Web Stories</label>
                        <input type="text" class="form-control" value="<?=$resStories['titulo']?>" id="titulo" placeholder="Digite o Título do seu Web Stories">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Link da Capa</label>
                        <input type="text" class="form-control" value="<?=$resStories['capa']?>" id="capa" placeholder="Cole o link da Capa">
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
            <div class="col-md-5">
                    <div class="card shadow" style="
                        position:relative;
                        width:18rem; 
                        height:400px; 
                        background-position:center; 
                        background-image: url(<?=$resStories['capa']?>);
                        background-size: cover;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#fff; background: rgba(0, 0, 0, .7); padding:20px; position:absolute; bottom:100px; font-size:26px; left:0;"><?=$resStories['titulo']?></h5>
                            </div>
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
						url: "acao_edita_web.php", // url requisitada
						type: "POST", // tipo do envio dos dados

						data: { 
                                titulo 	:$("#titulo").val(),   
								capa    :$("#capa").val(),
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