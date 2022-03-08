<?php
session_start();
unset($_SESSION["user_cafe"]);
header("location:../index.php");
exit();
?>