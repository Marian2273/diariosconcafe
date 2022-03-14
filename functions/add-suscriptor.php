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
$id_user=addslashes($antiXss->xss_clean($_POST['id_user']));
$id_update=addslashes($antiXss->xss_clean($_POST['id_update']));

$telefono=addslashes($antiXss->xss_clean($_POST['telefono']));
$nombre_padre= get_user_info($user_cafe, nombre).' , '.get_user_info($user_cafe, apellido);


$id=addslashes($antiXss->xss_clean($_POST['id']));



if($id_update == 1){
    $id_orden= get_info(grupal,$id, id_orden );
    $sql="UPDATE grupal SET nombre = '$nombre', apellido='$apellido', email ='$email', telefono='$telefono'  WHERE id LIKE '$id' ";
    mysqli_query($mysqli,$sql);
        $name= $nombre.' ('.$nombre_padre.'('.$id_orden.'))';
        $status = 'subscribed'; // "subscribed" or "unsubscribed" or "cleaned" or "pending"
        $list_id = $config['list_id'];
        $api_key = $config['api_key'];
        $merge_fields = array('FNAME' => $name,'LNAME' => $apellido, 'PHONE' => $telefono);
    function rudr_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
        $data = array(
            'apikey'        => $api_key,
            'email_address' => $email,
            'status'        => $status,
            'merge_fields'  => $merge_fields
        );
        $mch_api = curl_init(); // initialize cURL connection
     
        curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
        curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
        curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
        curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
        curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
        curl_setopt($mch_api, CURLOPT_POST, true);
        curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
     
        $result = curl_exec($mch_api);
        return $result;
    }

    rudr_mailchimp_subscriber_status($email, $status, $list_id, $api_key, $merge_fields );
    echo 'true';



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
$sql_all="SELECT email FROM grupal WHERE email LIKE '$email' ";
$result_all = mysqli_query($mysqli,$sql_all);
$total_all= mysqli_num_rows($result_all);
if($total_all > 0){
echo 'Este email ya se encuentra registrado en nuestra base de datos';
}

else { 
             
                $sql="UPDATE grupal SET nombre = '$nombre', apellido='$apellido', email ='$email', telefono='$telefono'  WHERE id LIKE '$id' ";
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


            
                //Niveles Maichip - Diarios con café (grupo)
                $prueba ='08b5c2f6d2';
                $expreso= '8a85574d77';
                $cortado= '0bab9f4f12';
                $conleche= '423b844cc4';
                $grupal= 'ac597b75d5';
                
                //Niveles Mailchimp - Diarios con café (grupo)
             /*   $prueba ='41d563069f';
                $expreso= 'c0aca2bf8d';
                $cortado= 'fea9f0c16e';
                $conleche= '9b10784e3c';
                $grupal= 'bbadd6e72d';*/

                
                
             
               $data_center = substr($api_key,strpos($api_key,'-')+1);
 
               $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
               
                $sql_1="SELECT id_orden FROM grupal WHERE id LIKE '$id' ";
                $result_all = mysqli_query($mysqli,$sql_1);
                 while($row = mysqli_fetch_array($result_all)){
                    $id_orden = $row['id_orden'];
                    }
               $name= $nombre.' ('.$nombre_padre.'('.$id_orden.'))';
               $json = json_encode([
                   'email_address' => $email,
                   'status'        => 'subscribed', //pass 'subscribed' or 'pending'
                   
                   'merge_fields'  => [
                       'FNAME' => $name,
                       'LNAME' => $apellido,
                       'PHONE' => $telefono,
                     
                      
                   ],
                   
                   
                   "interests" => array(
                        'ac597b75d5' => true
                 )
                   
                  
               ]);
               
               try {
                $ch1 = curl_init($url);
                curl_setopt($ch1, CURLOPT_USERPWD, 'user:'. $api_key);
                curl_setopt($ch1, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch1, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch1, CURLOPT_POST, 1);
                curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch1, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch1);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch1);
             
                if (200 == $status_code) {
                    echo "true";
                   //send_notification($id_user, $mail_tem, $sec_code, $subject, $smtp, $userName,$pass, $port, $url);
                }else{
                    echo "Se produjo un error al realizar el registro, por favor intentar más tarde.";
                }
                    } catch(Exception $e) {
                        echo "Se produjo un error al realizar el registro, por favor intentar más tarde.";
                    }

                }
   


}
?>