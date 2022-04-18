<?php     
require ("functions.php");

include("../config/connect1.php");


$id=(int)$_GET['id'];


$query = "SELECT * FROM `productos` WHERE id LIKE '$id' ";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {

$ruta = $row['img_portada'];

$path = "../../$ruta";

if (unlink($path));

}

$query2 = "SELECT * FROM `files` WHERE id_producto LIKE '$id' ";
$result2 = mysqli_query($mysqli, $query2);
while ($row = mysqli_fetch_assoc($result2)) {

                if($row['id_posicion'] == 1){
                                $ruta = $row['file'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }
                if($row['id_posicion'] == 2){
                                $ruta = $row['file'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }
                if($row['id_posicion'] == 3){
                                $ruta = $row['file'];
                                $path = "../../$ruta";
                                if (unlink($path));
                }




}

$sql1=" DELETE FROM `productos`  WHERE `id` LIKE '$id' ";
mysqli_query($mysqli,$sql1);



header('Location: ../dashboard.php?data=delete');