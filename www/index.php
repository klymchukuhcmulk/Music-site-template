<?php
session_start();
if (!$_SESSION["LogIn"]) {
  require 'header.php';
} else {
  require 'headerLogin.php';
}
require 'body.php';
require 'footer.php';
?>
