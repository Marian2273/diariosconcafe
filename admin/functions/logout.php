<?php
session_start();
unset($_SESSION["user_inesw_admin"]);
header("location:../index.php");
exit();
?>