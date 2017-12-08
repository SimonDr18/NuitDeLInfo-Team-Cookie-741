<?php
session_start();
$_SESSION["page"]="soiree.php";
?>
<!DOCTYPE html>
<html lang='fr'>
<?php include_once("includes/_head.php"); ?>
<?php include_once("includes/_header.php"); ?>


  <body>
    <div class="container">
        <div class="row">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h1>Soirée</h1>
              </div>
              <div class="panel-body ajout" >
        <div id="destinationForm">
            <form action="+soiree.php" method="post" name="direction" id="direction">
              <?php
              if(isset($_SESSION["idU"])){
                echo '<input type="hidden" name="idUtil" value=' . $_SESSION["idU"] . '/>';
              }
              ?>
                <label>Soirée :</label>
                <input type="text" name="soirID" required/><br/>
                <label>Adresse soirée :</label>
                <input type="text" name="adresse" required/><br/>
                <label>Date de début soirée :</label>
                <input type="date" name="dateDSoirée" required/><br/>
                <label>Date de fin soirée :</label>
                <input type="date" name="dateFSoirée" required/><br/>
                <input type="submit" value="Créer"/>
            </form>
        </div>
        <div>
          <h3>Calculer un itinéraire</h3>
          <form action="" method="get" name="direction" id="direction">
            <label>Point de départ :</label>
            <input type="text" name="origin" id="origin"/>
            <label>Destination :</label>
            <input type="text" name="destination" id="destination"/>
            <input type="button" value="Calculer l'itinéraire" onclick="javascript:calculate()"/><br/>
          </form>
        </div>
        <div id="panel"></div>
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
      </div>
      </div>
    </div>
  </div>


    <!-- Include Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="static/bootstrap3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBhS4jxsla_CGbP5SZn_szeKRTSByXgbRE&sensor=false&language=fr"></script>
    <script type="text/javascript" src="scripts/functions.js"></script>
  </body>
</html>
