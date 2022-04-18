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


$nombre=addslashes($antiXss->xss_clean($_POST['nombre']));


$id_update = $_POST['id_update'];
$id = $_POST['id'];

if($id_update == 1){


      $sql1="UPDATE  `categorias` SET `nombre` ='$nombre' WHERE id LIKE '$id'";
      mysqli_query($mysqli,$sql1);
     
      ?>

                <script>
                 Swal.fire({icon: 'success', title: 'La Categoría fue editada con éxito.' ,
                 showConfirmButton: true,
                 confirmButtonColor: '#27ce4b',
                 confirmButtonText:'<span onclick="my2()"> Ir a Categorias </span>',});
                 function my2() {
                 window.location.href = "categorias.php";   
                 } 
              </script>

  <?php


    


}else {



if($nombre == '' ){
                echo 'Por favor, los datos son obligatorios';

}
else{    
                                $sql1="INSERT INTO `categorias` (`nombre`, `id_activo`) VALUES
                                ('$nombre', 1)";
                                mysqli_query($mysqli,$sql1);
                               
                                ?>
                   
                                          <script>
                                           Swal.fire({icon: 'success', title: 'La Categoría fue generada con éxito.' ,
                                           showConfirmButton: true,
                                           confirmButtonColor: '#27ce4b',
                                           confirmButtonText:'<span onclick="my2()"> Ir a Categorías </span>',});
                                           function my2() {
                                           window.location.href = "categorias.php";   
                                           } 
                                        </script>
             
                            <?php
               
}

}
?>