<?php 

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "mail.quizinformativo.com";
$mail->Port = 465;
$mail->SMTPSecure   = "tls";
$mail->SMTPAuth     = "true";
$mail->Username     = "contato@quizinformativo.com";
$mail->Password     = "Mendes123@@##";

$mail->setFrom($mail->Username, "Quiz Informativo"); //Remetente
$mail->addAddress("viniciusmendesrj@gmail.com"); //destinatário
$mail->addBCC('viniciusmendesrj@gmail.com', 'Cópia Oculta');
$mail->Subject = "Nova Senha"; //Assunto

$conteudo = "

    <p>Você recebeu um contato pelo site:</p>
    
    <p>
    <b>sua nova senha é:</b> $email <br>

    <p></p>
    <p></p>
    <small>Enviado pelo website www.quizinformativo.com | Criado por Vinicius Mendes</small>
";

$mail->IsHTML(true);
$mail->Body = $conteudo;

    if($mail->send()){

        mensagem('Sua nova senha foi enviada para o seu e-mail','success');

        //echo "<p>Enviado com sucesso!</p>";
        //$urlDestino = "https://wa.me/5583996186566";
        //echo "<script language= \"JavaScript\">setTimeout(\"document.location = '".$urlDestino."' \",5000);</script>";

    }else{
        echo "<p>Erro ao enviar e-mail" . $mail->ErrorInfo . "</p>";
    }


?>