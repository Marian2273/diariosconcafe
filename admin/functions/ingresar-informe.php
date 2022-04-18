<?php     
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
print_r($_POST);
echo "</pre>";
die();
*/

require ("functions.php");
include("../config/connect1.php");
include('class.upload.php');

$titulo=addslashes($antiXss->xss_clean($_POST['titulo']));
$descripcion=addslashes($antiXss->xss_clean($_POST['descripcion']));
$titulo_en=addslashes($antiXss->xss_clean($_POST['titulo_en']));
$descripcion_en=addslashes($antiXss->xss_clean($_POST['descripcion_en']));
$id_posicion= $antiXss->xss_clean($_POST['id_posicion']);

//File
$size=$_FILES['file']['size'];
$allowed=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

//Update
$size1=$_FILES['file_up']['size'];
$allowed1=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename1 = $_FILES['file_up']['name'];
$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

$id_update = $_POST['id_update'];
$id = $_POST['id'];

if($id_update == 1){
    if($size1 > 0){
if(!in_array($ext1,$allowed1)) {
         echo 'Por favor, adjuntar la imágen corresponiente';

}else{

   $handle = new Upload($_FILES['file_up']);
   if ($handle->uploaded){
    $dir_pics='../../proyectos';
 
    $handle ->image_resize          = true;
    $handle ->image_ratio_crop      = true;
    $handle ->image_x              = 350;
    $handle ->image_y              = 263;
    $handle->Process($dir_pics);
   } 
   if ($handle->processed) {
      $sql1="UPDATE  `emprendimiento` SET `titulo` ='$titulo',
      `descripcion`='$descripcion', `titulo_en` ='$titulo_en',
      `descripcion_en`='$descripcion_en', `img_real`='proyectos/$handle->file_dst_name' ,  `id_posicion` ='$id_posicion' WHERE id LIKE '$id'";
      mysqli_query($mysqli,$sql1);
     
      ?>

                <script>
                 Swal.fire({icon: 'success', title: 'El Proyecto ha sido guardado con éxito.' ,
                 showConfirmButton: true,
                 confirmButtonColor: '#27ce4b',
                 confirmButtonText:'<span onclick="my2()"> Ir a Proyectos </span>',});
                 function my2() {
                 window.location.href = "dashboard.php";   
                 } 
              </script>

  <?php
}else{ ?>
      <script>
      Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
      </script>
         
       <?php }
}
    }else if($size1 == 0){
      $sql1="UPDATE  `emprendimiento` SET `titulo` ='$titulo', 
      `descripcion`='$descripcion',  `titulo_en` ='$titulo_en',
      `descripcion_en`='$descripcion_en',
      `id_posicion` ='$id_posicion' WHERE id LIKE '$id'";
      mysqli_query($mysqli,$sql1);
      ?>

      <script>
       Swal.fire({icon: 'success', title: 'El Proyecto ha sido guardado con éxito.' ,
       showConfirmButton: true,
       confirmButtonColor: '#27ce4b',
       confirmButtonText:'<span onclick="my2()"> Ir a Proyectos </span>',});
       function my2() {
       window.location.href = "dashboard.php";   
       } 
    </script>

<?php
    }


}else {



if($titulo == '' or $descripcion =='' ){
                echo 'Por favor, los datos son obligatorios';

}else if(!in_array($ext,$allowed)) {
                echo 'Por favor, adjuntar imágen Correspondiente';

}
else{
                $handle = new Upload($_FILES['file']);
                if ($handle->uploaded){
                 $dir_pics='../../proyectos';
               
                 $handle ->image_resize          = true;
                 $handle ->image_ratio_crop      = true;
                 $handle ->image_x              = 350;
                 $handle ->image_y              = 263;
                 $handle->Process($dir_pics);
                } 
                if ($handle->processed) {
                                $sql1="INSERT INTO `emprendimiento` (`titulo`, `descripcion`,`img_real`,`id_activo` ,`id_posicion`,`titulo_en`, `descripcion_en`) VALUES
                                ('$titulo', '$descripcion', 'proyectos/$handle->file_dst_name', 1, '$id_posicion','$titulo_en', '$descripcion_en')";
                                mysqli_query($mysqli,$sql1);
                               
                                ?>
                   
                                          <script>
                                           Swal.fire({icon: 'success', title: 'El Proyecto ha sido guardado con éxito.' ,
                                           showConfirmButton: true,
                                           confirmButtonColor: '#27ce4b',
                                           confirmButtonText:'<span onclick="my2()"> Ir a Proyectos </span>',});
                                           function my2() {
                                           window.location.href = "dashboard.php";   
                                           } 
                                        </script>
             
                            <?php
                 }else{ ?>
                                <script>
                                Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
                                </script>
                                   
                                 <?php }
}

}
?>