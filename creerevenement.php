<?php
session_start();
$_SESSION["page"]="creerevenement.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Créer un événement</title>
    <?php require_once("includes/_head.php"); ?>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <header>
      <h1>Signaler un evenement</h1>
    </header>
    <section>
      <form action="#" method="post">
        Titre evenement : <input type="text" name="event" /><br />
        Type : <input type="text" name="type" /><br />
        Nombre de blessés : <input type="number" name="nbblesses" /><br />
        <input type="submit" value="Creer"/>
      </form>
    </section>
  </body>
</html>
