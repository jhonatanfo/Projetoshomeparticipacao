<?php
require_once('PHPMailer-master/class.phpmailer.php');

// Definir variáveis
    $destinatario_nome = "d";
    $destinatario_email = "d";
    $assunto = "d";
    $mensagem = "d";


    $mail = new PHPMailer(true);   // true - Retorna excepcões

    $mail->IsSMTP();   // Utilização de SMTP

    try {
        $mail->Host       = "localhost";  // Servidor SMTP
        $mail->SMTPAuth   = true;                   // Activar autenticação SMTP
        $mail->Username   = "envio@assistencianaviagem.com.br";  // Utilizador do servidor SMTP
        $mail->Password   = "home1010";         // Password do utilizador do SMTP

        $mail->AddReplyTo('name@yourdomain.com', 'First Last');       // Email e nome para onde será enviada a resposta (opcional)
        $mail->SetFrom('name@yourdomain.com', 'First Last');          // Email e nome de envio

        $mail->AddAddress("allan@homebrasil.com", "Allan Eduardo");   // Email e nome do destinatário

        $mail->Subject = $assunto;                                    // Assunto da mensagem

        $mail->IsHTML(false);                                         // false - O conteúdo da mensagem será enviado como texto e não HTML
        $mail->Body = $mensagem;                                      // Conteúdo da mensagem em si

        $mail->AddAttachment('anexo.jpg');                            // Anexo (opcional)

        $mail->Send();
        echo "<p><font face='Calibri'>Mensagem enviada com sucesso!</font></p>\n";   // Mensagem enviada!
    } catch (phpmailerException $e) {
        echo $e->errorMessage();                      // Erros provenientes do PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage();                        // Outros erros
    }

?>