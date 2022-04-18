<?php     
require ("functions.php");

include("../config/connect1.php");

/*
echo "<pre>";
print_r($_GET);
echo "</pre>";
die();
*/

$id=(int)$_GET['id'];
$id_catalogo= $_GET['id_catalogo'];

if($id_catalogo == 0){
             
$query2 = "SELECT * FROM `file_categoria` WHERE id_subcategoria LIKE '$id' AND id_categoria LIKE 0 ";
$result2 = mysqli_query($mysqli, $query2);

while ($row = mysqli_fetch_assoc($result2)) {

                if($row['id_posicion'] == 1){
                                $ruta = $row['files'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }
                if($row['id_posicion'] == 2){
                                $ruta = $row['files'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }
                if($row['id_posicion'] == 3){
                                $ruta = $row['files'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }
}

                $sql1=" DELETE FROM `file_categoria`  WHERE `id_subcategoria` LIKE '$id' AND id_categoria LIKE 0 ";
                mysqli_query($mysqli,$sql1);


                $sql2=" DELETE FROM `sub_work`  WHERE `id` LIKE '$id'  ";
                mysqli_query($mysqli,$sql2);



                header("Location: ../ver-sub-work.php?data=delete&id_catalogo=$id_catalogo");



}else{
                $query2 = "SELECT * FROM `file_categoria` WHERE id_subcategoria LIKE '$id' AND id_categoria LIKE $id_catalogo";
                $result2 = mysqli_query($mysqli, $query2);
                while ($row = mysqli_fetch_assoc($result2)) {
                
                                if($row['id_posicion'] == 1){
                                                $ruta = $row['files'];
                                                $path = "../../$ruta";
                                                if (unlink($path));
                                }
                                if($row['id_posicion'] == 2){
                                                $ruta = $row['files'];
                                                $path = "../../$ruta";
                                                if (unlink($path));
                                }
                                if($row['id_posicion'] == 3){
                                                $ruta = $row['files'];
                                                $path = "../../$ruta";
                                                if (unlink($path));
                                }
                
                
                
                
                }

                $sql2=" DELETE FROM `subcategoria`  WHERE `id` LIKE '$id'  AND id_categoria LIKE $id_catalogo";
                mysqli_query($mysqli,$sql2);
                header("Location: ../ver-subcategoria.php?data=delete&id=$id_catalogo");
                        
}






