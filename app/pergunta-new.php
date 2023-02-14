<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$idQuiz = strip_tags(trim(addslashes($_GET['idQuiz'])));

$sqlQuiz = $mysqli->query("SELECT * FROM quiz WHERE id = '$idQuiz' ");
$resQuiz = $sqlQuiz->fetch_assoc();

?>


  <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Quiz: <?=$resQuiz['nome']?></h4>
            <hr>
        <div class="row">
            <div class="col-sm">   
                <div style="max-width:900px;">   

                    <div class="form-group">
                        <label for="">Digite uma pergunta:</label>
                        <input type="text" class="form-control cadastro" id="pergunta" value="">
                    </div>

                    <hr>
                    <input type="hidden" value="<?=$idUser?>" id="idUser">
                    <input type="hidden" value="<?=$idQuiz?>" id="idQuiz">
                    <input type="hidden" id="acao" value="cadPergunta">

                    <div id="resultado"></div>

                    <button class="btn btn-primary" id="enviar">Gravar Pargunta</button>

                    <a class="btn btn-dark" href="painel.php">Voltar Para Home</a>

                </div>

                <hr>

                <p>Endereço do Quiz: <a target="_blank" href="<?=$urlQuiz?>/<?=$resQuiz['pagina']?>"> <?=$urlQuiz?>/<?=$resQuiz['pagina']?> </a></p>

            </div>

            <div class="col-sm">
                <h5>Perguntas cadastradas</h5>
                <p>Clique em cima da pergunta abaixo para cadastrar as respostas</p>
                <?php 
                    $sqlPerguntas = $mysqli->query("SELECT * FROM pergunta WHERE id_quiz = '$idQuiz' ");
                    $conPerguntas = mysqli_num_rows($sqlPerguntas);
                    if($conPerguntas < 1){
                        mensagem('Nenhuma pergunta ainda cadastrada','danger');
                    }else{
                        while($resPerguntas = $sqlPerguntas->fetch_assoc()){
                            ?>
                            <li><a href="resposta-new.php?idPergunta=<?=$resPerguntas['id'] ?>"><?=$resPerguntas['pergunta'] ?></a></li>
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
                                idQuiz      :$("#idQuiz").val(),
                                pergunta  :$("#pergunta").val()
                        
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