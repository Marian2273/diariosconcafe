<?php
session_start();
header("X-XSS-Protection: 1"); 
error_reporting(0);
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
$actual_link = $_SERVER['PHP_SELF'];
$path = parse_url($actual_link , PHP_URL_PATH);
$filename = substr(strrchr($path, "/"), 1);



use voku\helper\AntiXSS;
require_once __DIR__ . '/vendor/autoload.php'; // example path
$antiXss = new AntiXSS();

//Usuarios
$user_cafe=$_SESSION["user_cafe"];

// conect
include("config/connect.php"); 

//Ilustraciones

 //Get File by ID
 if (!function_exists('get_files')) {
                function get_files() {
                    global $mysqli;
                    
                        $query="SELECT * FROM  ilustraciones WHERE id_activo LIKE 1 ";
                        $result = mysqli_query($mysqli,$query) ;
                        while ($row = mysqli_fetch_assoc($result)) {
                
                      echo'<!-- cada ilustracion -->
                      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" style="cursor:pointer;">
                         <a
                             data-fancybox="data-fancybox"
                             data-src="'.$row['file'].'"
                             data-caption="'.$row['date'].'">
                             <img src="'.$row['file'].'" class="w-100  mb-4" alt="'.$row['file'].'"/>
                         </a>
                     
                     </div>
                     <!-- Fin Ilustración -->';
                
                                                 
                    }
               
                }
              }
  
     //Get Level
if (!function_exists('get_level')) {
  function get_level() {
      global $mysqli;
    
          $query="SELECT * FROM niveles  ORDER BY name ASC";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
 
  }
}

//Get User Info
if (!function_exists('get_user_info')) {
  function get_user_info($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM usuarios WHERE id LIKE $id";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
            
              if ($name == $name) {
                  return $row[$name];
              }
          }
 
  }
}
//Send Notification
if (!function_exists('send_notification')) {
  function send_notification($id_user, $mail_tem, $sec_code, $subject, $smtp, $userName,$pass, $port, $url1) {
      global $mysqli;

      $id_user= $id_user;
      $subject = $subject;
      $mail_tem= $mail_tem;
      $sec_code= $sec_code;
      //SMTP
      $smtp =$smtp;
      $userName = $userName;
      $pass= $pass;
      $port = $port;
      $url1 = $url1;
      //Users
      $name =get_user_info($id_user, 'nombre');
      $lastname =get_user_info($id_user, 'apellido');
      $email =get_user_info($id_user, 'email');


      require("class.phpmailer.php");
      $mail = new PHPMailer();
      //Luego tenemos que iniciar la validación por SMTP:

      $mail -> IsSMTP();
      $mail -> SMTPAuth = true;
      $mail -> Host = $smtp; // SMTP a utilizar. Por ej. smtp.elserver.com
      $mail -> Username =   $userName; // Correo completo a utilizar
      $mail -> Password =$pass; // Contraseña
      $mail -> Port = $port; // Puerto a utilizar

      $mail -> From ="soporte@freecanelo.com.ar"; // Desde donde enviamos (Para mostrar)
      $mail -> FromName = "Notificaciones Diarios con Café";
      $mail -> AddAddress($email); // Esta es la dirección a donde enviamos
      //$mail->AddCC("cuenta@dominio.com"); 
      // $mail->AddBCC("marianabelgrano@hotmail.com");  Copia oculta para esssaaabel
      $mail -> CharSet = 'UTF-8';
      $mail -> IsHTML(true); // El correo se envía como HTML
      $mail -> Subject = $subject; // Este es el titulo del email.
    

      $body = file_get_contents($mail_tem);
      //$body = preg_replace("[\]",'',$body); setup vars to replace
      $vars = array('{id_user}', '{name}', '{sec_code}', '{email}', '{url}');
      $values = array($id_user, $name.' '.$lastname, $sec_code, $email, $url1);

   //replace vars
      $body = str_replace($vars,$values,$body);

      //add the html tot the body
      $mail->MsgHTML($body);

      $mail->Body = $body; // Mensaje a enviar
      $exito = $mail->Send(); // Envía el correo.
      $mail->ClearAddresses();  

      if ($exito) {
          echo "true";

      } else {
          echo  "Error: ".$mail->ErrorInfo;
      }
  }
} 


 // Captcha
 if($filename =='registro.php' or $filename =='agregar-suscriptor.php' or $filename =='contacto.php' or $filename == 'ingresar.php' or $filename == 'olvido-su-clave.php' or $filename == 'editar-perfil.php' or $filename == 'editar-grupal.php'){
$captcha='<script src="https://www.google.com/recaptcha/api.js?render=6Le03n0eAAAAAPvJr46Tq6U9BnQpMEICuIJNy1rK"></script>';
            }   
            
            
//Botonera Active            
if($filename =='index.php'){
  $a="active";
}else if($filename =='noticias-de-ayer.php'){
  $b="active";
}else if($filename =='domingos-ilustrados.php'){
  $c="active";
}else if($filename =='conocenos.php'){
  $d="active"; 
}else if($filename =='quiero-suscribirme.php'){
    $e="active";
}

/* Generales */
if (!function_exists('get_info')) {
  function get_info($table,$id, $name) {
      global $mysqli;
      $name = $name;
      $id = $id;
      $table =$table;
      $query = "SELECT * FROM $table WHERE id LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {

                  if($name ==  $name){
                  return $row[$name];
                   }
                               
  }

}
}
 // Ver suscriptores (Grupal)
 if (!function_exists('get_sus_grupal')) {
  function get_sus_grupal($id) {
      global $mysqli;
      $id=$id;
      global $user_cafe;
          $query="SELECT * FROM grupal WHERE id_user LIKE $id";
          $result = mysqli_query($mysqli,$query) ;
          $total= mysqli_num_rows( $result);
            if($total > 0){
               
          while ($row = mysqli_fetch_assoc($result)) {
            if($row['nombre']== ''){
              $boton=' <a class="btn  btn-verde-s" href="agregar-suscriptor.php?id='.$row['id'].'"> Agregar Suscriptor </a>';
            } else if($row['nombre'] != ''){
              $boton=' <a class="btn  btn-verde-s" href="editar-grupal.php?id='.$row['id'].'"> Editar Suscriptor </a>';
            }
             echo
             '<div class="col-md-8 col-sm-12 cada-perfil">
             <p>Nombre Apellido: <b>'.$row['nombre'].'  '.$row['apellido'].'</b></p>
             <p>Email: <b>'.$row['email'].'</b></p>
             <p>Teléfono / WhastApp: <b>'.$row['telefono'].'</b></p>
            
             </div>
             <div class="col-md-2 col-sm-12 cada-boton">
             '.$boton.'
            </div>
             ';

          }
          }else{
            echo '
             <p>No hay suscriptores</p>
             <a class="btn btn-verde-s" href="agregar-suscriptor.php"> Agregar Suscriptor </a>
            ';
            }
  }
}

/*
// Get Admin Info
if (!function_exists('get_admin')) {
                function get_admin($id, $name) {
                    global $mysqli;
                    $name = $name;
                    $id = $id;
            
                    $query = "SELECT * FROM `admin` WHERE `id` LIKE '$id' ";
                    $result = mysqli_query($mysqli, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
            
                                if($name ==  $name){
                                return $row[$name];
                                 }
                                             
                }
            
}
}

/* //// Productos //// 
if (!function_exists('get_producto')) {
  function get_producto($id, $name) {
      global $mysqli;
      $name = $name;
      $id = $id;

      $query = "SELECT * FROM `wp_posts` WHERE `ID` LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {

                  if($name ==  $name){
                  return $row[$name];
                   }
                               
  }

}
}
// Lista de Usuarios Registrados
if (!function_exists('get_lista_usuarios')) {
  function get_lista_usuarios() {
      global $mysqli;
      
      $query = "SELECT * FROM `wp_users` order by ID asc ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['ID'].'</td>
          <td class="td-titulo"> '.$row['display_name'].'</td>
          <td class="td-titulo">'.$row['user_email'].'</td> 
          <td class="td-titulo">'.$row['user_nicname'].'</td>
          <td class="td-titulo"> '.$row['direccion'].'</td>
          <td class="td-titulo"> '.$row['telefono'].'</td>
          <td class="td-titulo"> '.$row['user_registered'].'</td>
         
         
          
          </tr>
          
          
          ';

  }
}  
}  
if (!function_exists('get_user_info')) {
  function  get_user_info($tabla, $id, $nombre) {
      global $mysqli;
      $id=$id;
      $nombre=$nombre;
      $tabla=$tabla;
          $query="SELECT * FROM $tabla WHERE customer_id LIKE $id ";
          $result = mysqli_query($mysqli,$query) ;
        
        
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
                      if($nombre ==  $nombre){
                      return $row[$nombre];
                       }
                                   
      }
 
  }
}
//Cantidad de Productos que compro el usuario
if (!function_exists('get_total_ventas')) {
  function get_total_ventas($id) {
      global $mysqli;
      $id =$id;
      $query = "SELECT * FROM `wp_wc_order_product_lookup` WHERE customer_id LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
     
       return $total;
    
  
    
} 
} 
//Producto mas vendido
if (!function_exists('get_total_productos')) {
  function get_total_productos() {
      global $mysqli;
      $id =$id;
      $query = "SELECT * FROM `wp_woocommerce_order_items` Where order_item_type LIKE 'line_item' ORDER BY order_item_name asc ";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
     
  
    
      while ($row = mysqli_fetch_assoc($result)) {
       
        echo '<tr>
     
        <td class="o">'.$row['order_item_id'].'</td>
       
       
        <td class=" ">'.$row['order_item_name'].'</td>
        <td class="">'.$row['order_id'].'</td>
       
        </tr>
      
       
        ';
       
}   
} 
  
}
if (!function_exists('get_detalle_ventas')) {
  function get_detalle_ventas($id) {
      global $mysqli;
      $id =$id;
      $query = "SELECT * FROM `wp_wc_order_product_lookup` WHERE customer_id LIKE '$id' order by order_id desc ";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
      $i=1;
      while ($row = mysqli_fetch_assoc($result)) {
       
        echo '<tr>
        <td class=" centrado">'.$i.'</td>
        <td class=" centrado">'.$row['order_id'].'</td>
        <td class=" centrado">'. get_producto($row['product_id'],post_title).'</td>
       
        <td class=" centrado">$'.$row['product_net_revenue'].'</td>
        <td class=" centrado">'.$row['coupon_amount'].'</td>
        <td class=" centrado">'.$row['date_created'].'</td>
        </tr>
        
       
        ';
        $i++;

}
    
  
    
} 
} 
/*
//MercadoPago
if (!function_exists('get_user_actividad')) {
  function  get_user_actividad($id) {
      global $mysqli;
      $id=$id;
     
          $query="SELECT * FROM cart  WHERE id_user ";
          $result = mysqli_query($mysqli,$query) ;
      
          while ($row = mysqli_fetch_assoc($result)) {
         
              echo '<tr>
             
              <td class="td-id centrado">'.$row['id'].'</td>
              <td class="td-titulo"> '.$row['itemName'].'</td>
              <td class="td-titulo"> $'.$row['itemPrice'].'</td>
              <td class="centrado "> '. get_estado_pago($row['id_pedido'], status).'</td>
              <td class="centrado"> '.$row['id_pedido'].'</td>
              <td class="centrado "> '.$row['date'].'</td>
            
            
              
              </tr>
              
              
              ';
    
      }
 
  }
}

// Lista de Usuarios Registrados
if (!function_exists('get_lista_usuarios_activos')) {
  function get_lista_usuarios_activos() {
      global $mysqli;
    
      $query = "SELECT * FROM `wp_wc_customer_lookup`  order by date_last_active desc";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['customer_id'].'</td>
          <td class="td-titulo"> '.$row['first_name'].' '.$row['last_name'].'</td>
          <td class="td-titulo"> '.$row['email'].'</td>
          <td class="td-titulo">'. $row['city'].' / '.$row['state'].'</td>
          <td class="td-titulo centrado"><a href="ver-productos.php?id='.$row['customer_id'].'"> '. get_total_ventas($row['customer_id']).'</a></td>
          <td class="td-titulo"> '.$row['date_registered'].'</td>
          <td class="td-titulo"> '.$row['date_last_active'].'</td>
         
         
          
          </tr>
          
          
          ';

  }
}  
}  

/* SECCIONES */

/* Secciones - Posición 

if (!function_exists('get_posicion')) {
  function get_posicion() {
      global $mysqli;
      $returnArr = array();
      $returnArr1 = array();
      $resultado=$mysqli->query("SELECT * FROM `secciones` ");
      $total= mysqli_num_rows($resultado);	
      while ($row = mysqli_fetch_array($resultado)){
          $returnArr1[] = $row['orden_id'];
      }
      $dd= $returnArr1;
      $sql = $mysqli->query('SELECT * FROM `orden_secciones` WHERE orden_id NOT IN (' . implode(",", $dd) . ')');
      while ($row = mysqli_fetch_array($sql)){
          $returnArr[] = $row['orden_id'];
      }
      return $returnArr;
  } 
} 
// Ùltimo Orden 
if (!function_exists('get_ultima_posicion')) {
  function get_ultima_posicion() {
      global $mysqli;
      
      $query = "SELECT * FROM `orden_secciones` ORDER BY orden_id DESC  LIMIT 1";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
      if ($total == 0){
         return 1;
      }else{
        while ($row = mysqli_fetch_assoc($result)) {
          return $row['orden_id']+1;
      } 
      }
  
    
} 
} 
if (!function_exists('get_posiciones')) {
  function get_posiciones() {
      global $mysqli;
      
      $query = "SELECT * FROM `orden_secciones`  ";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
     
        while ($row = mysqli_fetch_assoc($result)) {
        echo  '<option value="'.$row['orden_id'].'"> '.$row['orden_id'].'</option>';
          
      } 
    
  
    
} 
} 
// Lista de Secciones
if (!function_exists('get_lista_secciones')) {
  function get_lista_secciones() {
      global $mysqli;
      
      $query = "SELECT * FROM `secciones` order by orden_id ASC";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['seccion'].'</td>
          <td class="centrado td-min"> '.$row['orden_id'].'</td>
          <td class="centrado td-min"><a href="ver-seccion.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Eliminar Sección, Desaparecerán todas sus subsecciones" href="functions/delete-seccion.php?id='.$row['id'].'"> <i class="fa fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  
//Edit Secciones
if (!function_exists('get_seccion')) {
  function get_seccion($id, $name) {
      global $mysqli;
      $name = $name;
      $id = $id;

      $query = "SELECT * FROM `secciones` WHERE `id` LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {

                  if($name ==  $name){
                  return $row[$name];
                   }
                               
  }

}
}

/* HOME SLIDE 
if (!function_exists('get_slides_list')) {
  function get_slides_list() {
      global $mysqli;
      
      $query = "SELECT * FROM `slides`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
      
      
          
   //slide
   if($row['id_activo'] == 0){
         
    $activo='<td class="centrado td-min"><a href="functions/activar-slide.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
    $delete ='  <td class="centrado td-min"><a href="functions/delete-slide.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>';
  }else if($row['id_activo'] == 1){
    $activo='<td class="centrado td-min"><a href="functions/activar-slide.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
    $delete ='  <td class="centrado td-min"><a href="functions/delete-slide.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>';
  }
   
        
      

     
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['title'].'</td>
          <td class="td-fecha">'.$row['text'].'</td>
        
          <td class="td-fecha"><img src=../'.$row['img_slide'].' class="img-responsive" width="580"> </td>
      
          '.$activo.'
        
          <td class="centrado td-min"><a href="see-slide.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          '.$delete.'
          
          </tr>';

  }
}  
} 
// SLIDE INFO
if (!function_exists('get_slide_info')) {
  function get_slide_info($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM slides WHERE id LIKE $id";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
            
              if ($name == $name) {
                  return $row[$name];
              }
          }
 
  }
}

// Lista de Productos

if (!function_exists('get_lista_productos')) {
  function get_lista_productos() {
      global $mysqli;
      
      $query = "SELECT * FROM `productos` order by orden_id desc , id desc";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['orden_id'] == 0){
          $orden='<span>No aparecerá en  el Home.</span>';
        }else{
          $orden=$row['orden_id'];
        }
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar-producto.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="far fa-pause-circle"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar-producto.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-play-circle"></i></a></td>';
        }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['nombre'].'</td>
          <td class="centrado td-min"> '.$row['codigo'].'</td>
          <td class="centrado td-titulo"> '.get_seccion_id($row['id_seccion']).'</td>
          <td class="centrado td-min"> $ '.$row['precio'].'</td>
          <td class="centrado td-min td-orden">'.$orden.'</td>
          '.$activo.'
      
          <td class="centrado td-min"><a href="ver-producto.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Eliminar Producto" href="functions/delete-producto.php?id='.$row['id'].'"> <i class="fa fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  

// Información de Producto
if (!function_exists('get_seccion_id')) {
  function get_seccion_id($id) {
      global $mysqli;
      $name = $name;
      

      $query = "SELECT * FROM `secciones` WHERE `id` LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {

                 
                  return $row['seccion'];
                   
                               
  }

}
}
//Secciones
if (!function_exists('get_producto_select')) {
  function get_producto_select() {
    global $mysqli;

    $query = "SELECT * FROM `secciones`  ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<option value="'.$row['id'].'">'.$row['seccion'].'</option>';

       }


  }
}

if (!function_exists('get_producto_id')) {
  function get_producto_id($id, $name) {
    global $mysqli;
    $id= $id;
    $name =$name;
    $query = "SELECT * FROM `productos`  WHERE id LIKE $id ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}

if (!function_exists('get_categorias_id')) {
  function get_categorias_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
      $query = "SELECT * FROM secciones WHERE id LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      $total = mysqli_num_rows($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)){
          if($name ==  $name){
              return $row[$name];
               }
      }
      

  }
}

 //Get File by ID
 if (!function_exists('get_file_id')) {
  function get_file_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM files WHERE id_producto LIKE '$id' AND id_posicion LIKE $name ";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
  
          return $row['files'];
  
                                   
      }
 
  }
}

// Colores 
if (!function_exists('get_color_id')) {
  function get_color_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM colores WHERE id LIKE '$id'  ";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
  
            if($name ==  $name){
              return $row[$name];
               }
  
                                   
      }
 
  }
}

//Talles

if (!function_exists('get_talle_id')) {
  function get_talle_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
   
          $query="SELECT * FROM talles WHERE id LIKE '$id'  ";
          $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)) {
  
            if($name ==  $name){
              return $row[$name];
               }
  
                                   
      }
 
  }
}
if (!function_exists('get_talle_id_1')) {
    function get_talle_id_1($id) {

      global $mysqli;
      $arr=[$id];
      $name=$name;
      $divide= explode(",", $id); 
      $returnArr = array();
      $query = "SELECT * from talles where `id` NOT IN (".implode($arr, ',').")" ; 
      $result = mysqli_query($mysqli,$query) ;
          while ($row = mysqli_fetch_assoc($result)){

            $returnArr[]= '   <div class="form-check form-check-inline">
            <input class="form-check-input degree" name="id_talle[]" type="checkbox" id="inlineCheckbox1" value="'.$row['id'].'">
            <label class="form-check-label" for="inlineCheckbox1">'.$row['nombre'].'</label>
        </div>' ;
          }
          return $returnArr;
    }
}

if (!function_exists('get_color_id_1')) {
  function get_color_id_1($id) {

    global $mysqli;
    $arr=[$id];
    $name=$name;
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * from colores where `id` NOT IN (".implode($arr, ',').")" ; 
    $result = mysqli_query($mysqli,$query) ;
        while ($row = mysqli_fetch_assoc($result)){

          $returnArr[]= '   <div class="form-check form-check-inline">
          <input class="form-check-input degree" name="id_color[]" type="checkbox" id="inlineCheckbox1" value="'.$row['id'].'">
          <label class="form-check-label" for="inlineCheckbox1">'.$row['nombre'].'</label>
      </div>' ;
        }
        return $returnArr;
  }
}
// Listar Colores
if (!function_exists('get_colores_list')) {
  function get_colores_list() {
      global $mysqli;
      
      $query = "SELECT * FROM `colores` ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['nombre'].'</td>
          <td class="td-titulo centrado "> <img src="../'.$row['img_color'].'" width="3%" /></td>
         
       
      
          <td class="centrado td-min"><a href="ver-color.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Eliminar Color" href="functions/delete-color.php?id='.$row['id'].'"> <i class="fa fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
} 
// Listar Talles
if (!function_exists('get_talles_list')) {
  function get_talles_list() {
      global $mysqli;
      
      $query = "SELECT * FROM `talles` ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['nombre'].'</td>
           <td class="centrado td-min"><a href="ver-talle.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Eliminar Producto" href="functions/delete-talle.php?id='.$row['id'].'"> <i class="fa fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
} 

/*
//Colores
if (!function_exists('get_colores_select')) {
  function get_colores_select() {
    global $mysqli;

    $query = "SELECT * FROM `colores`  ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';

       }


  }
}
//Talles
if (!function_exists('get_talles_select')) {
  function get_talles_select() {
    global $mysqli;

    $query = "SELECT * FROM `talles`  ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';

       }


  }

if (!function_exists('get_colores')) {
  function get_colores(){
      global $mysqli;
    
      $query = "SELECT * FROM colores ";
      $result = mysqli_query($mysqli, $query);
    
      while ($row = mysqli_fetch_assoc($result)) {
  
      echo'    
      <div class="form-check form-check-inline">
      <input  class="form-check-input degree" name="id_color[]" type="checkbox" value="'.$row['id'].'">
      <label class="form-check-label" for="inlineCheckbox1">'.$row['nombre'].'</label>
     </div> <br>';
     
     
      }

  }
} 

if (!function_exists('get_talles')) {
  function get_talles(){
      global $mysqli;
    
      $query = "SELECT * FROM talles ";
      $result = mysqli_query($mysqli, $query);
    
      while ($row = mysqli_fetch_assoc($result)) {
  
      echo'    
      <div class="form-check form-check-inline">
      <input  class="form-check-input degree" name="id_talle[]" type="checkbox" value="'.$row['id'].'">
      <label class="form-check-label" for="inlineCheckbox1">'.$row['nombre'].'</label>
     </div> <br>';
     
     
      }

  }
} 


// Get Banner
if (!function_exists('get_banner_id')) {
  function get_banner_id($name) {
    global $mysqli;
  
    $name =$name;
    $query = "SELECT * FROM `banner`  WHERE id LIKE 1 ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}
// Get Descuento
if (!function_exists('get_descuento_id')) {
  function get_descuento_id($name) {
    global $mysqli;
  
    $name =$name;
    $query = "SELECT * FROM `descuentos`  WHERE id LIKE 1 ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}

// Get PF
if (!function_exists('get_pdf_id')) {
  function get_pdf_id($name) {
    global $mysqli;
  
    $name =$name;
    $query = "SELECT * FROM `pdf_envios`  WHERE id LIKE 1 ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}
if (!function_exists('get_posicion_p')) {
  function get_posicion_p() {
      global $mysqli;
      $returnArr = array();
      $returnArr1 = array();
      $resultado=$mysqli->query("SELECT * FROM `productos` ");
      $total= mysqli_num_rows($resultado);	
      while ($row = mysqli_fetch_array($resultado)){
          $returnArr1[] = $row['orden_id'];
      }
      $dd= $returnArr1;
      $sql = $mysqli->query('SELECT * FROM `orden_informes` WHERE orden_id NOT IN (' . implode(",", $dd) . ')');
      while ($row = mysqli_fetch_array($sql)){
          $returnArr[] = $row['orden_id'];
      }
      return $returnArr;
  } 
} 

/* Novedades 

if (!function_exists('get_lista_novedades')) {
  function get_lista_novedades() {
    global $mysqli;
      
    $query = "SELECT * FROM `novedades` ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      if($row['orden_id'] == 0){
        $orden='<span>No aparecerá en  el Home.</span>';
      }else{
        $orden=$row['orden_id'];
      }
        echo '<tr>
       
        <td class="td-id centrado">'.$row['id'].'</td>
        <td class="td-titulo"> <img src="../'.$row['img_novedades'].'" width="200" /></td>
        <td class="td-titulo"> '.$row['nombre'].'</td>
        <td class="td-id centrado"> '.$orden.'</td>
        <td class="centrado td-min"><a href="ver-novedad.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
      
        
        </tr>
        
        
        ';

}
  
  }

}

// Lista Pedidos Usuario
if (!function_exists('get_lista_pedidos')) {
  function get_lista_pedidos($id) {
      global $mysqli;
      $id = $id;
      $query ="SELECT * FROM cart WHERE id_user LIKE '$id'
  GROUP BY 
     id_pedido";
      //$query = "SELECT * FROM `cart` WHERE id_user LIKE '$id' group by id_pedido ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          $date = date("d / m / Y - h:s", strtotime($row['date']));

          if($row['id_estado'] == 1){
          $estado='<span class="badge badge-success">Finalizado</span>';
        }else if($row['id_estado'] == 2){
          $estado='<span class="badge badge-info">En Proceso </span>';
        }else if($row['id_estado'] == 3){
          $estado='<span class="badge badge-warning"> Pendiente</span>';
        }else if($row['id_estado'] == 4){
          $estado='<span class="badge badge-danger">Anulado</span>';
        }
          echo '<tr>
         
          <!-- <td class="td-id centrado">'.$row['id'].'</td>-->
          <td class="td-titulo">'.$row['id_pedido'].'</td> 
        <td class="td-titulo"> '.$date.'</td>
          
          <td class="td-titulo"> '.$estado.'</td>
          
          <td class="centrado td-min"><a href="ver-detalle.php?id='.$row['id_pedido'].'"> <i class="fa fa-eye"></i></a></td>
         
          
          </tr>
          
          
          ';

  }
}  
}  
 //Pedidos ID
 if (!function_exists('get_pedido_id')) {
  function get_pedido_id($id,$name) {
    global $mysqli;
    $id =$id;

    $name =$name;
    $query = "SELECT * FROM `cart`  WHERE id_pedido LIKE '$id' ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}
// Editar Pedido
if (!function_exists('get_pedidos_id')) {
  function get_pedidos_id($id,$name) {
    global $mysqli;
    $id =$id;

    $name =$name;
    $query = "SELECT * FROM `cart`  WHERE id LIKE '$id' ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}
if (!function_exists('get_talle_color')) {
  function get_talle_color($id, $name,$id_cart) {
    global $mysqli;
    $id =$id;
    $id_cart =$id_cart;
    $name =$name;
    $query = "SELECT * FROM `caracteristicas`  WHERE id_pedido LIKE '$id' and orden_id LIKE '$name' AND id_cart LIKE '$id_cart'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      
        return $row['caracteristicas'];
         }


  
  
  }
  }
if (!function_exists('get_caracteristicas_id')) {
  function get_caracteristicas_id($id) {

    global $mysqli;
    $id =$id;
    
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * from cart where `id_pedido`"; 
    $result = mysqli_query($mysqli,$query) ;
        while ($row = mysqli_fetch_assoc($result)){

          $returnArr[]= $row['caracteristicas'] ;
        }
        return $returnArr;
  }
}

if (!function_exists('get_pedidos_todos')) {
  function get_pedidos_todos() {
      global $mysqli;
      
      $query = "SELECT * FROM `cart` GROUP BY id_pedido order by date desc ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_estado'] == 1){
          $estado='<span class="badge badge-success">Finalizado</span>';
        }else if($row['id_estado'] == 2){
          $estado='<span class="badge badge-info">En Proceso </span>';
        }else if($row['id_estado'] == 3){
          $estado='<span class="badge badge-warning"> Pendiente </span>';
        }else if($row['id_estado'] == 4){
          $estado='<span class="badge badge-danger"> Anulado </span>';
        }
        
        $date = date("d / m / Y - h:s", strtotime($row['date']));
          echo '<tr>
         
          <td class="td-titulo">'.$row['id_pedido'].'</td>
          <td class="td-titulo"> '.$date.'</td>
         
          <td class="td-titulo"> '. get_user_info(usuarios, $row['id_user'], nombre) .'</td>
          <td>'.$estado.'</td>
      
          <td class="centrado td-min"><a href="ver-detalle.php?id='.$row['id_pedido'].'"> <i class="fas fa-eye"></i></a> </td>
          
          
          </tr>';

  }
}  
} 

//By ID
if (!function_exists('get_pedidos_todos_id')) {
  function get_pedidos_todos_id($id) {
      global $mysqli;
      $id =$id;
      
      $query = "SELECT * FROM `cart` WHERE  id_pedido LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      
      while ($row = mysqli_fetch_assoc($result)) {
        $post1=get_talle_color(get_pedidos_id($row['id'], id_pedido),3,get_pedidos_id($row['id'], id)); 
        $resultado1 = str_replace( "size:", '', $post1);
        $post=get_talle_color(get_pedidos_id($row['id'], id_pedido),4,get_pedidos_id($row['id'], id)); 
        $resultado = str_replace( "color:", '', $post);
        $date = date("d / m / Y - h:s", strtotime($row['date']));
          echo '<tr>
         
        
          <td class="td-titulo">'.$row['id_producto'].'</td>
          <td class="td-titulo"> '.get_producto_id($row['id_producto'], codigo).'</td>
          <td class="td-titulo"> '.get_producto_id($row['id_producto'], nombre).'</td>
          <td class="td-titulo">'.$resultado1.'</td>
          <td class="td-titulo">'.$resultado.'</td>
          <td class="td-titulo"> $'.$row['itemPrice'].'</td>
          <td class="td-titulo centrado">'.$row['itemQty'].'</td>
          
       
      
          <td class="centrado td-min"><a href="ver-producto-pedido.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a href="functions/eliminar-producto-pedido.php?id='.$row['id'].'"> <i class="fas fa-trash"></i></a></td>
          
          </tr>
          
          
          ';

  }
}  
} 
if (!function_exists('get_suma')) {
  function get_suma($id) {
      global $mysqli;
      $id =$id;
      
      $query = "SELECT * FROM `cart` WHERE  id_pedido LIKE '$id'  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
      
      
       $total =  $row['itemQty']*$row['itemPrice'];
       
       $totalSum += $total;
       
  }
  return $totalSum;
}  
} 

// Obtener nombres de producto

if (!function_exists('get_select')) {
  function get_select() {
      global $mysqli;
      
      $query = "SELECT * FROM `productos`  ";
      $result = mysqli_query($mysqli, $query);
      $total= mysqli_num_rows( $result);	
     
        while ($row = mysqli_fetch_assoc($result)) {
        echo  '<option value="'.$row['id'].'"> '.$row['nombre'].'</option>';
          
      } 
    
  
    
} 
} 


 //Send Notification
 if (!function_exists('send_notificacion_mercadopago')) {
  function send_notificacion_mercadopago($id_user, $subject, $cuerpo, $url, $link, $smtp, $userName,$pass, $port,$estado, $detalle){ 
      global $mysqli;

      $id_user= $id_user;
      $subject = $subject;
      $mail_tem= $mail_tem;
      $detalle = $detalle;
      //SMTP
      $smtp =$smtp;
      $userName = $userName;
      $pass= $pass;
      $port = $port;
      $url = $url;
      //Users
      $name =get_user_info(usuarios, $id_user, 'nombre');
      //$lastname =get_user_info($id_user, 'apellido');
      $email =get_user_info(usuarios, $id_user, 'email');


      require("class.phpmailer.php");
      $mail = new PHPMailer();
      //Luego tenemos que iniciar la validación por SMTP:

      $mail -> IsSMTP();
      $mail -> SMTPAuth = true;
      $mail -> Host = $smtp; // SMTP a utilizar. Por ej. smtp.elserver.com
      $mail -> Username =   $userName; // Correo completo a utilizar
      $mail -> Password =$pass; // Contraseña
      $mail -> Port = $port; // Puerto a utilizar

      $mail -> From =   $userName; // Desde donde enviamos (Para mostrar)
      $mail -> FromName = "Notificaciones Kiara Bs As";
      $mail -> AddAddress($email); // Esta es la dirección a donde enviamos
      //$mail->AddCC("cuenta@dominio.com"); 
      // $mail->AddBCC("marianabelgrano@hotmail.com");  Copia oculta para esssaaabel
      $mail -> CharSet = 'UTF-8';
      $mail -> IsHTML(true); // El correo se envía como HTML
      $mail -> Subject = $subject; // Este es el titulo del email.
    

      $body = file_get_contents($mail_tem);
      //$body = preg_replace("[\]",'',$body); setup vars to replace
      $vars = array('{id_user}', '{name}', '{sec_code}', '{email}', '{url}');
      $values = array($id_user, $name.' '.$lastname, $detalle, $email, $url);

   //replace vars
      $body = str_replace($vars,$values,$body);

      //add the html tot the body
      $mail->MsgHTML($body);

      $mail->Body = $body; // Mensaje a enviar
      $exito = $mail->Send(); // Envía el correo.
      $mail->ClearAddresses();  

      if ($exito) {
          echo "true";

      } else {
          echo  "Error: ".$mail->ErrorInfo;
      }
  }
} 


if (!function_exists('get_colores_select')) {
  function get_colores_select($id) {
    global $mysqli;
    $id=$id;
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * FROM `colores` WHERE id LIKE '$divide'  ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

       echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';

       }


  }
}

if (!function_exists('get_estados_select')) {
  function get_estados_select($id) {
    global $mysqli;
    $id=$id;
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * FROM `estados` WHERE id LIKE '$id'  ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

       echo '<option value="'.$row['id'].'">'.$row['estado'].'</option>';

       }


  }
}

if (!function_exists('get_estados')) {
  function get_estados() {
    global $mysqli;
    $id=$id;
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * FROM `estados` ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

       echo '<option value="'.$row['id'].'">'.$row['estado'].'</option>';

       }


  }
}if (!function_exists('get_estados_id')) {
  function get_estados_id($id) {
    global $mysqli;
    $id=$id;
    $divide= explode(",", $id); 
    $returnArr = array();
    $query = "SELECT * FROM `estados` WHERE id LIKE '$id' ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      if($row['id'] == 1){
        $estado='<span class="badge badge-success">Finalizado</span>';
      }else if($row['id'] == 2){
        $estado='<span class="badge badge-info">En Proceso </span>';
      }else if($row['id'] == 3){
        $estado='<span class="badge badge-warning"> Pendiente</span>';
      }else if($row['id'] == 4){
        $estado='<span class="badge badge-danger">Anulado</span>';
      }
      echo $estado;


       }


  }
}
*/