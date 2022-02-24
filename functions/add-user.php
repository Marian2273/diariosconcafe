<?php

include("../config/connect1.php"); 
require ("functions.php");

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/
$nombre=addslashes($antiXss->xss_clean($_POST['nombre']));
$apellido=addslashes($antiXss->xss_clean($_POST['apellido']));
$email=addslashes($antiXss->xss_clean($_POST['email']));
$password=addslashes($antiXss->xss_clean($_POST['password']));
$id_update=addslashes($antiXss->xss_clean($_POST['id_update']));
$password1=addslashes($antiXss->xss_clean($_POST['password1']));
$niveles=addslashes($antiXss->xss_clean($_POST['niveles']));


if($id_update == 1){
if($password1 == ''){
    $sql="UPDATE usuarios SET nombre = '$nombre', apellido='$apellido' WHERE id LIKE '$user_inesw' ";
    mysqli_query($mysqli,$sql);
    echo 'true';
}else{
    $sec_code = substr(md5(rand()), 0, 20);
    $options = array("cost"=>4);
    $hashPassword = password_hash($password1,PASSWORD_BCRYPT,$options);  
    $sql="UPDATE usuarios SET nombre = '$nombre', apellido='$apellido', password = '$hashPassword' WHERE id LIKE '$user_inesw' ";
    mysqli_query($mysqli,$sql);
    echo 'true';
}


}else{  

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

// Users repeat 
$sql_all="SELECT email FROM usuarios WHERE email LIKE '$email' ";
$result_all = mysqli_query($mysqli,$sql_all);
$total_all= mysqli_num_rows($result_all);
if($total_all > 0){
echo 'Este email ya se encuentra registrado en nuestra base de datos';
}
else if($captchaResponse['success'] == '1' 
	&& $captchaResponse['action'] == $action 
	&& $captchaResponse['score'] >= 0.5 
	&& $captchaResponse['hostname'] ==  $_SERVER['SERVER_NAME'])
{


                $sec_code = substr(md5(rand()), 0, 20);
                $options = array("cost"=>4);
                $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);  
                $sql="INSERT INTO usuarios (nombre, apellido, email, password ,id_activo, sec_code, id_nivel)
                VALUES (
                '$nombre' ,
                '$apellido',
                '$email',
                '$hashPassword',
                '1',
                '$sec_code',
                '$niveles'
                
                )";
                mysqli_query($mysqli,$sql);
                
                

                //print_r($mysqli->error_list);
                //send Mail Validate
                $id_user = $mysqli->insert_id;
              
                           
                $mail_tem ='mails/email-confirmation.html';
                $sec_code = get_user_info($id_user, 'sec_code');
                $subject = 'Confirmación de correo electrónico';
                $smtp = $config['host'];
                $userName =$config['user'];
                $pass =$config['pass'];
                $port=$config['port'];
                $url=$config['url'];
              
             //Credenciales Maichip
                $list_id = $config['list_id'];
                $api_key = $config['api_key'];


                //Niveles Maichip 
                $expreso='c6b98acc71';
                $cortado ='13fcb2e4e4';
                $conleche='87d8b25b59';
                $grupal='ba3e1ca403';

                if($niveles == 7){
                $nivel = $expreso;
                }if($niveles == 8){
                    $nivel = $cortado;
                }if($niveles == 9){
                    $nivel = $conleche;
                }if($niveles == 10){
                    $nivel = $grupal;
                }
               
               //echo "true";
               $data_center = substr($api_key,strpos($api_key,'-')+1);
 
               $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
                
               $json = json_encode([
                   'email_address' => $email,
                   'status'        => 'subscribed', //pass 'subscribed' or 'pending'
                   
                   'merge_fields'  => [
                       'FNAME' => $nombre,
                       'LNAME' => $apellido,
                       
                   ],
                   "interests" => array(
                     $nivel => true
                 )
                   
                   
               ]);
               try {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERPWD, 'user:'. $api_key);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
             
                if (200 == $status_code) {
                //    echo "The user added successfully to the MailChimp.";
                send_notification($id_user, $mail_tem, $sec_code, $subject, $smtp, $userName,$pass, $port, $url);
                }else{
                    echo  $status_code;
                   
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }

                }
                else {
                 echo '<p> You are a Spammer! Refresh the page and try again </p>';
}


}
?>