<?php
session_start();
$_SESSION["page"]="profil.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Profil</title>
    <?php require_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <header>
      <h1>Profil</h1>
    </header>
  </body>
</html>
