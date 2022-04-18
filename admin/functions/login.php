<?php
session_start();
include("../config/connect1.php");

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
die();
*/

$email=$_POST['email'];
$password=$_POST['password'];
//$recaptcha=$_POST['recaptcha_response'];
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
  $options = array("cost"=>4);
  $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
  $sql = "select * from admin where email Like '$email' ";
  $rs = mysqli_query($mysqli,$sql);
  $numRows = mysqli_num_rows($rs);
    
    if($numRows  == 1){
      $row = mysqli_fetch_assoc($rs);
      if(password_verify($password,$row['password'])){
        
        ini_set("session.cookie_lifetime",0);  
        ini_set('session.cookie_httponly', 1);
        $_SESSION["user_diarios_admin"]= $row['id'];
        $user_diarios_admin=$_SESSION["user_diarios_admin"];
        session_regenerate_id();
        echo  'true' ;
}
else{
echo 'La clave es incorrecta';

//header("location:../index.php?error=La clave es Incorrecta.&$variables");
}
}
else{
echo ' El Usuario es incorrecto';
//header("location:../index.php?error=El Usuario es incorrecto.&$variables");
}   
} else {
echo 'Usted es un posible Spammer! Refresque la página y vuelva a intentarlo.';
}
?>