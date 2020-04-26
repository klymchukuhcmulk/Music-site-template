<?php
session_start();
if ($_SESSION["LogIn"]) {
    header("Location: logout.php");
}
require 'header.php';
require 'loginBody.php';
require 'footer.php';
?>
