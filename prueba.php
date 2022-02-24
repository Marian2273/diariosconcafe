<?php
$email = 'juanperez@dd.com';
$list_id = '01db3626e5';
$api_key = '391b6f6db8a1165f12baf55cb7e766e8-us5';
$nombre='Juan';
$apellido='Pérez';
//b11102d355 (suscripcion)
$oro='c6b98acc71';
$bronce='87d8b25b59';
$plata ='13fcb2e4e4';
$gratis='ba3e1ca403';
 
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
      $bronce => true
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
