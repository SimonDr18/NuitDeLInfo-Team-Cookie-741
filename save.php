<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Géolocalisation</title>
        <script src="events.js"></script>
    </head>
    <body>
      <?php
        $latitude = $_GET['lat'];
        $longitude = $_GET['long'];
        $titre = $_GET['titre'];
        $type = $_GET['type'];
        $nbBlesse = $_GET['nBlesse'];
        echo 'latitude : '.$latitude.' ----- longitude : '.$longitude.' ----- titre : '.$titre.' ----- type : '.$type.' ----- nombre de blessés : '.$nbBlesse;
      ?>
    </body>
</html>
