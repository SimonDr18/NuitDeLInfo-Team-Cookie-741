<?php
session_start();
$_SESSION["page"]="creerevenement.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Signaler un événement</title>
    <?php include_once("includes/_head.php"); ?>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script>
    latitude = google.loader.ClientLocation.latitude
    longitude = google.loader.ClientLocation.longitude
    </script>
  </head>
  <body>
    <?php require_once("includes/_header.php"); ?>
    <header>
      <h1>Creer un evenement</h1>
    </header>
    <section>
      <form id="myForm">
        Titre evenement : <input type="text" name="event" id='Titre'/><br />
        Type : <input type="text" name="type" id='type'/><br />
        Nombre de blessés : <input type="text" name="nbblesses" id='nbblesses'/><br />
        <input type="submit" value="Creer"/>
      </form>
      <script>
        var myForm = document.getElementById('myForm');
        var titre = document.getElementById('Titre');
        var type = document.getElementById('type');
        var nBlesse = document.getElementById('nbblesses');
        myForm.addEventListener('submit', function(e) {
            document.location.href = 'save.php?lat='+latitude+'&long='+longitude+'&titre='+titre.value+'&type='+type.value+'&nBlesse='+nbblesses.value
            e.preventDefault();
        });
        myForm.addEventListener('reset', function(e) {
            alert('Vous avez réinitialisé le formulaire !');
        });
      </script>
  </body>


</html>
