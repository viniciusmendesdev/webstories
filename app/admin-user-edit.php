<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

?>


  <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Editar Usuário</h4>

        <hr>

        <?php 
        $idUsuario = $_GET['idUsuario'];
        $sqlUsuario = $mysqli->query("SELECT * FROM usuarios WHERE id = '$idUsuario' ")or die("Erro ao consultar");
        $conUsuario = $sqlUsuario->num_rows;
        if($conUsuario == 0){
        	mensagem('Nenhum usuário encontrado','danger');
        }else{

        $res = $sqlUsuario->fetch_assoc();
        	
        ?>
        
        <div class="row">
            <div class="col-sm">
                
            <input type="hidden" value="<?=$idAnuncio?>" id="idAnuncio">


            <div style="max-width:600px;">            

            <div class="form-group">
                <label for="">Nome:</label>
                <input type="text" class="form-control cadastro" id="titulo" value="<?=$res['nome']?>">
            </div>

            <div class="form-group">
                <label for="">E-mail:</label>
                <input type="text" class="form-control cadastro" id="email" value="<?=$res['email']?>">
            </div>

            <div class="form-group">
                <label for="">WhatsApp:</label>
                <input type="text" class="form-control cadastro" id="zap" value="<?=$res['zap']?>">
            </div>

            <div class="form-group">
                <label for="">CPF:</label>
                <input type="text" class="form-control cadastro" id="telefone" value="<?=$res['cpf']?>">
            </div>

        
            <input type="hidden" id="acao" value="editaAnuncio">

            <hr>

            <div id="resultado"></div>

            <button class="btn btn-primary" id="enviar">Gravar Dados</button>

             <a class="btn btn-dark" href="painel.php">Voltar Para Anúncios</a>
            
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

    <!--############# LISTA ANUNCIOS DESTE USUÁRIO ###############-->
    <br><br><br>    

    <h5>Anúncios Cadastrados</h5>

    <?php 

        $sqlAnuncios = $mysqli->query("SELECT * FROM shop_anuncio WHERE id_cliente = '$idUsuario' ")or die("Erro ao consultar");
        $conAnuncios = $sqlAnuncios->num_rows;
        if($conAnuncios == 0){
            mensagem('Nenhum anuncio cadastrado','danger');
        }else{
            
        ?>
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titulo do Anúncio</th>
                  <th scope="col">Data Cadastro</th>
                  <th scope="col"><center>-</center></th>
                </tr>
              </thead>
              <tbody>
                <?php while($resAnuncios = $sqlAnuncios->fetch_assoc()){ ?>
                <tr>
                  <th scope="row"><?=$resAnuncios['id']?></th>
                  <td><strong><?=$resAnuncios['titulo']?></strong></td>
                  <td><?=data($resAnuncios['data_cadastro'])?></td>
                  <td>
                    <center>
                        <a target="_blank" href="<?=$urlSite?>/<?=$resAnuncios['url']?>" class="btn btn-sm btn-dark">Ver Anúncio</a>
                        <a href="anuncio-edit.php?idAnuncio=<?=$resAnuncios['id']?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="anuncio-fotos.php?idAnuncio=<?=$resAnuncios['id']?>" class="btn btn-sm btn-dark">Fotos</a>
                    </center>
                  </td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
        </div>

    </div>

    <?php } ?>



    <?php } ?>
    <!--Container Main end-->
    


<?php include('footer.php'); ?>