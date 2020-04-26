<?php
session_start();
$_SESSION["LogIn"] = false;
unset($_SESSION["name"]);
unset($_SESSION["surname"]);
unset($_SESSION["email"]);
unset($_SESSION["login"]);
header("Location: index.php");
 ?>
