<?php 


$idStories  = strip_tags(trim(addslashes($_POST['idStories'])));
$titulo     = strip_tags(trim(addslashes($_POST['titulo'])));
$linkBg     = strip_tags(trim(addslashes($_POST['linkBg'])));
$texto      = strip_tags(trim(addslashes($_POST['texto'])));
$linkBotao  = strip_tags(trim(addslashes($_POST['linkBotao'])));

include ('funcoes.php');

if(empty($texto)){
    echo "<p><b>Excreva pelo menos um texto né?</b> 🙄</p>";
}else{

    $sqlWeb = $mysqli->query("INSERT INTO stories_pages (id_stories, titulo, texto, imagem_bg, botao)VALUES
    ('$idStories', '$titulo', '$texto', '$linkBg', '$linkBotao')")or die($mysqli->error);

    mensagem("Tudo certo!","success");
    reload("web-stories-paginas.php?pagina=".$idStories, 3000);

}
?>