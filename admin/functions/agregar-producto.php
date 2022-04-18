<?php     
require ("functions.php");
include("../config/connect1.php");
include('class.upload.php');
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
print_r($_POST);
echo "</pre>";
die();
*/
$titulo=addslashes($antiXss->xss_clean($_POST['titulo']));
$descripcion=addslashes($antiXss->xss_clean($_POST['descripcion']));
$id_catalogo=addslashes($antiXss->xss_clean($_POST['id_catalogo']));



//File 1
$size=$_FILES['file1']['size'];
$allowed=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename = $_FILES['file1']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

//File 2
$size=$_FILES['file2']['size'];
$allowed=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename = $_FILES['file2']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);



//Update
$id_update =(int)$_POST['id_update'];
$id =(int)$_POST['id'];



if($id_update == 1){
    
//File 1
$size1=$_FILES['file1b']['size'];
$allowed1=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename1 = $_FILES['file1b']['name'];
$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

//File 2
$size2=$_FILES['file2b']['size'];
$allowed2=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename2 = $_FILES['file2b']['name'];
$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);




if($size1 > 0){
      if(!in_array($ext1,$allowed1)) {
             echo 'Por favor, adjuntar una imágen';
      
      } else{
            $handle22 = new Upload($_FILES['file1b']);
            if ($handle22->uploaded){
             $dir_pics='../../imag-catal';
             $handle22 ->image_resize          = true;
             $handle22 ->image_ratio_crop      = true;
             $handle22 ->image_x              = 426;
             $handle22 ->image_y              = 640;
             $handle22->Process($dir_pics);
            } 
            if ($handle22->processed) {

          
            $sql1="UPDATE `categoria` SET `titulo` = '$titulo', `img_1`= 'imag-catal/$handle22->file_dst_name', `descripcion` = '$descripcion' WHERE id LIKE '$id'";
            mysqli_query($mysqli,$sql1);     
            ?>
                   
            <script>
             Swal.fire({icon: 'success', title: 'El Producto fue editado con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
             confirmButtonText:'<span onclick="my2()"> Ir a Catálogo </span>',});
             function my2() {
                  window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id, id_catalogo);?>";   
             } 
          </script>

        <?php
        }else{ ?>
        <script>
        Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
        </script>
     
  <?php }

      }
}if($size2 > 0){
      if(!in_array($ext2,$allowed2)) {
            echo 'Por favor, adjuntar una imágen';
     
     } else{

      $handle2 = new Upload($_FILES['file2b']);
      if ($handle2->uploaded){
     
     
       $dir_pics='../../imag-catal';
       $handle2 ->image_resize          = true;
       $handle2 ->image_ratio_crop      = true;
       $handle2 ->image_x              = 426;
       $handle2 ->image_y              = 640;
       $handle2->Process($dir_pics);
      } 
      if ($handle2->processed) {
         

            $sql1="UPDATE `categoria` SET `titulo` = '$titulo', `img_2`= 'imag-catal/$handle2->file_dst_name', `descripcion` = '$descripcion' WHERE id LIKE '$id'";
            mysqli_query($mysqli,$sql1);
            ?>
                   
            <script>
               Swal.fire({icon: 'success', title: 'El Producto fue editado con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
             confirmButtonText:'<span onclick="my2()"> Ir a Catálogo </span>',});
             function my2() {
                  window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id, id_catalogo);?>";   
             } 
          </script>

        <?php
        }
        
        
        else{ ?>
        <script>
        Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
        </script>
     
  <?php }

     }

}if($size1 > 0 and $size2 > 0){
      if(!in_array($ext1,$allowed1)) {
            echo 'Por favor, adjuntar una imágen';
     
     }else if(!in_array($ext2,$allowed2)) {
       echo 'Por favor, adjuntar una imágen';

      } else{
            $handle22 = new Upload($_FILES['file2b']);
                
            $dir_pics='../../imag-catal';
      
            $handle22 ->image_resize          = true;
            $handle22 ->image_ratio_crop      = true;
            $handle22 ->image_x              = 426;
            $handle22 ->image_y              = 640;
            $handle22->Process($dir_pics);
        
          $handle = new Upload($_FILES['file1b']);
         
           $dir_pics='../../imag-catal';
         
           $handle ->image_resize          = true;
           $handle ->image_ratio_crop      = true;
           $handle ->image_x              = 426;
           $handle ->image_y              = 640;
           $handle->Process($dir_pics);
          
          if ($handle->processed) {
            $sql1="UPDATE `categoria` SET `titulo` = '$titulo', `img_1`= 'imag-catal/$handle22->file_dst_name', `img_2`= 'imag-catal/$handle->file_dst_name', `descripcion` = '$descripcion' WHERE id LIKE '$id'";
            mysqli_query($mysqli,$sql1);
          } ?>
             <script>
              Swal.fire({icon: 'success', title: 'El Producto fue editado con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
             confirmButtonText:'<span onclick="my2()"> Ir a Catálogo </span>',});
             function my2() {
                  window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id, id_catalogo);?>";   
             } 
          </script>
   <?php  }
}


else{

      $sql1="UPDATE `categoria` SET `titulo` = '$titulo' , `descripcion` = '$descripcion' WHERE id LIKE '$id'";
      mysqli_query($mysqli,$sql1);
      ?>
         <script>
               Swal.fire({icon: 'success', title: 'El Producto fue editado con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
             confirmButtonText:'<span onclick="my2()"> Ir a Catálogo </span>',});
             function my2() {
                  window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id, id_catalogo);?>";   
             } 
          </script>
<?php
}
}


else if($id_update == ''){
                  $handle22 = new Upload($_FILES['file2']);
                
                  $dir_pics='../../imag-catal';
            
                  $handle22 ->image_resize          = true;
                  $handle22 ->image_ratio_crop      = true;
                  $handle22 ->image_x              = 426;
                  $handle22 ->image_y              = 640;
                  $handle22->Process($dir_pics);
              
                $handle = new Upload($_FILES['file1']);
               
                 $dir_pics='../../imag-catal';
               
                 $handle ->image_resize          = true;
                 $handle ->image_ratio_crop      = true;
                 $handle ->image_x              = 426;
                 $handle ->image_y              = 640;
                 $handle->Process($dir_pics);
                
                if ($handle->processed) {
                $sql1="INSERT INTO `categoria` (`titulo`, `descripcion`,`img_1`,`img_2`,`id_catalogo`,`id_activo`) VALUES
                ('$titulo', '$descripcion', 'imag-catal/$handle->file_dst_name','imag-catal/$handle22->file_dst_name','$id_catalogo',1)";
                mysqli_query($mysqli,$sql1);
                $id_producto= $mysqli->insert_id;
                } ?>
                   
                <script>
                 Swal.fire({icon: 'success', title: 'El Producto fue cargado con éxito.' ,
                 showConfirmButton: true,
                 confirmButtonColor: '#27ce4b',
                 confirmButtonText:'<span onclick="my2()"> Ir a Productos </span>',});
                 function my2() {
                  window.location.href = "dashboard.php?id='.<?php echo $id; ?>.'";   
                 } 
              </script>


<?php }  ?>