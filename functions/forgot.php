<?php
require ("functions.php");
include("../config/connect1.php");


/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
die();
*/
$email= $_POST['email'];
$url=$config['url'];

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
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$curlResponse = curl_exec($ch);

$captchaResponse = json_decode($curlResponse, true);

if($captchaResponse['success'] == '1' 
	&& $captchaResponse['action'] == $action 
	&& $captchaResponse['score'] >= 0.5 
	&& $captchaResponse['hostname'] ==  $_SERVER['SERVER_NAME'])
{
// Validadondo email Paciente
$sql_all="SELECT * FROM usuarios  WHERE email LIKE '$email' ";
$result_all = mysqli_query($mysqli,$sql_all);
$total_all= mysqli_num_rows($result_all);
$row = mysqli_fetch_assoc($result_all);
$id_user = $row['id'];
$nombre = get_user_info($id_user, 'nombre');
$apellido =get_user_info($id_user, 'apellido');

$name= $nombre .' '. $apellido;

if($total_all == '0'){
 echo '<span class="error"> El correo electrónico ingresado no está registrado en nuestra base de datos. <br> 
 Te invitamos a registrarte. <br> Gracias. </span>';
} else if($email ==''){
echo '<span class="error"> Por favor introduzca su correo electrónico. </span>';

}else{

$password= substr(sha1(mt_rand()),17,8);
$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);  

$sql="UPDATE  usuarios SET  password ='$hashPassword'
WHERE email LIKE '$email' ";
mysqli_query($mysqli,$sql);



$subject = "Recuperación de contraseña - Diarios con café";
$text = '<h3>Su nueva contraseña es la siguiente:</h3>
<p> Usuario:  '. $email .' </p>
<p><strong> Nueva Password:  '. $password.' </strong></p> ';

// Envío Notificación

 require("class.phpmailer.php");
 $mail = new PHPMailer();
 $mail->IsSMTP();
 $mail->SMTPAuth = true;
 $mail->Host = $config['host']; // SMTP a utilizar. Por ej. smtp.elserver.com
 $mail->Username = $config['user']; 
 $mail->Password =  $config['pass'];  // Contraseña
 $mail->Port =  $config['port'];  // Puerto a utilizar


 $mail->From = "info@freecanelo.com.ar"; // Desde donde enviamos (Para mostrar)
 $mail->FromName = "Restablecer la contraseña - Diarios con café";
 $mail->AddAddress($email); // Esta es la dirección a donde enviamos
 //$mail->AddCC("cuenta@dominio.com"); // Copia
 //$mail->AddBCC("marianabelgrano@hotmail.com"); // Copia oculta para esssaaabel
 $mail->CharSet = 'UTF-8';
 $mail->IsHTML(true); // El correo se envía como HTML
 $mail->Subject =$subject; // Este es el titulo del email.
 $body = $text;



 $body =file_get_contents('mails/password-reset.html');
//$body = preg_replace("[\]",'',$body);

//setup vars to replace
$vars = array('{name}','{email}','{password}','{url}');
$values = array($name,$email, $password, $url);

//replace vars
$body = str_replace($vars,$values,$body);

//add the html tot the body
$mail->MsgHTML($body);


 $mail->Body = $body; // Mensaje a enviar
// $mail->AltBody = "Hola mundo. Esta es la primer línean Acá continuo el mensaje"; // Texto sin html
 //$mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg");
 $exito = $mail->Send(); // Envía el correo.

if($exito){
 echo '<span class="exito"> La nueva contraseña fue enviada a su correo electrónico. <br> Gracias. </span>';

}else{ 
 echo '<span class="error"> Se produjo un error al enviar el correo electrónico. Vuelva a intentarlo más tarde. <br> Gracias. </span>';

}
}
}
?>