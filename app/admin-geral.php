<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

?>

  <!--Container Main start-->
    <div class="height-100 bg-light">



        <h4>Dados do Usuário</h4>

        <hr>
        
        <div class="row">
            <div class="col-sm">


                
            <input type="hidden" value="<?=$idUser?>" id="idUser">

            <div style="max-width:400px;">
        

            <div class="form-group">
                <label for="">Nome do Site:</label>
                <input type="text" class="form-control cadastro" id="titulo" value="<?=$nome?>">
            </div>

            <div class="form-group">
                <label for="">E-mail do Admin:</label>
                <input type="text" class="form-control cadastro" id="email" value="<?=$email?>">
            </div>

            <div class="form-group">
                <label for="">WhatsApp do Admin:</label>
                <input type="text" data-mask="(00) 00000-0000" class="form-control cadastro" id="zap" value="<?=$zap    ?>">
            </div>

            <div class="form-group">
                <label for="">Url do Site:</label>
                <input type="text" class="form-control cadastro" id="urlSite" value="">
            </div>

            <div class="form-group">
                <label for="">Url do Painel:</label>
                <input type="text" class="form-control cadastro" id="urlPainel" value="">
            </div>

            <hr>

            <div id="resultado"></div>

            <button class="btn btn-primary" id="enviar">Gravar Dados</button>
            
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
                                acao :$("#acao").val(),   
                                idAnuncio   :$("#idAnuncio").val(),
                                idUser      :$("#idUser").val(),
                                titulo      :$("#titulo").val(),
                                email       :$("#email").val(),
                                zap         :$("#zap").val(),
                                telefone    :$("#telefone").val(),
                                cep         :$("#cep").val(),
                                rua         :$("#rua").val(),
                                numero      :$("#numero").val(),
                                complemento :$("#complemento").val(),
                                bairro      :$("#bairro").val(),
                                cidade      :$("#cidade").val(),
                                estado      :$("#estado").val(),
                                descricao   :$("#descricao").val(),
                                palavras    :$("#palavras").val(),
                                facebook    :$("#facebook").val(),
                                instagram   :$("#instagram").val(),
                                website     :$("#website").val()
                        
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