<?php
// Guardar los datos recibidos en variables:
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$asunto = $_POST['asunto'];
// Definir el correo de destino:
$dest = "emimartin26@hotmail.com";


$cuerpo = "Nombre: " . $nombre . "<br>";
$cuerpo .= "Email: " . $email . "<br>";
$cuerpo .= "<br>";
$cuerpo .= "<br>";
$cuerpo .= "Mensaje: " . $mensaje;
$cuerpo .= "<br>";
$cuerpo .= "<br>";
$cuerpo .= "<br>";
$cuerpo .= "Mail Enviado Desde la Web Oficial Del Congreso de Ingenieria en Sistemas De Informacion.";

include_once ("class.phpmailer.php");
include_once ("class.smtp.php");

$mail = new PHPMailer();
$mail -> IsSMTP();
$mail -> SMTPAuth = TRUE;
$mail -> SMTPSecure = "ssl";
$mail -> Host = "smtp.gmail.com";
$mail -> Port = 465;
$mail -> SetFrom($email, "$email");
$mail -> AddAddress($dest);
$mail -> Username = "serverhouse26@gmail.com";
$mail -> Password = "metanoia";
$mail -> Subject = $asunto;
$mail -> Body = $cuerpo;
$mail -> WordWrap = 50;
$mail -> MsgHTML($cuerpo);


if ($mail -> Send()) {
	$respuesta = "enviado";
} else {
	$respuesta = "Error: " . $mail -> ErrorInfo;
}
?>
