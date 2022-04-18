<?php     

require ("functions.php");
include("../config/connect1.php");


$id=(int)$_GET['id'];
$id_activo=(int)$_GET['id_activo'];

if($id_activo == 0){
$id_activo = 1;
}
else if($id_activo == 1){
 $id_activo = 0;
}


$sql1=" UPDATE `usuarios` SET  `id_activo` = $id_activo WHERE `id` LIKE '$id' ";
mysqli_query($mysqli,$sql1);

header('Location: ../usuarios.php?data=activo');