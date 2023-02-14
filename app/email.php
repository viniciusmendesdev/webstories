<?php
    


    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.macrodigital.com.br";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->Username = "contato@aprovacao.online";
    $mail->Password = "Mendes123@@##";
    $mail->SetFrom("contato@aprovacao.online");

    $conteudo = "

    <p style=\"text-align: center;\"><img alt=\"IpanemaNoZap\" src=\"https://ipanemanozap.com/app/images/logo-email2.jpg\" style=\"max-width: 500px; height: auto;\" /></p>

    <table align=\"center\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\" style=\"max-width:500px;\">
        <tbody>
            <tr>
                <td style=\"text-align: center; line-height: 26px;\"><span style=\"font-family:arial,helvetica,sans-serif; font-size: 14px;\">Ol&aacute;, <strong>$razao</strong>! <br> Seja bem vindo(a) ao<strong> IpanemaNoZap</strong>!</span></td>
            </tr>
            <tr>
                <td>
                <p><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Al&eacute;m de utilizar a plataforma, ampliando suas vendas e neg&oacute;cios, o seu estabelecimento passar&aacute; a contar com todos os benef&iacute;cios dos associados&nbsp;</span><strong><a data-saferedirecturl=\"https://www.google.com/url?q=http://spcrio.com&amp;source=gmail&amp;ust=1660051364019000&amp;usg=AOvVaw2Zsbq7ZieZ1tvC3wCUul1D\" href=\"http://spcrio.com/\" style=\"color: rgb(17, 85, 204); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\" target=\"_blank\">spcrio.com</a></strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\">&nbsp;, entre os quais : menores tarifas em servi&ccedil;os banc&aacute;rios pelo <strong>Sicoob</strong>, <strong>Linhas de Cr&eacute;dito</strong>,<strong> taxas diferenciadas</strong> para vendas nas maquinas de cart&otilde;es de cr&eacute;dito e d&eacute;bito, <strong>Consultorias Especializadas</strong> para ajudar a sua empresa e muito mais.</span></p>
    
                <p><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">A Ferramenta ainda lhe proporcionar&aacute; uma maior e mais r&aacute;pida intera&ccedil;&atilde;o com os seus consumidores e frequentadores do bairro, de modo geral, e a emiss&atilde;o e/ou renova&ccedil;&atilde;o anual, sem custos do seu&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\">CERTIFICADO DIGITAL A1 PF</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\">&nbsp;, com o apoio do&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\">SPC BRASIL</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 17.3333px; background-color: rgb(255, 255, 255);\">.</span></p>
    
                <p><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Guarde os dados abaixo para acessar seu&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px;\">painel</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;que ser&aacute; liberado, t&atilde;o logo nossa Equipe confirme com voc&ecirc;, o&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px;\">CADASTRAMENTO FINAL DE CONTRA&Ccedil;&Atilde;O PARA USO DA PLATAFORMA</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">, com o investimento mensal de&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px;\">apenas R$90,00</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">, para os custos da opera&ccedil;&atilde;o, al&eacute;m de destinarmos 10% ao Projeto Social do&nbsp;</span><strong style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px;\">INSTITUTO MEDICINA SOLID&Aacute;RIA</strong><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;, apoiado pelo Rotary Clube Ipanema.</span></p>
                </td>
            </tr>
            <tr>
                <td style=\"text-align: center;\">
                <p style=\"font-size: 16px; color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); text-align: left;\"><strong>Empresa:</strong> $razao <br> <strong>CNPJ:</strong> $cnpj2  </p>
    
                <p style=\"font-size: 16px; color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); text-align: left;\"><strong>Login:</strong> $email<br />
                <strong>Senha:</strong>&nbsp;$pass2</p>
                </td>
            </tr>
            <tr>
                <td style=\"text-align: center;\">
                <p style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><strong><a href=\"http://www.ipanemanozap.com\" style=\"font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: center;\" target=\"_blank\">www.ipanemanozap.com</a><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: center; background-color: rgb(255, 255, 255);\">&nbsp;|&nbsp;</span><a href=\"http://wa.me/5521999459946\" style=\"font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: center;\" target=\"_blank\">(21) 9 9945-9946</a></strong></p>
                </td>
            </tr>
        </tbody>
    </table>

    ";

    

    $mail->Subject = "Cadastro IpanemaNoZap";
    $mail->Body = $conteudo;
    $mail->AddAddress("$email");


    if(!$mail->Send()) {

        echo "Mailer Error: " . $mail->ErrorInfo;

    } else {


        reload($resQuiz['urlDestino'],3000);

    }