<?php     
require ("functions.php");

include("../config/connect1.php");


$id=(int)$_GET['id'];
$id_catalogo=(int)$_GET['id_catalogo'];



$query = "SELECT * FROM `categoria` WHERE id LIKE '$id' ";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {

$ruta = $row['img_1'];
$ruta1 = $row['img_2'];
$path = "../../$ruta";
$path1 = "../../$ruta1";
if (unlink($path));
if (unlink($path1));
}

$sql1=" DELETE FROM `categoria`  WHERE `id` LIKE '$id' ";
mysqli_query($mysqli,$sql1);



header("Location: ../dashboard.php?data=delete&id_catalogo=$id_catalogo");