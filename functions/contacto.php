<?php
require ("functions.php");
include("../config/connect1.php");
//error_reporting(E_ERROR | E_PARSE);

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

*/

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$url=$config['url'];
$mensaje = trim($_POST['mensaje']);

//Recaptcha
$token = $_POST['token'];
$action = $_POST['action'];

$curlData = array(
	'secret'	=> $config['SECRET_API_KEY_ReCaptchGoogle'],
	'response'	=> $token
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curlResponse = curl_exec($ch);

$captchaResponse = json_decode($curlResponse, true);


if($email == ''  or $nombre =='' or mensaje ==''){
echo "<span class='error-home'> Por favor completar, todos los campos son obligatorios.</span> ";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
echo "<span class='error-home'>El email, no tiene un formato válido.</span>";
}
else if($captchaResponse['success'] == '1' 
&& $captchaResponse['action'] == $action 
&& $captchaResponse['score'] >= 0.5 
&& $captchaResponse['hostname'] ==  $_SERVER['SERVER_NAME'])
{


   require("class.phpmailer.php");
   $mail = new PHPMailer();
   $mail->IsSMTP();
  // $mail->SMTPAuth = true;
   $mail->SMTPAuth = false;
   $mail->SMTPAutoTLS = false; 
   $mail->Port = 25; 
   $mail->Host = $config['host']; // SMTP a utilizar. Por ej. smtp.elserver.com
   $mail->Username = $config['user']; 
   $mail->Password =  $config['pass'];  // Contraseña
  // $mail->Port =  $config['port'];  // Puerto a utilizar
   
   $mail->From = "soporte@freecanelo.com.ar"; // Desde donde enviamos (Para mostrar)
   $mail->FromName = "Testing";
   //$mail->AddAddress("marianabelgrano@gmail.com"); // Esta es la dirección a donde enviamos
   $mail->AddAddress("marianabelgrano@gmail.com"); // Esta es la dirección a donde enviamos
   $mail->CharSet = 'UTF-8';
 
   $mail->Subject ='Formulario de Contacto'; // Este es el titulo del email.
   $mail->IsHTML(true); // El correo se envía como HTML
   

   $body = file_get_contents('mails/contact-mail.html');
   //$body = preg_replace("[\]",'',$body); setup vars to replace
   $vars = array('{name}', '{email}', '{message}','{url}');
   $values = array($nombre, $email, $mensaje, $url);

//replace vars
   $body = str_replace($vars,$values,$body);

   //add the html tot the body
   $mail->MsgHTML($body);

   $mail->Body = $body; // Mensaje a enviar
   $exito = $mail->Send(); // Envía el correo.
   $mail->ClearAddresses();  
   
   if($exito){
      echo "true";
   }else{
      echo "<span class='error'> $mail->ErrorInfo </span>";
   }
}          

?>