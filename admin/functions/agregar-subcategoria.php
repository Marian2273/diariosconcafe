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

$id_catalogo=addslashes($antiXss->xss_clean($_POST['id_catalogo']));


$titulo=addslashes($antiXss->xss_clean($_POST['titulo']));
$ancho=addslashes($antiXss->xss_clean($_POST['ancho']));
$peso=addslashes($antiXss->xss_clean($_POST['peso']));
$ligamento=addslashes($antiXss->xss_clean($_POST['ligamento']));
$composicion=addslashes($antiXss->xss_clean($_POST['composicion']));
$color=addslashes($antiXss->xss_clean($_POST['color']));
$id_categoria=addslashes($antiXss->xss_clean($_POST['id_categoria']));



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

//File 3
$size=$_FILES['file3']['size'];
$allowed=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename = $_FILES['file3']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

//Update
$id_update =(int)$_POST['id_update'];
$id_subcategoria =(int)$_POST['id_subcategoria'];
 


if($id_update == 1){
    
//File 1
$size1=$_FILES['file_up_1']['size'];
$allowed1=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename1 = $_FILES['file_up_1']['name'];
$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

//File 2
$size2=$_FILES['file_up_2']['size'];
$allowed2=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename2 = $_FILES['file_up_2']['name'];
$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);

//File 3
$size3=$_FILES['file_up_3']['size'];
$allowed3=  array('jpeg','png' ,'jpg','JPG','PNG','JPEG');
$filename3 = $_FILES['file_up_3']['name'];
$ext3 = pathinfo($filename3, PATHINFO_EXTENSION);


if($size1 > 0){
      if(!in_array($ext1,$allowed1)) {
             echo 'Por favor, adjuntar una imágen';
      
      } else{
            $handle22 = new Upload($_FILES['file_up_1']);
            if ($handle22->uploaded){
             $dir_pics='../../imagen-subcategoria';
           
             $handle22 ->image_resize          = true;
             $handle22 ->image_ratio_crop      = true;
             $handle22 ->image_x              = 1129;
             $handle22 ->image_y              = 752;
             $handle22->Process($dir_pics);
            } 
            if ($handle22->processed) {
                  if($id_catalogo == 0){
                        $sql22="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle22->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 1 AND id_categoria LIKE 0 ";
                        mysqli_query($mysqli,$sql22);
            
                        $sql1="UPDATE `sub_work` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color', `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
                        mysqli_query($mysqli,$sql1);     

                  }else{
                        $sql22="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle22->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 1  AND id_categoria LIKE $id_categoria";
                        mysqli_query($mysqli,$sql22);
            
                        $sql1="UPDATE `subcategoria` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color', `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
                        mysqli_query($mysqli,$sql1);     
                  }
           
            ?>
                   
            <script>
             Swal.fire({icon: 'success', title: 'La Subcategoría se realizó con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
             });
           
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

      $handle2 = new Upload($_FILES['file_up_2']);
      if ($handle2->uploaded){
            $dir_pics='../../imagen-subcategoria';
     
       $handle2 ->image_resize          = true;
       $handle2 ->image_ratio_crop      = true;
       $handle2 ->image_x              = 1129;
       $handle2 ->image_y              = 752;
       $handle2->Process($dir_pics);
      } 
      if ($handle2->processed) {
            if($id_catalogo == 0){
                  $sql2="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle2->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 2 AND id_categoria LKE 0";
                  mysqli_query($mysqli,$sql2);
                  $sql1="UPDATE `sub_work` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color' , `composicion`='$composicion' WHERE id LIKE '$id_subcategoria' ";
                  mysqli_query($mysqli,$sql1); 
            }else{
                  $sql2="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle2->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 2  AND id_categoria LIKE $id_categoria";
                  mysqli_query($mysqli,$sql2);
                  $sql1="UPDATE `subcategoria` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color' , `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
                  mysqli_query($mysqli,$sql1); 
            }
          
            ?>
                   
                      
                   <script>
             Swal.fire({icon: 'success', title: 'La Subcategoría se realizó con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
            });
          
          </script>

        <?php
        }else{ ?>
        <script>
        Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
        </script>
     
  <?php }

     }

}
if($size3 > 0){
      if(!in_array($ext3,$allowed3)) {
            echo 'Por favor, adjuntar una imágen';
     
     } else{
      $handle3 = new Upload($_FILES['file_up_3']);
      if ($handle3->uploaded){
      $dir_pics='../../imagen-subcategoria';
     
       $handle3 ->image_resize          = true;
       $handle3 ->image_ratio_crop      = true;
       $handle3 ->image_x              = 1129;
       $handle3 ->image_y              = 752;
       $handle3->Process($dir_pics);
      } 
      if ($handle3->processed) {
            if($id_catalogo == 0){
                  $sql3="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle3->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 3 AND id_categoria LIKE 0";
                  mysqli_query($mysqli,$sql3);
                  $sql1="UPDATE `sub_work` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color' WHERE id LIKE '$id_subcategoria'";
                  mysqli_query($mysqli,$sql1); 
            }else{
                  $sql3="UPDATE  `file_categoria` SET `files` = 'imagen-subcategoria/$handle3->file_dst_name' WHERE id_subcategoria LIKE '$id_subcategoria' AND id_posicion LIKE 3 AND id_categoria LIKE $id_categoria";
                  mysqli_query($mysqli,$sql3);
                  $sql1="UPDATE `subcategoria` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color' , `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
                  mysqli_query($mysqli,$sql1); 
            }
           
         

      ?>
             
             <script>
             Swal.fire({icon: 'success', title: 'La Subcategoría se realizó con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
            });
           
          </script>

  <?php
  }else{ ?>
  <script>
  Swal.fire({icon: 'error', title: 'Algo Salió mal! Por favor, intente más tarde.'});
  </script>

<?php }

}




}

else{
      if($id_catalogo == 0){
            $sql1="UPDATE `sub_work` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color' , `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
            mysqli_query($mysqli,$sql1); 

      }else{
            $sql1="UPDATE `subcategoria` SET `titulo` = '$titulo', `peso`= '$peso', `ancho` = '$ancho',`ligamento` = '$ligamento',`color`='$color', `composicion`='$composicion' WHERE id LIKE '$id_subcategoria'";
            mysqli_query($mysqli,$sql1); 
      }
         
           
      ?>
               
               <script>
             Swal.fire({icon: 'success', title: 'La Subcategoría se realizó con éxito.' ,
             showConfirmButton: true,
             confirmButtonColor: '#27ce4b',
          });
            
          </script>
<?php
}
}


else if($id_update == ''){

            if($id_catalogo == 0){
                  $sql1="INSERT INTO `sub_work` (`titulo`, `peso`,`ancho`,`ligamento`,`composicion`,`color`,`id_catalogo`, `id_activo`) VALUES
                  ('$titulo', '$peso', '$ancho','$ligamento','$composicion','$color', '$id_catalogo',1)";
                  mysqli_query($mysqli,$sql1);
                  $id_subcategoria= $mysqli->insert_id;
                  

            }else{
                  $sql1="INSERT INTO `subcategoria` (`titulo`, `peso`,`ancho`,`ligamento`,`composicion`,`color`,`id_categoria`, `id_activo`) VALUES
                  ('$titulo', '$peso', '$ancho','$ligamento','$composicion','$color', '$id_categoria',1)";
                  mysqli_query($mysqli,$sql1);
                  $id_subcategoria= $mysqli->insert_id;
                  
            }
              

                $handle22 = new Upload($_FILES['file1']);
                if ($handle22->uploaded){
                 $dir_pics='../../imagen-subcategoria';
               
                 $handle22 ->image_resize          = true;
                 $handle22 ->image_ratio_crop      = true;
                 $handle22 ->image_x              = 1129;
                 $handle22 ->image_y              = 752;
                 $handle22->Process($dir_pics);
                } 
                if ($handle22->processed) {

                $sql22="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                ('imagen-subcategoria/$handle22->file_dst_name','$id_categoria','$id_subcategoria',  1, 1)";
                mysqli_query($mysqli,$sql22);
                }   else{
                  $sql22="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                  ('','$id_categoria','$id_subcategoria',  1, 1)";
                  mysqli_query($mysqli,$sql22);
                }
                //
                $handle2 = new Upload($_FILES['file2']);
                if ($handle2->uploaded){
                $dir_pics='../../imagen-subcategoria';
               
                 $handle2 ->image_resize          = true;
                 $handle2 ->image_ratio_crop      = true;
                 $handle2 ->image_x              = 1129;
                 $handle2 ->image_y              = 752;
                 $handle2->Process($dir_pics);
                } 
                if ($handle2->processed) {

                $sql2="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                ('imagen-subcategoria/$handle2->file_dst_name','$id_categoria','$id_subcategoria',  1, 2)";
                mysqli_query($mysqli,$sql2);
                }   else{
                  $sql2="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                  ('','$id_categoria','$id_subcategoria',  1, 2)";
                  mysqli_query($mysqli,$sql2);
                }

                //
                $handle3 = new Upload($_FILES['file3']);
                if ($handle3->uploaded){
                $dir_pics='../../imagen-subcategoria';
               
                 $handle3 ->image_resize          = true;
                 $handle3 ->image_ratio_crop      = true;
                 $handle3 ->image_x              = 1129;
                 $handle3 ->image_y              = 752;
                 $handle3->Process($dir_pics);
                } 
                if ($handle3->processed) {

                $sql3="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                 ('imagen-subcategoria/$handle3->file_dst_name','$id_categoria','$id_subcategoria',  1, 3)";
                mysqli_query($mysqli,$sql3);
              
                  }else{
                  $sql3="INSERT INTO `file_categoria` (`files`, `id_categoria` , `id_subcategoria`, `id_activo`,`id_posicion`) VALUES
                  ('','$id_categoria','$id_subcategoria',  1, 3)";
                 mysqli_query($mysqli,$sql3);

                 if($id_catalogo == 0){ ?>

                <script>
                 Swal.fire({icon: 'success', title: 'La Subcategoría fue cargada con éxito.' ,
                 showConfirmButton: true,
                 confirmButtonColor: '#27ce4b',
                 confirmButtonText:'<span onclick="my2()"> Ir a Categoría </span>',});
                 function my2() {
                window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id_categoria, id_catalogo);?>";   
                 } 
              </script>

                 <php }else{ ?>

                  <script>
                 Swal.fire({icon: 'success', title: 'La Subcategoría fue cargada con éxito.' ,
                 showConfirmButton: true,
                 confirmButtonColor: '#27ce4b',
                 confirmButtonText:'<span onclick="my2()"> Ir a Categoría </span>',});
                 function my2() {
                 window.location.href = "ver-sub-work.php";   
                 } 
              </script>

               <?php   } ?>
          
         
           <?php 
          } ?>
                
          <script>
          Swal.fire({icon: 'success', title: 'La Subcategoría fue cargada con éxito.' ,
          showConfirmButton: true,
          confirmButtonColor: '#27ce4b',
          confirmButtonText:'<span onclick="my2()"> Ir a Categoría </span>',});
          function my2() {
         window.location.href = "dashboard.php?id_catalogo=<?php echo get_categorias_id($id_categoria, id_catalogo);?>";   
          } 
       </script>

<?php  } ?>