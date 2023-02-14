<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$idPergunta = strip_tags(trim(addslashes($_GET['idPergunta'])));

$sqlQuiz = $mysqli->query("SELECT * FROM pergunta WHERE id = '$idPergunta' ");
$resQuiz = $sqlQuiz->fetch_assoc();

?>


  <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Pergunta: <?=$resQuiz['pergunta']?></h4>
            <hr>
        <div class="row">
            <div class="col-sm">   
                <div style="max-width:900px;">   

                    <div class="form-group">
                        <label for="">Digite uma reposta:</label>
                        <input type="text" class="form-control cadastro" id="resposta" value="">
                    </div>

                    <hr>
                    <input type="hidden" value="<?=$idUser?>" id="idUser">
                    <input type="hidden" value="<?=$idPergunta?>" id="idPergunta">
                    <input type="hidden" id="acao" value="cadResposta">

                    <div id="resultado"></div>

                    <button class="btn btn-primary" id="enviar">Gravar Resposta</button>

                    <a class="btn btn-dark" href="painel.php">Voltar Para Home</a>

                </div>
            </div>

            <div class="col-sm">
                <h5>Respostas para: <?=$resQuiz['pergunta']?></h5> 
                <?php 
                    $sqlPerguntas = $mysqli->query("SELECT * FROM resposta WHERE id_pergunta = '$idPergunta' ");
                    $conPerguntas = mysqli_num_rows($sqlPerguntas);
                    if($conPerguntas < 1){
                        mensagem('Nenhuma resposta ainda cadastrada','danger');
                    }else{
                        while($resPerguntas = $sqlPerguntas->fetch_assoc()){
                            ?>
                            <li><a href="#"><?=$resPerguntas['resposta'] ?></a></li>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
               $("#enviar").click(function() {
                //enviando para a página de cadastro
                $.ajax({
                        url: "acao_edita_anuncio.php", // url requisitada
                        type: "POST", // tipo do envio dos dados

                        data: { 
                                acao        :$("#acao").val(),  
                                idUser      :$("#idUser").val(),
                                idPergunta  :$("#idPergunta").val(),
                                resposta    :$("#resposta").val()
                        
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