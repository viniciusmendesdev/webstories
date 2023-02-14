<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

?>


  <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Nova Quiz</h4>

        <hr>

        <div class="row">
            <div class="col-sm">
                
             <div style="max-width:900px;">   

            <div class="form-group">
                <label for="">Dê um nome para o Quiz:</label>
                <input type="text" class="form-control cadastro" id="titulo" value="">
            </div>

            <div class="form-group">
                <label for="">Digite uma url de destino:</label>
                <input type="text" class="form-control cadastro" id="urlDestino" value="">
            </div>

            <div class="form-group">
                <label for="">Digite uma frase para o formulário final:</label>
                <input type="text" class="form-control cadastro" id="frasefinal" value="">
            </div>

            <hr>
            <input type="hidden" value="<?=$idUser?>" id="idUser">
            <input type="hidden" id="acao" value="cadAnuncio">


            <div id="resultado"></div>

            <button class="btn btn-primary" id="enviar">Gravar Dados</button>

             <a class="btn btn-dark" href="painel.php">Voltar Para Home</a>
            
                </div>
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
                                titulo      :$("#titulo").val(),
                                urlDestino  :$("#urlDestino").val(),
                                frasefinal  :$("#frasefinal").val(),
                        
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