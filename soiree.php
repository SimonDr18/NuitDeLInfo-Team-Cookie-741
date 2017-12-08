<?php
session_start();
$_SESSION["page"]="soiree.php";
?>
<!DOCTYPE html>
<html lang='fr'>
<?php include_once("includes/_head.php"); ?>


<body>
<div class="container">
    <div class="row">
        <?php include_once("includes/_header.php"); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Soirée</h1>
            </div>
            <div class="panel-body ajout">
                <div class="ajoutbox">
                    <form action="+soiree.php" method="post" name="direction" id="direction">
                        <?php
                        if(isset($_SESSION["idU"])){
                            echo '<input type="hidden" name="idUtil" value=' . $_SESSION["idU"] . '/>';
                        }
                        ?>
                        <div class="form-group">
                            <label>Soirée :</label>
                            <input type="text" name="soirID" required/><br/>
                        </div>
                        <div class="form-group">
                            <label>Adresse soirée :</label>
                            <input type="text" name="adresse" required/><br/>
                        </div>
                        <div class="form-group">
                            <label>Date de début soirée:</label>
                            <input type="date" name="dateDSoirée" required/><br/>
                        </div>
                        <div class="form-group">
                            <label>Date de fin soirée :</label>
                            <input type="date" name="dateFSoirée" required/><br/>
                        </div>
                        <div>
                            <input type="submit" value="Créer" class="btn btn-default">
                        </div>
                    </form>
                </div>
            </div>

            <hr/>

            <div class="panel-heading">
                <h1>Calculer un itinéraire</h1>
            </div>
            <div class="panel-body ajout">
                <div class="ajoutbox">
                    <form action="" method="get" name="direction" id="direction">
                        <div class="form-group">
                            <label>Point de départ :</label>
                            <input type="text" name="origin" id="origin"/>
                        </div>
                        <div class="form-group">
                            <label>Destination :</label>
                            <input type="text" name="destination" id="destination"/>
                        </div>
                        <div class="button">
                            <input type="button" value="Calculer l'itinéraire" class="btn btn-default" onclick="javascript:calculate()"/><br/>
                        </div>
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
