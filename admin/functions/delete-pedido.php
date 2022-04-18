<?php     
require ("functions.php");

include("../config/connect1.php");


$id=(int)$_GET['id'];


$sql1=" DELETE FROM `pedidos`  WHERE `id` LIKE '$id' ";
mysqli_query($mysqli,$sql1);



header('Location: ../pedidos.php?data=delete');