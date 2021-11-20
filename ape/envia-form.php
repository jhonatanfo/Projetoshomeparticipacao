<?php 

date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
$assunto = filter_var($_POST['assunto'], FILTER_SANITIZE_STRING);
 
if($nome == ""){
  echo "nome"; exit();
}

$res_admin = '
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="http://apepinheiros.com.br/unnamed.jpg" width="450" height="179" alt=""/></td>
  </tr>
  <tr>
    <td><table width="426" height="89" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="30" height="22"></td>
        <td width="394" valign="top"></td>
      </tr>
	    <tr>
        <td width="30" height="22">&nbsp;</td>
        <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Nome:</span> '.$nome.'</td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">E-mail:</span> '.$email.'</td>
      </tr>
      
      <tr>
        <td height="22">&nbsp;</td>
        <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Telefone:</span> '.$telefone.'</td>
      </tr>
      
      <tr>
        <td valign="top" height="22">&nbsp;</td>
        <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Assunto:</span> '.$assunto.'</td>
      </tr>
	  <tr>
        <td width="30" height="7"></td>
         
      </tr>
 </table>
	</td>
  </tr>
   
</table>';

$Mailer = new PHPMailer();
$Mailer->IsSMTP();

$Mailer->isHTML(true);
$Mailer->Charset = 'UTF-8';
$Mailer->SMTPAuth = true;
$Mailer->SMTPDebug = 0; 
$Mailer->SMTPSecure = 'tls';
$Mailer->Host = 'smtp.gmail.com';
$Mailer->Port = 587;
$Mailer->Username = 'naoresponda@homebrasil.com';
$Mailer->Password = '***Hfk48snd';
$Mailer->setFrom('naoresponda@homebrasil.com', utf8_decode('Apê Pinheiros'));

//$Mailer->From = 'naoresponda@homebrasil.com';
//$Mailer->FromName = utf8_decode('Planos de Saúde SulAmérica - Contato');
$Mailer->Subject = utf8_decode("Apê Pinheiros");
$Mailer->Body = $res_admin;
 

$mail->AddAddress("contato@apepinheiros.com.br","Apê Pinheiros");

$mail->AddBCC("jhonatan@homebrasil.com","Jhonatan");
$mail->AddBCC("allan@agenciahauze.com.br","Allan Eduardo");
$mail->AddBCC("brazil.helio@gmail.com","Helio Brazil");
$mail->AddBCC("jricardo@construtoracpd.com.br","Jose Ricardo");





$enviado = $Mailer->Send();

if ($enviado){
  echo "E-mail enviado com sucesso!";
}else{
  echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;
}
?>
