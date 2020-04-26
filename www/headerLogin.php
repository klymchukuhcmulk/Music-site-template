<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" http-equiv="content-type" content="text/html" />
    <meta name="keywords" content="test, site, website" />
    <meta name="description" content="Trial website" />
    <link rel="stylesheet" href='css/styleLogin.css' type="text/css" />
    <link rel="shortcut icon" href='img/favicon.ico' type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <title>Music</title>
  </head>
  <body>
    <div id="page-wrap">
      <header>
        <a href="index.php" id="logo">Music</a>
        <!-- <a href="about.html" class="contact">About us</a> -->
        <div class="dropdown right">
          <span id="logInLabel" class="accountElements"><?=$_SESSION["name"]." ".$_SESSION["surname"]; ?></span>
          <div id="accountMenu" class="dropdown-child">
            <a href="" class="accountHref">My account</a>
            <a href="" class="accountHref">My playlist</a>
            <a href="logout.php" class="accountHref">Log out</a>
          </div>
        </div>
        <span class="right" id="search"><input type="text" class="field" placeholder="Search" /></span>
        <div class="menuHrefs">
          <a class="menuElements" href="index.php">Home page</a>
          <a class="menuElements" href="">My playlist</a>
          <div class="dropdown">
            <span class="menuElements" id="ganres">Ganres</span>
            <div class="dropdown-child">
              <a href="" id="firstHref">R&B/soul</a>
              <a href="" class="inHref">Pop music</a>
              <a href="" class="inHref">Jazz</a>
              <a href="" class="inHref">Dubstep</a>
              <a href="" class="inHref">Techno</a>
              <a href="" class="inHref">Country</a>
              <a href="" class="inHref">Electro</a>
              <a href="" class="inHref">Indie rock</a>
              <a href="" class="inHref">Hip-hop</a>
              <a href="" id="lastHref">Rap</a>
            </div>
          </div>
          <a class="menuElements" href="#">Top charts</a>
          <a class="menuElements" href="#">Radio</a>
        </div>
      </header>
