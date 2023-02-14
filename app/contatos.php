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

			<h4>Contatos</h4>
			<p>Contatos gerados pelos Quizes</p>

			<?php
                $idQuiz = strip_tags(trim(addslashes($_GET['idQuiz'])));

                if(empty($idQuiz)){
                    $query = "SELECT * FROM contatos";
                }else{
                    $query = "SELECT * FROM contatos WHERE id_quiz = '$idQuiz' ";
                }

                $sqlContatos = $mysqli->query($query)or die('Erro aqui: '.$mysqli->error);
                $conContatos = mysqli_num_rows($sqlContatos);
			?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Id Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    for ($i=0; $i < $conContatos; $i++) { 
                        $resContato = $sqlContatos->fetch_assoc();  
                    ?>
                        <tr>
                            
                            <td><?=$i+1?></td>
                            <td><?=$resContato['nome']?></td>
                            <td><?=$resContato['email']?></td>
                            <td><?=$resContato['id_quiz']?></td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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