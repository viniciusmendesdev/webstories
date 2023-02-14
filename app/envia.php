<?php

include 'app/config.php';

$quiz = trim(strip_tags(addslashes($_POST['quiz'])));
$nome = trim(strip_tags(addslashes($_POST['nome'])));
$email = trim(strip_tags(addslashes($_POST['email'])));

if(empty($nome)){
    mensagem('Por favor, digite seu nome','danger');
}elseif(empty($email)){
    mensagem('Por favor, digite seu e-mail','danger');
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    mensagem("Você digitou um e-mail inválido", "danger");
}else{
    
    $sqlContato = $mysqli->query("INSERT INTO contatos (id_quiz, nome, email)VALUES('$quiz','$nome','$email')")or die($mysqli->error);
    

    if($sqlContato == true){
        
        mensagem('Aguarde...<img width="30px" src="app/images/loading-gif.gif" alt="">','success');

        $sqlQuiz = $mysqli->query("SELECT * FROM quiz WHERE id = '$quiz'")or die($mysqli->error);
        $resQuiz = $sqlQuiz->fetch_assoc();

        include 'email.php';
       
        //reload($resQuiz['urlDestino'],3000);


    }else{
        echo 'Erro';
    }
}

?>