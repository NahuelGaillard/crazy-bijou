<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'c2191146.ferozo.com  ******PONER EL HOST';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'test@c2191146.ferozo.com **********USUARIO EMAIL';                     //SMTP username
    $mail->Password   = 'Camada@16620 *************** CONTRASEÑA';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465 "***************** SI ES NECESARIO CAMBIAR EL PUERTO";                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('test@c2191146.ferozo.com', 'Camada 16620'); // Hacer coincidir con el username. (preferentemente)
    $mail->addAddress('magaietta@outlook.com', 'Magali');  //HACIA DONDE ENVIAR"//    //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('INFO@gmail.com');  //EMAIL DE RESPALDO
    //$mail->addBCC('bcc@example.com'); //COPIA OCULTA

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content HACER COINCIDIR CON EL FORM
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Consulta de: '.$_POST['nombre'];
    $mail->Body    = 
    'Nombre: '.$_POST['nombre'].
    '<br>'.
    $_POST['textArea'].
    '<br>Campo Oculto: '.
    $_POST['campoOculto'].
    '<br>Email: '.$_POST['correo'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>