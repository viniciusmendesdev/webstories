<?php 


$idPage     = strip_tags(trim(addslashes($_POST['idStories'])));
$titulo     = strip_tags(trim(addslashes($_POST['titulo'])));
$linkBg     = strip_tags(trim(addslashes($_POST['linkBg'])));
$texto      = strip_tags(trim(addslashes($_POST['texto'])));
$linkBotao  = strip_tags(trim(addslashes($_POST['linkBotao'])));


include ('funcoes.php');

if(empty($texto)){
    echo "<p><b>Excreva pelo menos um texto né?</b> 🙄</p>";
}else{



    $sqlWeb = $mysqli->query("UPDATE stories_pages SET 
                                                    titulo='$titulo', 
                                                    texto='$texto', 
                                                    imagem_bg='$linkBg', 
                                                    botao='$linkBotao' WHERE id = '$idPage' ")or die($mysqli->error);

    mensagem("Tudo certo!","success");
    reload("web-stories-paginas-editar.php?pagina=".$idPage, 3000);

}
?>