<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

$idAnuncio = $_GET['idAnuncio'];
$sqlAnuncios = $mysqli->query("SELECT * FROM shop_anuncio WHERE  id = '$idAnuncio' ")or die("Erro ao consultar");
$conAnuncios = $sqlAnuncios->num_rows;
$resAnuncio = $sqlAnuncios->fetch_assoc();
?>

<!--Container Main start-->
<div class="height-100 bg-light">
    <h4>Fotos do Anúncio: <?=$resAnuncio['titulo']?></h4>
   
<?php 
        
        
        if($conAnuncios == 0){
            mensagem('Nenhum anuncio encontrado','danger');
        }else{

           

?>


<div id="form_recrutador">

<style>
    #uploadTema{ max-width: 600px; padding: 20px; background-color: #f1f1f1; border:1px solid #CCC; }
</style>

<div id="uploadTema">

<?PHP  include 'upload_tema.php';  ?>

<?PHP
$idAnuncio = $_GET['idAnuncio'];
$sqlContaGaleria = $mysqli->query("SELECT * FROM shop_fotos WHERE id_anuncio = '$idAnuncio' ")or die('Erro');   

$contaGaleria = $sqlContaGaleria->num_rows;

if($contaGaleria >= 10){

    mensagem('Você já completou a galeria', 'danger');
    echo '<p>Sua galeria possui 10 fotos. Exclua um ou mais fotos para atualizar.</p>';    

}else{

?>    

<p>Para melhor aparência utilize imagens em formato quadrado. <br> 1024x1024 pixels.</p>

    <form name="upload" action="" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id_anuncio" value="<?=$idAnuncio?>">
    <input type="hidden" name="idUser" value="<?=$id?>">
    <input type="file" name="arquivo[]" id="file-1" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
    
    <hr>
    
    <input type="submit" name="upload-galeria" value="Cadastrar" class="btn btn-dark" />
    
    </form>

</div>

    
<?PHP } ?>



<?PHP 

$resta = 100 - $contaGaleria;

//mensagem("Você pode cadastrar $resta temas", "success"); 

?>

<hr>

<style>
    #galeria ul{
        list-style: none;
        padding: 0;
    }
    #galeria ul li{
        display: inline-block;
        margin: 10px;
        background-color: #f5f5f5;
        padding: 10px;
    }
    #galeria ul li img{
        margin-bottom: 20px;
        width: 250px;
    }
</style>


<div id="galeria">
    <ul>
    <?php
     $sqlGaleria = $mysqli->query("SELECT * FROM shop_fotos WHERE id_anuncio = '$idAnuncio' ORDER BY id DESC");
     $conGaleria = $sqlGaleria->num_rows;
     if($conGaleria == 0):
        mensagem('Nenhuma foto cadastrada','danger');
    else:
     while($listafotos = $sqlGaleria->fetch_assoc()){  
    ?>

                <li class="shadow">

                <img width="300px" src="galeria/<?PHP echo $listafotos['foto']  ?>" class="img-responsive">

                <form name="del" action="" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?PHP echo $listafotos['id'];  ?>" />
                    <input type="hidden" name="foto" value="<?PHP echo $listafotos['foto'];  ?>" />
                    <input type="submit" name="excluirgal" value="Excluir" class="btn btn-dark btn-sm" />
                </form>

            </li>

       

     
    <?php 
    } 
    endif;
    ?>

    </ul> 
 </div>

<?php } //Fehca While do anuncio + dono do anuncio ?>





<?php include('footer.php'); ?>