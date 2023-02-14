<?php 

include ('funcoes.php');

$titulo     = strip_tags(trim(addslashes($_POST['titulo'])));
$linkCapa   = strip_tags(trim(addslashes($_POST['capa'])));
$descricao  = strip_tags(trim(addslashes($_POST['descricao'])));


if(empty($titulo)){
    echo "<p><b>Você esqueceu o Título</b> 🥺</p>";
}elseif(empty($linkCapa)){
    echo "<p><b>Cadê o link da sua capa?</b> 🙄</p>";
}else{

$slug = urlAnuncio($titulo).'-'.strtotime("now");;

$dataCadastro = date('Y-m-d H:m:s');

$sqlWeb = $mysqli->query("INSERT INTO stories(titulo, capa, descricao, url, dataCadastro)VALUES('$titulo', '$linkCapa','$descricao','$slug', '$dataCadastro')")or die($mysqli->error);

mensagem("Criado com sucesso!","success");

$sqlStories = $mysqli->query("SELECT * FROM stories WHERE url = '$slug' ")or die($mysqli->error);
$resStories = $sqlStories->fetch_assoc();
$idStr =  $resStories['id'];

reload("web-stories-paginas.php?pagina=".$idStr, 3000);

}


?>