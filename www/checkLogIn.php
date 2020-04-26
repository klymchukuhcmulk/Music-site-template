<?php
session_start();
  $failPass = "";
  $failEmail = "";
  $email = htmlspecialchars($_POST["email"]);
  $pass = htmlspecialchars($_POST["pass"]);
  $fail = false;

  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'MusicAccounts');
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  $mysqli->query("SET NAMES 'utf8'");

  $success = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
  $myrow = $success->fetch_assoc();
  $correctPass = password_verify($pass, $myrow["password"]);
  if ($email == "") {
    echo "Enter email!";
    $fail = true;
  } else if ($myrow["email"] != $email) {
    echo "Incorrect email! ".$myrow["email"];
    $fail = true;
  } else if ($pass == "") {
    echo "Enter password!";
    $fail = true;
  } else if (!$correctPass) {
    echo "Incorrect password!";
    $fail = true;
  }
  if (!$fail) {
    $_SESSION["login"] = $myrow["login"];
    $_SESSION["email"] = $myrow["email"];
    $_SESSION["name"] = $myrow["name"];
    $_SESSION["surname"] = $myrow["surname"];
    $_SESSION["LogIn"] = true;
    header("Location: index.php");
  }
  $mysqli->close($mysqli);
  ?>
