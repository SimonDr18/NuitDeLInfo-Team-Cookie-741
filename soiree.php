<!DOCTYPE html>
<html lang='fr'>
<?php include_once("includes/_head.php"); ?>
<?php include_once("includes/_header.php"); ?>

  <style type="text/css">
    body{font-family:Arial;margin:0px;padding:0px;}
    #container{position:relative;width:990px;margin:auto;background:#FFFFFF;padding:20px 0px 20px 0px;}
    #container h1{margin:0px 0px 10px 20px;}
    #container #map{width:700px;height:500px;margin:auto;}
    #container #panel{width:700px;margin:auto;}
    #container #destinationForm{margin:0px 0px 20px 0px;background:#EEEEEE;padding:10px 20px;border:solid 1px #C0C0C0;}
    #container #destinationForm input[type=text]{border:solid 1px #C0C0C0;}
  </style>
  <body>
    <div id="container">
        <h1>Soirée</h1>
        <div id="destinationForm">
            <form action="" method="get" name="direction" id="direction">
                <label>Point de départ :</label>
                <input type="text" name="origin" id="origin">
                <label>Destination :</label>
                <input type="text" name="destination" id="destination">
                <input type="button" value="Calculer l'itinéraire" onclick="javascript:calculate()">
            </form>
        </div>
        <div id="panel"></div>
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>

    <div>
      <form action="action_bd.php">
        Invitation<input type="text" name="mail"></input>
        <input type="Submit" value="Envoyer"/>
      </form>
    </div>

    <!-- Include Javascript -->
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBhS4jxsla_CGbP5SZn_szeKRTSByXgbRE&sensor=false&language=fr"></script>
    <script type="text/javascript" src="scripts/functions.js"></script>
  </body>
</html>
