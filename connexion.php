<?php
session_start();
$_SESSION["page"]="connexion.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="design.css" />
    <title>Connexion</title>
    <?php include_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <header>
      <h1>connexion</h1>
    </header>
    <section>
      <form action="#" method="post">
        Pseudo : <input type="text" name="Pseudo"/><br />
        Mot de passe : <input type="password" name="Pass" /><br />
        <input type="submit" value="Connexion"/>
      </form>
    </section>
  </body>
</html>
