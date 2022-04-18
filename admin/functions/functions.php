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

$user_diarios_admin=$_SESSION["user_diarios_admin"];

use voku\helper\AntiXSS;
require_once __DIR__ . '/vendor/autoload.php'; // example path
$antiXss = new AntiXSS();

if ($user_diarios_admin ==''){
  header("location:index.php");
}

// conect
include("config/connect.php"); 

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

//Cursos 
if (!function_exists('get_lista_cursos')) {
  function get_lista_cursos() {
      global $mysqli;
      
      $query = "SELECT * FROM `curso_info`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar-curso.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar-curso.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['titulo'].'</td>
          <td class="td-titulo"> '.$row['subtitulo'].'</td>
        
         
          <td class="centrado td-min"><a href="ver-curso.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Se eliminará todo lo referido a este curso." href="functions/delete-curso.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}
if (!function_exists('get_catalogo_id')) {
  function get_catalogo_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
      $query = "SELECT * FROM catalogo WHERE id LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      $total = mysqli_num_rows($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)){
          if($name ==  $name){
              return $row[$name];
               }
      }
      

  }
}
// Lista de Categorías
if (!function_exists('get_lista_catalogo')) {
  function get_lista_catalogo() {
      global $mysqli;
      
      $query = "SELECT * FROM `catalogo`  ORDER BY titulo ASC";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
 
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['titulo'].'</td>
          <td class="td-descripcion">'.$row['date'].'</td>
          <td class="centrado td-min"><a href="ver-categoria.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Una Vez que Elimines esta Categoría, tendrás que asignarle otra categoría a las búsquedas de la misma." href="functions/delete.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  
// Get Producto Select
if (!function_exists('get_producto_select')) {
    function get_producto_select() {
      global $mysqli;

      $query = "SELECT * FROM `catalogo`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {

        echo '<option value="'.$row['id'].'">'.$row['titulo'].'</option>';

         }


    }
}

// Categorias 
// Lista de Categorías
if (!function_exists('get_lista_categoria')) {
  function get_lista_categoria($id) {
      global $mysqli;
      $id=$id;
      if($id == 0){
        $id =1;
      }
      $query = "SELECT * FROM `categoria` WHERE id_catalogo LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['titulo'].'</td>
          <td class="td-descripcion">'.$row['descripcion'].'</td>
          <td><img src="../'.$row['img_1'].'" class="img-fluid"  ></td>
          <td><img src="../'.$row['img_2'].'" class="img-fluid" ></td>
          '.$activo.'
          <td class="centrado td-min"><a href="agregar-subcategoria.php?id='.$row['id'].'"> <i class="fas fa-plus green"></i></a></td>
          <td class="centrado td-min"><a href="ver-subcategoria.php?id='.$row['id'].'"> <i class="fas fa-eye green"></i></a></td>
          <td class="centrado td-min"><a href="ver-categoria.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Una Vez que Elimines esta Categoría, tendrás que asignarle otra categoría a las búsquedas de la misma." href="functions/delete.php?id='.$row['id'].'&id_catalogo='.$_GET['id_catalogo'].'"> <i class="fas fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  

if (!function_exists('get_lista_subcategoria')) {
  function get_lista_subcategoria($id) {
      global $mysqli;
      $id=$id;
      $query = "SELECT * FROM `subcategoria` WHERE id_categoria LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class=""> '.$row['titulo'].'</td>
          <td class="">'.$row['peso'].'</td>
          <td class="">'.$row['ancho'].'</td>
          <td class="">'.$row['ligamento'].'</td>
          <td class="">'.$row['composicion'].'</td>
          <td class="">'.$row['color'].'</td>
          '.$activo.'
      
          <td class="centrado td-min"><a href="ver-subcat.php?id='.$row['id'].'&id_catalogo='.$row['id_categoria'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="" href="functions/delete-subcategoria.php?id='.$row['id'].'&id_catalogo='.$row['id_categoria'].'"> <i class="fas fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  

if (!function_exists('get_categoria_id')) {
  function get_categoria_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
      $query = "SELECT * FROM categoria WHERE id_catalogo LIKE '$id' ";
      $result = mysqli_query($mysqli, $query);
      $total = mysqli_num_rows($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)){
          if($name ==  $name){
              return $row[$name];
               }
      }
      

  }
}



// Get Producto by ID
if (!function_exists('get_categorias_id')) {
  function get_categorias_id($id, $name) {
    global $mysqli;
    $id= $id;
    $name =$name;
    $query = "SELECT * FROM `categoria`  WHERE id LIKE $id ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      if($name ==  $name){
        return $row[$name];
         }

       }


  }
}

 //Get File by ID
 if (!function_exists('get_file_id')) {
  function get_file_id($id, $name, $catalogo) {
      global $mysqli;
      $id=$id;
      $catalogo= $catalogo;
    
      $name=$name;
          $query="SELECT * FROM  file_categoria WHERE id_subcategoria LIKE '$id' AND id_posicion LIKE $name  AND id_categoria LIKE $catalogo";
          $result = mysqli_query($mysqli,$query) ;
        
        
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
          return $row['files'];
  
                                   
      }
 
  }
}
//Subcategoría BY ID

if (!function_exists('get_subcategoria_id')) {
  function get_subcategoria_id($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM subcategoria WHERE id LIKE '$id' ";
          $result = mysqli_query($mysqli,$query) ;
        
        
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
                      if($name ==  $name){
                      return $row[$name];
                       }
                                   
      }
 
  }
}
// WORK WEAR

if (!function_exists('get_subcategoria_id_work')) {
  function get_subcategoria_id_work($id, $name) {
      global $mysqli;
      $id=$id;
      $name=$name;
          $query="SELECT * FROM sub_work WHERE id LIKE '$id' ";
          $result = mysqli_query($mysqli,$query) ;
        
        
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
                      if($name ==  $name){
                      return $row[$name];
                       }
                                   
      }
 
  }
}
if (!function_exists('get_lista_subcategoria_work')) {
  function get_lista_subcategoria_work() {
      global $mysqli;
      $id=$id;
      $query = "SELECT * FROM `sub_work`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class=""> '.$row['titulo'].'</td>
          <td class="">'.$row['peso'].'</td>
          <td class="">'.$row['ancho'].'</td>
          <td class="">'.$row['ligamento'].'</td>
          <td class="">'.$row['composicion'].'</td>
          <td class="">'.$row['color'].'</td>
          '.$activo.'
      
          <td class="centrado td-min"><a href="ver-subcat-work.php?id='.$row['id'].'&id_catalogo='.$row['id_catalogo'].'"> <i class="fas fa-eye"></i></a></td>
          <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="" href="functions/delete-subcategoria.php?id='.$row['id'].'&id_catalogo='.$row['id_catalogo'].'"> <i class="fas fa-trash"></a></td>
          
          </tr>
          
          
          ';

  }
}  
}  

//USUARIOS

if (!function_exists('get_lista_usuarios')) {
  function get_lista_usuarios() {
      global $mysqli;
      
      $query = "SELECT * FROM `usuarios`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
        if($row['id_nivel'] == 10){
          $grupo='<td class="centrado td-min"><a href="ver-suscriptores.php?id='.$row['id'].'">Ver Suscriptores Asociados</a></td>';
           }else{
            $grupo='<td class="centrado td-min">'.get_user_info(niveles, $row['id_nivel'], name).'</td>';
           }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-titulo"> '.$row['nombre'].'</td>
          <td class="td-titulo"> '.$row['apellido'].'</td>
          
          <td class="td-titulo"> '.$row['email'].'</td>
          <td class="td-titulo">'.$row['date'].'</td>
          '. $grupo.'
          '.$activo.'
        
          <td class="centrado td-min"><a href="ver-actividad.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
        <!--  <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Se eliminará todo lo referido a este curso." href="functions/delete-curso.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>-->
          
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
          $query="SELECT * FROM $tabla WHERE id LIKE $id ";
          $result = mysqli_query($mysqli,$query) ;
        
        
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
                      if($nombre ==  $nombre){
                      return $row[$nombre];
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
            
             ';

          }
          }else{
            echo '
             <p>No hay suscriptores</p>
            
            ';
            }
  }
}

if (!function_exists('get_lista_ilustraciones')) {
  function get_lista_ilustraciones() {
      global $mysqli;
      
      $query = "SELECT * FROM `ilustraciones`  ";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['id_activo'] == 0){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-ban"></i></a></td>';
        }else if($row['id_activo'] == 1){
          $activo='<td class="centrado td-min"><a href="functions/activar.php?id='.$row['id'].'&id_activo='.$row['id_activo'].'"><i class="fas fa-check"></i></a></td>';
        }
        if($row['id_nivel'] == 10){
          $grupo='<td class="centrado td-min"><a href="ver-suscriptores.php?id='.$row['id'].'">Ver Suscriptores Asociados</a></td>';
           }else{
            $grupo='<td class="centrado td-min">'.get_user_info(niveles, $row['id_nivel'], name).'</td>';
           }
          echo '<tr>
         
          <td class="td-id centrado">'.$row['id'].'</td>
          <td class="td-descripcion"><img src="../'.$row['file'].'" width="150" /></td>
        
          <td class="td-titulo">'.$row['date'].'</td>
       
          '.$activo.'
        
          <td class="centrado td-min"><a href="ver-ilustracion.php?id='.$row['id'].'"> <i class="fas fa-eye"></i></a></td>
        <!--  <td class="centrado td-min"><a data-toggle="tooltip" data-placement="top" title="Se eliminará todo lo referido a este curso." href="functions/delete-curso.php?id='.$row['id'].'"> <i class="fas fa-trash"></a></td>-->
          
          </tr>
          
          
          ';

  }
}  
}

// Pagado OK
if (!function_exists('get_estado_pago')) {
  function  get_estado_pago($id,$nombre) {
      global $mysqli;
      $id=$id;
      $nombre =$nombre;
          $query="SELECT * FROM mercadopago WHERE id_pago LIKE '$id'";
          $result = mysqli_query($mysqli, $query);
          while ($row = mysqli_fetch_assoc($result)) {
  
                      if($nombre ==  $nombre){
                      return $row[$nombre];
                       }
                                   
      }

  }
}
//MercadoPago
if (!function_exists('get_user_actividad')) {
  function  get_user_actividad($id) {
      global $mysqli;
      $id=$id;
     
          $query="SELECT * FROM cart  WHERE id_user LIKE $id ";
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
//Pay Pal
if (!function_exists('get_paypal')) {
  function  get_paypal($id) {
      global $mysqli;
      $id=$id;
     
          $query="SELECT * FROM paypal  WHERE id_user LIKE $id ";
          $result = mysqli_query($mysqli,$query) ;
      
          while ($row = mysqli_fetch_assoc($result)) {
            if($row['pago_exitoso'] ==1){
              $dd= '<span class="green"><strong > SI </strong> se Realizó el pago</span>';
            } else if($row['pago_exitoso'] == 2){
              $dd= '<span class="red"><strong> NO </strong> se Realizó el pago </span>';
            }
              echo '<tr>
             
              <td class="td-id centrado">'.$row['id'].'</td>
              <td class="td-titulo"> '. $dd.'</td>
            
              <td class="centrado "> '.$row['date'].'</td>
            
            
              
              </tr>
              
              
              ';
    
      }
 
  }
}