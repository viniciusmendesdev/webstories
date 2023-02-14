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

            <div style="max-width:600px;">

            <?php 
            
        $sqlEndereco = $mysqli->query("SELECT * FROM usuariosEndereco WHERE id_usuario = '$idUser' ")or die("Deu merda: ".$mysqli->error);
        $contaEnde = $sqlEndereco->num_rows;
        if($contaEnde == 0):
            mensagem('Complete seu endereço','danger');
        endif;
        ?>

           

            <p>Data do Cadastro: <b><?=data($dataCadastro)?></b></p>            

            <div class="form-group">
                <label for="">Nome:</label>
                <input type="text" class="form-control cadastro" id="titulo" value="<?=$nome?>">
            </div>

            <div class="form-group">
                <label for="">E-mail:</label>
                <input type="text" class="form-control cadastro" id="email" value="<?=$email?>">
            </div>

            <div class="form-group">
                <label for="">WhatsApp:</label>
                <input type="text" data-mask="(00) 00000-0000" class="form-control cadastro" id="zap" value="<?=$zap    ?>">
            </div>

            <div class="form-group">
                <label for="">Telefone:</label>
                <input type="text" data-mask="(00) 0000-0000" class="form-control cadastro" id="telefone" value="<?=$res['telefone']?>">
            </div>

            <hr>

            <h5>Endereço</h5>

            <div class="form-group">
                <label for="">Cep:</label>
                <input type="text" class="form-control cadastro" id="cep" value="<?=$res['cep']?>">
            </div>

            <div class="form-group">
                <label for="">Rua:</label>
                <input type="text" class="form-control cadastro" id="rua" value="<?=$res['rua']?>">
            </div>

            <div class="form-group">
                <label for="">Número:</label>
                <input type="text" class="form-control cadastro" id="numero" value="<?=$res['numero']?>">
            </div>

            <div class="form-group">
                <label for="">Complemento:</label>
                <input type="text" class="form-control cadastro" id="complemento" value="<?=$res['complemento']?>">
            </div>

            <div class="form-group">
                <label for="">Bairro:</label>
                <input type="text" class="form-control cadastro" id="bairro" value="<?=$res['bairro']?>">
            </div>

            <div class="form-group">
                <label for="">Cidade:</label>
                <input type="text" class="form-control cadastro" id="cidade" value="<?=$res['cidade']?>">
            </div>

            <div class="form-group">
                <label for="">Estado:</label>
                <input type="text" class="form-control cadastro" id="estado" value="<?=$res['estado']?>">
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