<?php
session_start();
$_SESSION["page"]="creersoiree.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Création soirée</title>
    <?php require_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <header>
      <h1>Créer une soirée</h1>
    </header>
    <section>
      <form action="#" method="post">
        Soirée : <input type="text" name="soirID" /><br />
        Adresse : <input type="text" name="soirID" /><br />
        Date de début soirée : <input type="date" name="dateDSoirée"><br />
        Date de fin soirée : <input type="date" name="dateFSoirée"><br />
        <input type="submit" value="Creer"/>
      </form>
    </body>
</html>
