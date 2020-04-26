<?php
$failLogin = "";
$failEmail = "";
$failPass = "";
$failRePass = "";
if (isset($_POST["signup"])) {
  // data base loading
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'MusicAccounts');
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  $mysqli->query("SET NAMES 'utf8'");
  // initialization of variable
  $email = htmlspecialchars($_POST["email"]);
  $login = htmlspecialchars($_POST["login"]);
  $pass = htmlspecialchars($_POST["password"]);
  $rePass = htmlspecialchars($_POST["rePassword"]);
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $_SESSION["email"] = $email;
  $_SESSION["login"] = $login;
  $_SESSION["name"] = $name;
  $_SESSION["surname"] = $surname;
  $fail = false;

  //password check
  if ($pass == "") {
    $failPass = "Enter password!";
    $fail = true;
  } else if ($pass.length < 6) {
    $failPass = "Password length must be more then 5 symbols!";
    $fail = true;
  }
  if ($rePass != $pass) {
    $failRePass = "Passwords do not match!";
    $fail = true;
  }
  // login check
  $success = $mysqli->query("SELECT `login` FROM `users` WHERE `login` = '$login'");
  $myrow = $success->fetch_assoc();
  if ($login == "") {
    $failLogin = "Enter login!";
    $fail = true;
  } else if ($myrow["login"] == $login) {
    $failLogin = "Login is used, enter another!";
    $fail = true;
  }
  // email check
  $success = $mysqli->query("SELECT `email` FROM `users` WHERE `email` = '$email'");
  $myrow = $success->fetch_assoc();
  if ($email == "") {
    $failEmail = "Enter email!";
    $fail = true;
  } else if (!preg_match("/@/", $email)) {
    $failEmail = "Incorrect email!";
    $fail = true;
  } else if ($myrow["email"] == $email) {
    $failEmail = "Email is used, enter another!";
    $fail = true;
  }

  if (!$fail) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $success = $mysqli->query("INSERT INTO `users` (`name`, `surname`, `login`, `password`, `email`) VALUES ('$name', '$surname', '$login', '$hash', '$email')");
    if ($success) {
      header("Location: index.php");
    }
  }

  $mysqli->close($mysqli);
}

 ?>

<div class="clear"><br/></div>
<div id="wrapper">
  <div id="articles">
    <div id="centerBlockSignUp">
      <h2 id="SignUpLabel">Sign up</h2>
      <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" value="<?=$_SESSION["name"]; ?>"/>
        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Surname" value="<?=$_SESSION["surname"]; ?>"/>
        <label for="login">Login <span style="color:#ff0000;"><?php echo $failLogin;?></span></label>
        <input type="text" name="login" placeholder="Login" value="<?=$_SESSION["login"]; ?>"/>
        <label for="email">Email <span style="color:#ff0000;"><?php echo $failEmail;?></span></label>
        <input type="email" name="email" placeholder="Email" value="<?=$_SESSION["email"]; ?>"/>
        <label for="password">Password <span style="color:#ff0000;"><?php echo $failPass;?></span></label>
        <input type="password" name="password" placeholder="Password" />
        <label for="password">Replace Password <span style="color:#ff0000;"><?php echo $failRePass;?></span></label>
        <input type="password" name="rePassword" placeholder="Replace Password" />
        <input type="submit" name="signup" placeholder="Sign up" value="Submit" id="signupSubmit"/>
      </form>
    </div>
  </div>
</div>
</div>
