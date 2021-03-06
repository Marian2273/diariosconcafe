<?php


$email = 'marianabelgrano@dds.com.ar';
$list_id = '01db3626e5';
$api_key = '58ef90a70d5afcefcdab428ee67be84c-us5';
$nombre='Mariana';
$apellido='Belgrano';
//b11102d355 (suscripcion) (ID de la lista)
$expreso= "c6b98acc71";
$cortado ='13fcb2e4e4';
$conleche='87d8b25b59';
$grupal='ba3e1ca403';


$data_center = substr($api_key,strpos($api_key,'-')+1);

$url = 'https://us5.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
 
$json = json_encode([
    'email_address' => $email,
    'status'        => 'subscribed', //pass 'subscribed' or 'pending'
    
    'merge_fields'  => [
        'FNAME' => $nombre, 
        'LNAME' => $apellido
        
    ],
    "interests" => array(
        $conleche => true, //expreso
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
        echo "The user added successfully to the MailChimp.";
    }else{
      echo  $status_code;
    }
} catch(Exception $e) {
    echo $e->getMessage();
}
